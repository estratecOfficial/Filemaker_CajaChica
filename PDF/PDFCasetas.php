<?php 

require_once 'dompdf/autoload.inc.php';

//
function removeDirectory($path)
{
    $path = rtrim( strval( $path ), '/' ) ;
    $d = dir( $path );
    if( ! $d )
        return false;
    while ( false !== ($current = $d->read()) )
    {
        if( $current === '.' || $current === '..')
            continue;
        $file = $d->path . '/' . $current;
        if( is_dir($file) )
            removeDirectory($file);
        if( is_file($file) )
            unlink($file);
    }
    rmdir( $d->path );
    $d->close();
    return true;
}

//
use Dompdf\Dompdf;
use Dompdf\Options;
$dompdf = new Dompdf();

///DOMPDF

if(isset($_POST['folio'])){
  $folio = $_POST['folio'];
}else{
}



ob_start(); //captura la salida sin enviar a pantalla, en buffer
////////////////////////////////////////////////////////////////////Inicio de Tabla
//session_start();

include_once '../includes/db.php';
	if(!isset($_SESSION)){ 
      session_start(); 
      $user = $_SESSION['user'] ;
      $nombre = $_SESSION['nombre'];
	} 
$conn = new db();
$sql = "SELECT * FROM tablageneral WHERE (nombre = '".$nombre."') AND (tipoFormulario = 6 ) AND(folio =".$folio.") ";
$result = $conn->connect()->prepare($sql); 
$result->execute();

$arrayElementos =[];
$arrayEstacionamiento =[];
$arrayCaseta=[];
$arrayOtros =[];



$total = 0;

    $totalConEsta = 0;
    $totalSinEsta = 0;
    $totalCasetas =0;
    $totalOtros=0;
    foreach($result->fetchAll() as $row ) 
    {   
       //$folio=$row['folio'];
       $nombre=$row['nombre'];
       $fechaComprobante =$row['fechaComprobante'];
       $fechaCaptura =$row['Fecha01'];
       $departamento = $row['Varchar01'];
       $Varchar02 =$row['Varchar02'] ; //placas;
       $Varchar04 = $row['Varchar04']; // tipo de micro tabla;

       if($Varchar04 == "GastosCasetas"){

          $Varchar03 = $row['Varchar03']; //Destino
          $Float01 = $row['Float01'];
          $clienteObjetivo = $row['clienteObjetivo'];

          $e1="<td colspan=2>".$Varchar03."</td>";
          $e2="<td colspan=2>$".$Float01."</td>";
          $e3="<td colspan=2>".$clienteObjetivo."</td>";

          $ele =  $e1.$e2.$e3;

          $totalCasetas = $totalCasetas + $Float01;
          array_push($arrayCaseta,$ele);

       }else if($Varchar04 == "OtrosGastos"){
          $Varchar03 = $row['Varchar03']; //ubicacion Caseta
          $Varchar05 = $row['Varchar05']; //Concepto
          $Float01 = $row['Float01'];

          $totalOtros = $totalOtros + $Float01;

          $e1="<td >".$Varchar03."</td>";
          $e2="<td>".$Varchar05."</td>";
          $e3="<td>$".$Float01."</td>";

          $ele =  $e1.$e2.$e3;

          array_push($arrayOtros,$ele);
       }


    }

    $conn = null;
       $eleCaseta = count($arrayCaseta);
       $eleOtros =  count($arrayOtros);
       //echo "elementos de caseta: ".$eleCaseta." ,de otros :".$eleOtros;
      $mayor=0;
      if ($eleCaseta > $eleOtros){
          $mayor =$eleCaseta;
      }else{
        $mayor = $eleOtros;
      }

