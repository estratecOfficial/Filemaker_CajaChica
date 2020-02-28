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
 // echo "se recibe folio en Tabla:".$folio;
 // echo "<br>";
}else{
	//$folio=41;
  //echo "no se recibe folio, se usa".$folio;
}
//session_start();
ob_start(); //captura la salida sin enviar a pantalla, en buffer
?>
<?php 
////////////////////////////////////////////////////////////////////Inicio de Tabla
//session_start();

include_once '../includes/db.php';
	if(!isset($_SESSION)){ 
      session_start(); 
      $user = $_SESSION['user'] ;
      $nombre = $_SESSION['nombre'];
	} 
$conn = new db();
$sql = "SELECT folio, tipoFormulario,nombre, clienteObjetivo,fechaComprobante,Float01,Varchar01,Varchar02,Varchar03,Varchar04,Varchar05  FROM tablageneral WHERE (1=1) AND (tipoFormulario=4 ) AND(folio =".$folio.") ";
$result = $conn->connect()->prepare($sql); 
$result->execute();

$total = 0;
    foreach($result->fetchAll() as $row ) 
    {   
       //$folio=$row['folio'];
       //$nombre=$row['nombre'];
       $clienteObjetivo = $row['clienteObjetivo'];
       $fechaComprobante =$row['fechaComprobante'];
      
       $Float01 = $row['Float01'];
       $Varchar01 = $row['Varchar01'];
       $Varchar02 = $row['Varchar02'];
       $Varchar03 = $row['Varchar03'];
       $Varchar04 = $row['Varchar04'];
       $Varchar05 = $row['Varchar05'];

    }
    $conn = null;
?>

<head>
    <style>
        html {
        margin: 0;
        padding: 0;
        }
        /*
        @page {
            margin-top: 0.3em;
            margin-left: 0.3em;
            margin-bottom: : 0.3em;
            margin-right: : 0.3em;
        }   */
        /*
        body {
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
    </style>
    </head>

    <body>
      <div id="Conjunto">
        <table class="egt tabla" id="tablaFolio">
            <tr>
                <td> 
                    <div>
                        <p><?php echo "Folio:".$folio."" ?></p>
                    </div>
                </td>
            </tr>
        </table>
        <table class="egt tabla" id="tablaEncabezado">
          <tr> <td> <h2>Gastos Varios</h2></td>
          </tr>
        </table>
        <table class="tabla margenInf" id="nombreFecha" >
          <tr>
            <td height="30px"></td>
          </tr>
            <tr>
                <td style="text-align: right;">Fecha de Comprobacion:  <?php  echo $fechaComprobante."  "?>     </td>
                <td width="20px"></td>
               <!--  <td class ="Datos"><?php  echo $fechaComprobante?></td> -->
            </tr>
            <tr>
            <td height="30px"></td>
          </tr>
        </table>

        <table class="egt tabla" id="tablaGeneral">
          <tr>
            <td class="enca" width="50%">Area</td>
            <td class="enca" width="50%">Bueno Por</td>
          </tr>
            <tr>
              <td><?php echo $Varchar01;?></td> 
            <td><?php echo $Float01; ?> </td>
            </tr>
            
            <tr>
            <td>Concepto</td>
            
            <td height="40 px"><?php  Echo $Varchar02 ?></td>
         
          </tr>
          <tr>
           <td>Observaciones</td>
           <td height="40 px"><?php  Echo $Varchar03 ?></td>
          </tr>
        </table>
        <br>
         <br>
          <br>
        <table class="tabla">
          <thead>
            <tr>
              <td></td>
              <td>Firma de Empleado</td>
              <td></td>
              <td>Autoriza</td>
              <td></td>
              <td width="200px">Recibo</td>
              <td></td>
            </tr>
           </thead>
           <tr>
              <td height="30px"></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
           
              <td></td>
              <td></td>
            </tr>
          <tr>  
            <td></td>
            <td class="fondoNegro"></td>
            <td style="width: 10% "></td>
            <td class="fondoNegro"></td>
            <td style="width: 10% "></td>
            <td class="fondoNegro"></td>
            <td></td>
          </tr>

            <tr>
            
            <td></td>
            <td style="text-align: center; "><?php echo $nombre  ?></td>
             <td></td>
            <td style="text-align: center; "><?php echo $Varchar04 ?></td>
            <td></td>
            <td>Nombre
          <tr>  
            <td height="20px"></td>
            <td ></td>
            <td style="width: 10% "></td>
             <td ></td>
            <td style="width: 10% "></td>
             <td ></td>
            <td></td>
          </tr>   
          </tbody>
        </table>
      </div>  
    </body>
<?php
////////////////////////////////////////////////////////////////////Fin de Tabla
    $dompdf->loadHtml(ob_get_clean());
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $nombreFolio =$nombre." Folio:".$folio.", Otros.pdf";
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
      $nombreFolio =$nombre." Folio:".$folio.", Otros.pdf";
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
