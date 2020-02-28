<?php
/*
Lo primero que te recomiendo es que sustituyas el valor de esta variable:

$string = $_POST['data'];
Por:

$string = filter_input(INPUT_POST, "data", FILTER_SANITIZE_STRING);
*/

/*Estados */
/*
	Pendiente
	Pagado
	Cancelado
	Descontado

*/
session_start();
include_once '../includes/db.php';




if(isset($_POST['Transporte'])){


	//print_r($_POST);
	//echo "<br><br>";
	$banderaDeFolio =0;
	//$folio = $_POST['folio'];
	
	$folio = GetFolio();
	echo "Folio [".$folio."],";

	$fechaComprobante = $_POST['fechaComprobante'];
	$nombre = $_POST['nombre'];
	$tipoFormulario  = 1;
	$clienteObjetivo = $_POST['clienteObjetivo'];



	$Departamento = $_POST['Departamento'];

	$Nota = $_POST['Nota'];

	if(empty($Nota)){
		$Nota =null;
	}else{
		//echo "nota con Algo";
	}

	$Fecha01 = $_POST['Fecha01'];
	$Varchar01 = $_POST['Varchar01'];
	$Varchar02 = $_POST['Varchar02'];
	$Varchar03 = $_POST['Varchar03'];
	$Float01 = $_POST['Float01'];
	$arrayQuery =[];
		$Total = 0;
		$ban =0;
		$reg =1;
		foreach ($Fecha01 as $key => $value) {
			
			$dinero = $Float01[$key];
			$dinero =  bcdiv($dinero,1,2); //ajustamos solo a 2 decimales

			$query='INSERT INTO tablageneral (folio,nombre,clienteObjetivo,tipoFormulario,fechaComprobante,Fecha01,Varchar01,Float01,Varchar02,Varchar03,Estado,Nota) VALUES ('.$folio.',"'.$nombre.'","'.$clienteObjetivo[$key].'",'.$tipoFormulario.',"'.$fechaComprobante.'","'.$value.'","'.$Varchar01[$key].'",'.$dinero.',"'.$Varchar02[$key].'","'.$Varchar03[$key].'","Pendiente","'.$Nota.'")';
			//echo $query;

			array_push($arrayQuery,$query);
			$Total = $Total + $dinero;


		} //fin de foreach

	$ban = sqlTablaGeneral($arrayQuery);

	//$ban =1;
	
	$concepto = "Transporte";
	$importe = $Total;
	echo "Total: $".$Total;
	$tipoCompro  = "Comprobable";

	if(isset($_POST['DeudaCredito'])){
		if (isset($_POST['checkDeuda'])){
			$DeudaCredito = $_POST['DeudaCredito'];
			$checkDeuda = $_POST['checkDeuda'];
			$FolioDeuda= $_POST['FolioDeuda'];

			//function de agregar
			if ($ban =1){
				//echo "bandera de cada";
				anexarAGastos($DeudaCredito,$FolioDeuda,$importe);
				agregarFolioDeDeuda($FolioDeuda,$nombre,$folio,$concepto,$DeudaCredito,$importe);
			}
			

		}else{Echo "no se anexa a la deuda, La deuda esta sin cambios";}
	}
	//modificarValesProvisionales($banderaDeFolio,$folio,$nombre); //DESCATALOGADO
  echo "<br>";
  //echo "El Folio para arqueo es[".$folio."]";
	sqlTablaArqueo($ban,$fechaComprobante,$nombre,$importe,$concepto,$Departamento,$folio,$tipoCompro);

	//correo
	//envioCorreo($nombre,$concepto,$Departamento);

	///***********************************************************************************************************************
}else if (isset($_POST['GViajes'])){
//--fin Transporte
//Float01 == con comprobante
//Float02 == sin comprobante
/*
[0] == Hospedaje
[1] == Transporte Foraneo
[2] == Casetas
[3] == Desayuno
[4] == Comida
[5] == Cena
[6] == RecargaTiempoAire
[7] == Tintoreria
[8] == Varios[01]
[9] == Varios[02]
[10] == Varios[03]
[11] == Varios[04]
[12] == Varios[05]
[13] == Varios[06]
*/
//folio

	$folio = GetFolio();
	echo "Folio [".$folio."],";
//***
	//print_r($_POST);
	$nombre = $_POST['nombre'];
	$fechaComprobante = $_POST['fechaComprobante'];
	$Fecha01 = $_POST['fecha01'];
	$tipoFormulario  = 2;
	$clienteObjetivo = $_POST['clienteObjetivo'];
	$Departamento = $_POST['Departamento'];
	$Varchar01 =$_POST['lugarEstancia'];
	//varchar 2 seran los diferentes conceptos
	$Varchar03 = $_POST['Varchar03']; //los otros lugares
	$Float01 = $_POST['Float01']; //valores con comprobante
	$Float02 = $_POST['Float02']; //valores sin comprobante
	//8 al 13

	$j=0;
	$arrayQuery = [];
	$TotCon =0;
	$TotSin =0;
	for($i=0 ;$i<14;$i++){
	//echo "[".$i."] ";
		
		if ( ($Float01[$i]) >0  or ($Float02[$i] >0)  ){
			if ($i==0) $Varchar02 = "Hospedaje";
			if ($i==1) $Varchar02 = "Transporte Foraneo";
			if ($i==2) $Varchar02 = "Casetas";
			if ($i==3) $Varchar02 = "Desayuno";
			if ($i==4) $Varchar02 = "Comida";
			if ($i==5) $Varchar02 = "Cena";
			if ($i==6) $Varchar02 = "RecargaTiempoAire";
			if ($i==7) $Varchar02 = "Tintoreria";
			if ($i==8) $Varchar02 = "Varios[01]";
			if ($i==9) $Varchar02 = "Varios[02]";
			if ($i==10) $Varchar02 = "Varios[03]";
			if ($i==11) $Varchar02 = "Varios[04]";
			if ($i==12) $Varchar02 = "Varios[05]";
			if ($i==13) $Varchar02 = "Varios[06]";

			if($Float01[$i] =="" ) $Float01[$i] =0;
			if($Float02[$i] =="" ) $Float02[$i] =0;

			$TotCon = $TotCon + $Float01[$i];
			$TotSin = $TotSin + $Float02[$i];
			if ($i < 8 ){
				$sql = 'INSERT INTO tablageneral (folio,nombre,clienteObjetivo,tipoFormulario,fechaComprobante,Varchar01,Varchar02,Float01,Float02,Estado,Fecha01) VALUES ('.$folio.',"'.$nombre.'","'.$clienteObjetivo[0].'",'.$tipoFormulario.',"'.$fechaComprobante.'","'.$Varchar01.'","'.$Varchar02.'",'.$Float01[$i].','.$Float02[$i].',"Pendiente","'.$Fecha01.'")';
						//echo $sql;
						array_push($arrayQuery, $sql);
						//echo "\r\n";
			}else if ($i >7 ){
				$sql = 'INSERT INTO tablageneral (folio,nombre,clienteObjetivo,tipoFormulario,fechaComprobante,Varchar01,Varchar02,Float01,Float02,Varchar03,Estado,Fecha01) VALUES ('.$folio.',"'.$nombre.'","'.$clienteObjetivo[0].'",'.$tipoFormulario.',"'.$fechaComprobante.'","'.$Varchar01.'","'.$Varchar02.'",'.$Float01[$i].','.$Float02[$i].',"'.$Varchar03[$j].'","Pendiente","'.$Fecha01.'")';
				array_push($arrayQuery, $sql);
			}
		}
		if ($i >7 ){$j++;}
	}
	$ban = sqlTablaGeneral($arrayQuery);
	$TotCon =  bcdiv($TotCon,1,2);
	$TotSin =  bcdiv($TotSin,1,2);
	$concepto = "Viaje";
	$importe = ($TotCon+$TotSin);
	$tipoCompro  = "Comprobable";

	if(isset($_POST['DeudaCredito'])){
		if (isset($_POST['checkDeuda'])){
			$DeudaCredito = $_POST['DeudaCredito'];
			$checkDeuda = $_POST['checkDeuda'];
			$FolioDeuda= $_POST['FolioDeuda'];
			if ($ban =1){
				anexarAGastos($DeudaCredito,$FolioDeuda,$importe);
				agregarFolioDeDeuda($FolioDeuda,$nombre,$folio,$concepto,$DeudaCredito,$importe);
			}
		}else{Echo "no se anexa a la deuda, La deuda esta sin cambios";}
	}

	sqlTablaArqueo($ban,$fechaComprobante,$nombre,$importe,$concepto,$Departamento,$folio,$tipoCompro);
	echo "<br>";
	echo ". Total Comprobable: $".$TotCon; 
	echo ", Total Sin Comprobar: $".$TotSin;
	echo " ,Total General: $".($TotCon + $TotSin);
	echo "\r\n";
	//envioCorreo($nombre,$concepto,$Departamento);

//-----------------------		
}else if (isset($_POST['Estacionamiento'])){
	//print_r($_POST);
	$indice=1; //se crea variable para recorrer el arreglo de varchar5
	$TotalGeneral=0;
	$TotalConCompo=0;

	$nombre = $_POST['nombre'];
	//$fechaComprobante = $_POST['fechaComprobante'];
	$fechaRegistro = $_POST['fechaComprobante'];
//--------------------------------
	$date = new DateTime();
	$date->modify('-6 hours');
	
	$hoy = $date->format('Y-m-d');
	echo $hoy;
//--------------------------------------------
	//$hoy = date("Y")."-". date("m")."-". date("d");
	//echo "<br>";
	$fechaComprobante = date($hoy);
	///

	$tipoFormulario  = 3;
	if (isset($_POST['clienteObjetivo'])) {
		$clienteObjetivo = $_POST['clienteObjetivo']; //array
	}
	$Departamento = $_POST['Departamento'];
	//$subTabla = $_POST['SubTabla'];//array
	
	$Varchar01 =$_POST['Departamento'];
	$Varchar02 =$_POST['Placa'];
	$Varchar03 = $_POST['Varchar03'];//array
	$Varchar04 =$_POST['Varchar04']; //array
	$Varchar05 ="SIN";

	if(isset($_POST['Hora01'])){
	$Hora01 = $_POST['Hora01'];//array
	$Hora02 = $_POST['Hora02'];//array
	}
	if (isset($_POST['Float02'])) {
	$Float02 = $_POST['Float02'];
	// = $_POST['Float02'];//array con costo por fraccion de hora
	}
	$Float01 = $_POST['Float01'];  //array con costo por hora 
	//falta $_POST['Comprobante($i)']; , puede o no existir
	$arrayQuery =[];

	$folio = GetFolio();
	echo "El Folio nuevo es: [".$folio."]";

	for($i =0;$i<count($Varchar04);$i++){
		if($Varchar04[$i]=="Estacionamiento" ){
			//if (isset($_POST['Comprobante'.($i+1)])){
			if (isset($_POST['Comprobante'.($i)])){
				//echo "<br>";
				//echo "existe";
				//echo "<br>";
				//$Varchar04 ="Con";
				//Dado que necesitamos un true false, usaremos esto para el fin
				$Varchar05= "CON";
			}else{
				//$Varchar04 ="Sin";
				$Varchar05 = "SIN";
			}
			$query = 'INSERT INTO tablageneral (Folio,Varchar01,Varchar02,nombre,fechaComprobante,Varchar03,Varchar04,clienteObjetivo,Hora01,Hora02,Float01,Float02,tipoFormulario,Varchar05,Estado,Fecha01)Values ('.$folio.',"'.$Varchar01.'","'.$Varchar02.'","'.$nombre.'","'.$fechaComprobante.'","'.$Varchar03[$i].'","'.$Varchar04[$i].'","'.$clienteObjetivo[$i].'","'.$Hora01[$i].'","'.$Hora02[$i].'",'.$Float01[$i].','.$Float02[$i].','.$tipoFormulario.',"'.$Varchar05.'","Pendiente","'.$fechaRegistro.'")';
			//echo "<br>";
			//echo $query;
			//echo "<br>";
			if ($Varchar05 == "CON") {
				$t01=$Float01[$i];
				$t02 = 	$Float02[$i];
				$TotalConCompo = $TotalConCompo +$t01 +$t02 ;
			}
				$t01=$Float01[$i];
				$t02 = 	$Float02[$i];
				$TotalGeneral = $TotalGeneral +$t01 +$t02 ;
				array_push($arrayQuery,$query);
	
		}else if($Varchar04[$i]=="GastosCasetas" ){

		}else if($Varchar04[$i]=="OtrosGastos" ){		

		}
	}

	$ban = sqlTablaGeneral($arrayQuery);

	$concepto = "Estacionamiento";
	$tipoCompro  = "Comprobable";

	echo "Total General: $".$TotalGeneral;echo "<br>";
	$TotCon =  bcdiv($TotalConCompo,1,2);
	$TotSin =  bcdiv($TotalGeneral,1,2);

	$importe = $TotSin; //se decide que en arqueo se pondra el total general en vez de comprobable

		if(isset($_POST['DeudaCredito'])){
		if (isset($_POST['checkDeuda'])){
			$DeudaCredito = $_POST['DeudaCredito'];
			$checkDeuda = $_POST['checkDeuda'];
			$FolioDeuda= $_POST['FolioDeuda'];
			if ($ban =1){
				anexarAGastos($DeudaCredito,$FolioDeuda,$importe);
				agregarFolioDeDeuda($FolioDeuda,$nombre,$folio,$concepto,$DeudaCredito,$importe);
			}
		}else{Echo "no se anexa a la deuda, La deuda esta sin cambios";}
	}

	sqlTablaArqueo($ban,$fechaComprobante,$nombre,$importe,$concepto,$Departamento,$folio,$tipoCompro);

	$concepto="Estacionamiento";
	//envioCorreo($nombre,$concepto,$Departamento);
	

}else if (isset($_POST['Vale'])){
	if ($_POST['Vale'] == "NoComprobable"  ){

	$fechaComprobante = $_POST['fechaComprobante'];
	$nombre = $_POST['nombre'];
	$tipoFormulario  = 4;
	$clienteObjetivo = $_POST['clienteObjetivo'][0];
	$Departamento = $_POST['Departamento'];

	$Varchar01 = $Departamento;
	
	$Varchar02 = $_POST['Varchar02'][0]; //concepto
	$Varchar03 = $_POST['Varchar03'][0]; //observaciones
	$Varchar04 = $_POST['Varchar04'][0]; //autorizo
	$Float01 = $_POST['Float01'][0];
	$arrayQuery =[];
	$Varchar05 = "noComprobable";
		$folio = GetFolio();
	echo "El Folio nuevo es: [".$folio."]";

	$query = 'INSERT INTO tablageneral (Folio,Varchar01,Varchar02,nombre,fechaComprobante,Varchar03,Varchar04,clienteObjetivo,Float01,tipoFormulario,Varchar05,Estado)Values ('.$folio.',"'.$Varchar01.'","'.$Varchar02.'","'.$nombre.'","'.$fechaComprobante.'","'.$Varchar03.'","'.$Varchar04.'","'.$clienteObjetivo.'",'.$Float01.','.$tipoFormulario.',"'.$Varchar05.'","Pendiente")';
	array_push($arrayQuery,$query);

	$ban = sqlTablaGeneral($arrayQuery);
	$concepto = $Varchar02;
	$importe = $Float01;
	$tipoCompro  = "NoComprobable";

		if(isset($_POST['DeudaCredito'])){
		if (isset($_POST['checkDeuda'])){
			$DeudaCredito = $_POST['DeudaCredito'];
			$checkDeuda = $_POST['checkDeuda'];
			$FolioDeuda= $_POST['FolioDeuda'];
			if ($ban =1){
				anexarAGastos($DeudaCredito,$FolioDeuda,$importe);
				agregarFolioDeDeuda($FolioDeuda,$nombre,$folio,$concepto,$DeudaCredito,$importe);
			}
		}else{Echo "no se anexa a la deuda, La deuda esta sin cambios";}
	}

	sqlTablaArqueo($ban,$fechaComprobante,$nombre,$importe,$concepto,$Departamento,$folio,$tipoCompro);

	}
}else if (isset($_POST['ValeProvisional'])){
	$arrayQuery =[];

	$fechaComprobante = $_POST['fechaComprobante'];
	$nombre = $_POST['nombre'];
	$tipoFormulario  = 5; //para Vales Provisionales
	$clienteObjetivo = $_POST['clienteObjetivo'][0];
	$Departamento = $_POST['Departamento'];

	$Varchar01 = $Departamento;
	
	$Varchar02 = $_POST['Varchar02'][0]; //concepto
	$Varchar03 = $_POST['Varchar03'][0]; //observaciones
	$Varchar04 = $_POST['Varchar04'][0]; //autorizo
	$Float01 = $_POST['Float01'][0];
	$Fecha01 = $_POST['Fecha01'];
	$Float02 = $Float01;
	$Varchar05 = "SinNota";
	//echo "\r\n";
	//echo "\r\n";
	$folio = GetFolio();
	echo "El Folio nuevo es: [".$folio."]";
	echo "\r\n";
	echo "\r\n";
	$query = 'INSERT INTO tablageneral (Folio,Varchar01,Varchar02,nombre,fechaComprobante,Varchar03,Varchar04,clienteObjetivo,Float01,tipoFormulario,Varchar05,Fecha01,Estado,Float02)Values ('.$folio.',"'.$Varchar01.'","'.$Varchar02.'","'.$nombre.'","'.$fechaComprobante.'","'.$Varchar03.'","'.$Varchar04.'","'.$clienteObjetivo.'",'.$Float01.','.$tipoFormulario.',"'.$Varchar05.'","'.$Fecha01.'","Pendiente",'.$Float02.')';
	//echo $query;
	array_push($arrayQuery,$query);
	$ban = sqlTablaGeneral($arrayQuery);
	
	$concepto = "Credito";
	$tipoCompro  = "NoComprobable";
	$importe =0;
	$fechaComprobante ="0000-00-00";
	
	envioCorreo($nombre,$concepto,$Departamento,$Float01,$folio);	
	

}elseif (isset($_POST['Casetas'])) {
	//print_r($_POST);

	$TotalGeneral=0;
	$TotalConCompo=0;

	$nombre = $_POST['nombre'];
	//$fechaComprobante = $_POST['fechaComprobante'];
	$fechaRegistro = $_POST['fechaComprobante'];

	$date = new DateTime();
	$date->modify('-6 hours');
	
	$hoy = $date->format('Y-m-d');
	$fechaComprobante = date($hoy);


	$tipoFormulario  = 6;
	if (isset($_POST['clienteObjetivo'])) {
		$clienteObjetivo = $_POST['clienteObjetivo']; //array
	}
	$Departamento = $_POST['Departamento'];
	//$subTabla = $_POST['SubTabla'];//array
	$Varchar01 =$_POST['Departamento'];
	$Varchar02 =$_POST['Placa'];
	$Varchar03 = $_POST['Varchar03'];//array
	$Varchar04 =$_POST['Varchar04']; //array

	$Float01 = $_POST['Float01'];  //array con costo por hora 
	//falta $_POST['Comprobante($i)']; , puede o no existir
	$arrayQuery =[];
	$t01=0;

	$folio = GetFolio();
	//echo "<br>";
	echo "El Folio nuevo es: [".$folio."]";
	//echo "<br>";
	$Varchar05= "CON";
	for($i =0;$i<count($Varchar04);$i++){
		$query = 'INSERT INTO tablageneral (Folio,Varchar01,Varchar02,nombre,fechaComprobante,tipoFormulario,Varchar05,Varchar03,Float01,clienteObjetivo,Varchar04,Estado,Fecha01)Values ('.$folio.',"'.$Varchar01.'","'.$Varchar02.'","'.$nombre.'","'.$fechaComprobante.'",'.$tipoFormulario.',"'.$Varchar05.'","'.$Varchar03[$i].'",'.$Float01[$i].',"'.$clienteObjetivo[$i].'","'.$Varchar04[$i].'","Pendiente","'.$fechaRegistro.'")';
		//echo "<br>";
		array_push($arrayQuery,$query);
		$TotalGeneral= $TotalGeneral + $Float01[$i];
		//echo $query." $".$TotalGeneral;
	}
	

	$ban = sqlTablaGeneral($arrayQuery);

	$concepto = "Caseta";
	$tipoCompro  = "Comprobable";

	//echo "Total General:".$TotalGeneral;echo " \r\n";
	$TotSin =  bcdiv($TotalGeneral,1,2);
	$importe = $TotSin; //se decide que en arqueo se pondra el total general en vez de comprobable

	if(isset($_POST['DeudaCredito'])){
		if (isset($_POST['checkDeuda'])){
			$DeudaCredito = $_POST['DeudaCredito'];
			$checkDeuda = $_POST['checkDeuda'];
			$FolioDeuda= $_POST['FolioDeuda'];
			if ($ban =1){
				anexarAGastos($DeudaCredito,$FolioDeuda,$importe);
				agregarFolioDeDeuda($FolioDeuda,$nombre,$folio,$concepto,$DeudaCredito,$importe);
			}
		}else{Echo "no se anexa a la deuda, La deuda esta sin cambios";}
	}


	echo "el valor final es: $".$importe;
	sqlTablaArqueo($ban,$fechaComprobante,$nombre,$importe,$concepto,$Departamento,$folio,$tipoCompro);


}else{

	echo "no clasificable, revise";
	print_r($_POST);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-----------------------------------Funciones Generales------------------------------------------------------------
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function GetFolio(){
	$sql = "SELECT count(*) FROM tablageneral "; 
	$conn = new db();
	$result = $conn->connect()->prepare($sql); 
	$result->execute(); 
	$Filas = $result->fetchColumn();
	$folio =0;
	if ($Filas >0) {
		$sql = ("SELECT folio FROM tablageneral ORDER BY folio DESC LIMIT 1"); //selecionamos el ultimo folio
		$result= $conn->connect()->prepare($sql);
		$result->execute();
		$folio = $result->fetchColumn();
		$folio +=1; 
	}else{
		$folio =1;
	}
	$conn = null;
	return $folio;
}


function sqlTablaGeneral($arrayQuery){
	$conn = new db();
	$ban =0;
	$reg =0;
	echo "<br>";
	foreach ($arrayQuery as $key => $query) {
			$query = saniza($query);
			$sql = $conn->connect()->prepare($query);
			$sql->execute();
			if (!$sql->errorCode() == "00000") {
				echo "se presenta un error: ".$sql->errorCode()." en el registro:".$reg ;
				$ban = 0;
				$reg++;
			}else{
				echo "registro[".($reg+1)."] Capturado";
				$ban = 1;
				$reg++; 
				echo " \r\n";
			}  				
		}
		echo "<br>";
	$conn = null;
	return $ban;
}

function sqlTablaArqueo($ban,$fechaComprobante,$nombre,$importe,$concepto,$Departamento,$folio,$tipoCompro){
	$conn = new db();
	if ($ban == 1) {
		$Estado="Pendiente";
			
		$query = 'INSERT INTO arqueo (FechaCapturaDatos,Empleado,Importe,Concepto,Departamento,Folio,tipoCompro,Estado,Empresa) 
		VALUES ("'.$fechaComprobante.'","'.$nombre.'",'.$importe.',"'.$concepto.'","'.$Departamento.'",'.$folio.',"'.$tipoCompro.'","Pendiente","Microvar")';
		$query = saniza($query);

		$sql = $conn->connect()->prepare($query);
		$sql->execute();
		if (!$sql->errorCode() == "00000") {
			echo "se presenta un error: ".$sql->errorCode() ;
		}else{echo "El folio[".$folio."] se Captura con exito en Arqueo" ;	
			} 
	}else{
			echo "error de Sql: contacte a sistemas";
		}
	envioCorreo($nombre,$concepto,$Departamento,$importe,$folio);	
	$conn = null;
}

function envioCorreo($nombre,$concepto,$Departamento,$importe,$folio){
		
        $receptor="mmex@estratec.com, auxiliar8@estratec.com";
        $emisor ="mmex@estratec.com";
        $asunto ="Registro por [".$nombre."] de [".$Departamento."]"."[".$concepto."]" ;
//
      	$message = '<html><body>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= "<tr style='background: #eee;'><td><strong>Nombre:</strong> </td><td>" . utf8_encode($nombre). "</td></tr>";
		$message .= "<tr><td><strong>Folio:</strong> </td><td>" . utf8_encode($folio) . "</td></tr>";
		$message .= "<tr><td><strong>Departamento:</strong> </td><td>" . utf8_encode($Departamento) . "</td></tr>";
		$message .= "<tr><td><strong>Concepto:</strong> </td><td>" . utf8_encode($concepto) . "</td></tr>";
		$message .= "<tr><td><strong>Importe:</strong> </td><td>$" . $importe . "</td></tr>";

		$message .= "</table>";
		$message .= "</body></html>";


//
       // $cuerpoCorreo = $nombre." de :".$Departamento." agrega registro por: ".$concepto." por la cantidad de :$".$importe;
		 $cuerpoCorreo = "";
         $cuerpo = '
			        <!DOCTYPE html>
			        <html>
			        <head>
			         <title></title>
			        </head>
			        <body>
			        '.$cuerpoCorreo.'
			        '.$message.'
			        </body>
			        </html>';
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        //dirección del remitente
        $headers .= "From: ".$nombre." <".$emisor.">\r\n";
        //Una Dirección de respuesta, si queremos que sea distinta que la del remitente
        $headers .= "Reply-To: ".$emisor."\r\n";
        if(mail($receptor,$asunto,utf8_decode($cuerpo),$headers)){
    		echo "<script>alert('Se envia notificacion de correo a Contabilidad .');</script>";
    	}else{
    		echo "<script>alert('No se pudo enviar el mail, por favor verifique.');</script>";
    	} 
}

function anexarAGastos(&$DeudaCredito,&$FolioDeuda,&$Total){
	$conn = new db();
	//echo "<br>";
	//echo "los datos son:".$DeudaCredito." ".$FolioDeuda." ".$Total;
	//echo "<br>";
	$sql ="SELECT Float02 FROM tablageneral WHERE folio=".$FolioDeuda;
	//echo $sql;
	//echo "<br>";
	$result = $conn->connect()->prepare($sql); 
	$result->execute();
	$Float02 = $result->fetchColumn();
	echo "<br>";
	echo "El Prestamo era = $".$Float02.", el de total de este movimiento es: $".$Total.", ";
	$resul = $Float02 -$Total;
	$resul =  bcdiv($resul,1,2);
	//$resul = 
	echo "  el nuevo valor de credito sera : $".$resul;
	//echo "<br>";
	//echo "<br>";

	$sql="UPDATE tablageneral SET Float02 = ".$resul." WHERE folio = ".$FolioDeuda;
	//echo $sql;
	$result = $conn->connect()->prepare($sql); 
	$result->execute();
	$conn = null;
}

function agregarFolioDeDeuda(&$FolioDeuda,&$nombre,$folio,&$concepto,&$DeudaCredito,&$Total){
	//echo "<br>";
	//echo "se Recibe:{".$FolioDeuda."} {".$nombre."} {".$folio."} {".$concepto."} {".$DeudaCredito."} {".$Total."}" ;
	//echo "<br>";
	$Varchar02 = "Folio:".$folio;
	$folio =$FolioDeuda;
	$Float01=$Total;
	$Float01 =bcdiv( $Float01 ,1,2);
	$Varchar03=$concepto;


	$sql = "INSERT into tablageneral (folio,tipoFormulario,Estado,nombre,Float01,Varchar02,Varchar03 ) VALUES(".$folio.",5,'Comprobante','".$nombre."',".$Float01.",'".$Varchar02."','".$Varchar03."') ";

	$sql = saniza($sql);
	//echo $sql;

	sqlSolo($sql);

}

function sqlSolo($sql){
	$conn = new db();
	$result = $conn->connect()->prepare($sql); 
	$result->execute();
	echo "<br>";
	echo "[Credito del empleado Actualizado]";
	echo "<br>";
	$conn = null;
}
	
function saniza($variable){
	$search = array("truncate",'delete',"drop","password",);
	//echo "<br>";
	return str_ireplace($search,"NoValido",$variable);
}




?>