?>
  <style>
        html {
        margin: 0;
        }

        @page {
            margin-top: 0.3em;
            margin-left: 0.3em;
        }   
        /*
        bod.y {
        font-family: "Times New Roman", serif;
        margin: 45mm 8mm 2mm 8mm;
        }
        */
        /*
            /*
        utilizo el tag <hr> para salto de pagina con las siguientes propiedades CSS:
        
        hr {
        page-break-after: always;
        border: 0;
        margin: 0;
        padding: 0;
        }

        */
        #cuerpo {
          width: 90%;
           margin-right: auto;
          margin-left: auto;
        }

        .titulo{

        }

        .texto{

        }

        #Conjunto {
          width: 95%;
          /*height: 95%;*/
          border: 1px solid;
          margin-right: auto;
          margin-left: auto;
          margin-bottom: 10px;
        }
        #tablaFolio {
          text-align: right;
          padding-right: 50px!important;
        }
        #tablaGeneral{
            width: 100%;
            background: white;
            border: 1px solid #ddd;
           padding: 8px;
        }

        #tablaGeneral td,#tablaGeneral th {
         border: 1px solid #ddd;
         padding: 2px;
        }
         
        .bordeNegro{
           border: 2px solid !important;
        }  

        #tablaGeneral .Trans{
          width: 10%;
        }
        #tablaGeneral .Trans{
          width: 12%;
        }
        #tablaGeneral .Cos{
          width: 10%;
        }
        #tablaGeneral .Clien{
          text-align: left;
          padding-left:5px;
        }
        
        .fondoNegro{
          background: black;
        }

        #tablaGeneral p{
            margin-left: auto;
            margin-right: auto;
            background: blue;
        }
        .tabla{
           font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
           border-collapse: collapse;
           width: 100%;
           background:white;
           text-align: center;
          /* border: 1px solid #ddd;*/
           color: black;
           font-size: 10px;

        }
        .divisorNegro{
          background: black;
          border: 1px solid black;
        }
        .tabla td{
          /* border: 1px solid #ddd;*/
         padding: 2px;
        }
        .tabla th {
         /* border: 1px solid #ddd;*/
         padding: 2px;
        }
        .cuadra{
          border: 1px solid #ddd;
        }
        .cuadra td{
          border: 1px solid #ddd;
        }
        .cuadra th{
          border: 1px solid #ddd;
        }

        .margenInf{
          margin-bottom: 5px;
        }
        .tabla tr:nth-child(even){background-color: #f2f2f2;}
        .Datos{
          text-decoration: underline;
        }

        #customers tr:hover {background-color: #ddd;}
        #tablaGeneral .enca {
          padding-top: 3px;
          padding-bottom: 3px;
          text-align: center;
          background-color: gray;
          color: white;
        }
  
    .centro{
      text-align: center;
    }
        
    </style>
<body>
  <div id=cuerpo> 
    <div id="1">
        <table class="egt tabla" id="tablaFolio">
            <tr>
                <td> 
                    <div>
                        <p><?php echo "Folio:".$folio ?></p>
                    </div>
                </td>
            </tr>
        </table>
        <table class="egt tabla" id="tablaEncabezado">
          <tr>
            <td class= "cuadra"> <h1>Comprobación de Gastos por Casetas</h1></td>
          </tr>
                      <tr ></tr>
        </table>
        <table class=" cuadra tabla" id="nombreFecha" >
            <tr>
               
                <td> Departamento</td>
                <td><?php echo $departamento ?></td>
                <td colspan="1"></td>
                <td colspan="2"> Placa:</td>
                <td colspan="3"><?php echo $Varchar02?></td>

            </tr>
            <tr>
                
                <td> Nombre:</td>
                <td><?php echo $nombre ?></td>
                <td colspan="1"></td>
                <td colspan="2">Folio</td>
                <td colspan="3"><?php  echo $folio?></td>
            </tr>
            <tr>
                
                <td> Fecha de Captura:</td>
                <td><?php echo $fechaComprobante ?></td>
                <td colspan="1"></td>
                <td colspan="2">Fecha de Gasto</td>
                <td colspan="3"><?php  echo $fechaCaptura  ?></td>
            </tr>
             <tr>
                
                <td></td>
                <td></td>
                <td colspan="1"></td>
                <td colspan="2"></td>
                <td colspan="3"></td>
            </tr>
            <tr>
            <td colspan="9"><h3>Gastos Casetas</h3></td>
            </tr>
          <tr>
            
            <td colspan=2>Destino</td>
            <td colspan=2>Costo</td>
            <td colspan=2>Cliente</td>
            <td></td>
            <td></td>            
          </tr>
          <tr>
              <td style="height: 10px;"></td>              
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>              
          </tr>
          <tr>
            <?php  
            //echo "<td></td>";
            for ($i=0;$i <=$mayor;$i++){
              if(count($arrayCaseta)>$i  )  {
                echo $arrayCaseta[$i];
                echo "<td></td>";
                echo "<td></td>";
        
              }else{
                echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
                echo " <tr>
                <td></td>
                <td></td>
                <td>Total </td>
                <td>$".$totalCasetas."</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>";
                echo "<tr>";
                echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
                echo"</tr>";
              }
              //echo "<td></td>";
              
              //echo "<td></td>";
                echo "</tr>";
                echo "<tr>";
               // echo "<td></td>";
               // echo $arrayOtros[$i];
            }
 
            ?>
            <tr>
                <td></td>
                <td></td>
                <!-- <td>Total </td>
                <td><?php echo "$".($totalCasetas) ?></td>-->
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
          </tr>
        </table>

        <table class="egt tabla" id="tablaFolio">
            <tr>
              <td style="height: 10px;"></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              
            </tr>
            <tr>
              <td style="height: 30px;"></td>
              <td></td>
              <td></td>
              <td> </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              
            </tr>
            <tr>
              <td style="height: 40px"></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
             
            </tr>
            <tr>
              <td style="width:10%"></td>             
              <td class="fondoNegro" colspan="1" style="width:35%"></td>
              <td></td>
              <td></td>
              <td colspan="1" class="fondoNegro" style="width:35%"></td>
              <td></td>
            </tr>
            <tr>
              <td ></td>
              <td colspan="1" class = "centro" >Firma de Empleado</td>
              <td></td>
              <td></td>
              <td colspan="1" class = "centro">Autoriza(nombre y firma)</td>
              <td></td>
              <td></td>
              <td></td>
              
            </tr>
            <tr>
              <td></td>
              <td colspan="1" class = "centro"><?php echo $nombre  ?></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              
            </tr>    
        </table>
    </div> 
  </div>
