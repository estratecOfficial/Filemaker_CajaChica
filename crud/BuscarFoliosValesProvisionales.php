<?php 

session_start();
include_once '../includes/db.php';
include('../Resources/Fechas.php');

if ( isset( $_SESSION['nombre']) ) {
	$user = $_SESSION['user'] ;
	$nombre = $_SESSION['nombre'];
	$fAct = fechaActual(); 
	$fAtras = diasMenos($fAct,15);

	$conn = new db();
	 // 5 para Vales Provisionales

	$sql = "SELECT DISTINCT folio, nombre, tipoFormulario, fechaComprobante, Varchar02, Varchar03, Float01, Fecha01, Estado FROM tablageneral WHERE (nombre ='" .$nombre."' ) AND (tipoFormulario = 5 ) AND (Estado !='Comprobante') AND (fechaComprobante between '".$fAtras."' AND '".$fAct."')";
	$result = $conn->connect()->prepare($sql); 
	$result->execute();

	$arregloEnviar = array(); //creamos un array
	foreach($result->fetchAll() as $row ) 
	{ 

	    $folio=$row['folio'];
	    $fechaComprobante=$row['fechaComprobante'];
	    $fechaLimite=$row['Fecha01'];
	    $importe= $row['Float01'];
	    $concepto = $row['Varchar02'];
	    $observaciones = $row['Varchar03'];
	    $Estado = $row['Estado'];



	///////////////////////////////////////////////////////
	        
	$arregloEnviar[] = array('folio'=> $folio,'fechaComprobante'=> $fechaComprobante,'fechaLimite'=> $fechaLimite, 'importe'=>$importe,'concepto'=>$concepto,'observaciones'=>$observaciones,'Estado'=>$Estado);
	}
	$json_string = json_encode($arregloEnviar);
	echo $json_string;
	    
	$conn = null;
}
?>