</body>
<?php
////////////////////////////////////////////////////////////////////Fin de Tabla

    $dompdf->loadHtml(ob_get_clean());
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $nombreFolio =$nombre." Folio:".$folio.", Casetas.pdf";
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
  $folderPath ="temp/".$user;
  
  if(strpos($user_agent, 'Linux') !== FALSE)
    {
      $output = $dompdf->output();
      //echo $folderPath."<br>";
      //echo "se ejecuta ";

      removeDirectory($folderPath);

       if (!is_dir('temp/' . $user)) {
        // dir doesn't exist, make it
        mkdir('temp/' . $user);
      }

      file_put_contents("temp/".$user."/".$folio.".pdf", $output);
      echo "<br>";
      echo "<h5>PDF Generado, Descargue PDF y Cierre para regresar </h5>";

      echo "<br>";
      $filePath = "temp/".$user."/".$folio.".pdf";

      if (!file_exists($filePath)) {
          echo "The file $filePath does not exist";
          die();
      }

      echo '<a href="'.$filePath.'" target="_blank" class=" BotonPDF btn btn-success btn-lg active" role="button" aria-pressed="true">Descargar<img border="0" alt="PDF" src="../Resources/Img/PDF.ico" width="100" height="100">Descargar</a>';

      echo "<br>";
      // echo '<a target="_blank" href="'.$filePath.'">pdf ejemplo</a>';

      ?>
      <button onclick="boton()" class=" BotonSalir btn btn-danger" >Cerrar<img border="0" alt="PDF" src="../Resources/Img/exit.png" width="100" height="100">Cerrar</button>  
      <?php

      //
      /*
      $file = $filePath;
      $filename = "prueba.pdf"; // el nombre con el que se descargara, puede ser diferente al original 
      header("Content-type: application/octet-stream"); 
      header("Content-Type: application/force-download"); 
      header("Content-Disposition: attachment; filename=\"$filename\"\n"); readfile($file); 
      */
      //

    }
    else{
      //  Funciona
      $nombreFolio =$nombre." Folio:".$folio.", Caseta.pdf";
        //$nombreFolio ="Test";
        $dompdf->stream($nombreFolio);
        

    }
  echo "  
  <script>
  function boton(){
    alert(' Regresando ');

    window.close();
  }
  </script>";


?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<style type="text/css">
  html {
  font-family: "Lucida Sans", sans-serif;
}
.header {
  background-color: #9933cc;
  color: #ffffff;
  padding: 15px;
}
.BotonPDF{
  width: 100%;
  height: 35%;
}
.BotonSalir{
  width: 100%;
  height: 25%;

}
  </style>
