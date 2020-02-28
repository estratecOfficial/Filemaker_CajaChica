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

use Dompdf\Dompdf;
use Dompdf\Options;
$dompdf = new Dompdf();

///DOMPDF

if(isset($_POST['folio'])){
  $folio = $_POST['folio'];

}else{

}

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
$sql = "SELECT folio, tipoFormulario,nombre, clienteObjetivo,fechaComprobante,Float01,Float02,Varchar01,Varchar02,Varchar03,Fecha01  FROM tablageneral WHERE (nombre='".$nombre."') AND (tipoFormulario=2 ) AND(folio =".$folio.") ";
$result = $conn->connect()->prepare($sql); 
$result->execute();

$arrayElementos =[];
//echo "<br>";

$arrayHospe=[];
$arrayAli=[];
$arrayOtros=[];

$totalCon = 0;
$totalSin =0;
$TotalBloqueHospeCon =0;
$TotalBloqueHospeSin =0;
$TotalBloqueAliCon=0;
$TotalBloqueAliSin=0;
$TotalBloqueOtroCon=0;
$TotalBloqueOtroSin=0;
$B1=$B2=$B3=0;
    foreach($result->fetchAll() as $row ) 
    {   
       //$folio=$row['folio'];
       $nombre=$row['nombre'];
       $clienteObjetivo = $row['clienteObjetivo'];
       $fechaComprobante =$row['fechaComprobante'];
       $Fecha01 =$row['Fecha01'];
       $clienteObjetivo =$row ['clienteObjetivo'];
       $Float01 = $row['Float01'];
       $Float02 = $row['Float02'];
       
       $Varchar01 = $row['Varchar01'];
       $Varchar02 = $row['Varchar02'];
       $Varchar03 = $row['Varchar03'];
        //$Fecha01 = $row['Fecha01'];
       //-------

       //-------
       $totalFila=0;

       $totalCon  = $totalCon + $Float01;
       $totalSin  = $totalSin + $Float02;
       $totalFila = $Float01  + $Float02;

       if(($Varchar02 =='Hospedaje') Or ($Varchar02 =='Transporte Foraneo')Or ($Varchar02 =='Casetas')){
        $TotalBloqueHospeCon = $TotalBloqueHospeCon + $Float01;
        $TotalBloqueHospeSin = $TotalBloqueHospeSin + $Float02; 

       $e1="<td class='Concepto'>".$Varchar02."</td>";
       $e2= "<td class='ConCom'>$".$Float01."</td>";
       $e3= "<td class='SinCom'>$".$Float02."</td>";
       $e4= "<td class='Importe'>$".$totalFila."</td>";

        $ele =  $e1.$e2.$e3.$e4;
        array_push($arrayHospe, $ele);
       }

       if(($Varchar02 =='Desayuno') Or ($Varchar02 =='Comida')Or ($Varchar02 =='Cena')){
        $TotalBloqueAliCon += $Float01;
        $TotalBloqueAliSin += $Float02;

       $e1="<td class='Concepto'>".$Varchar02."</td>";
       $e2= "<td class='ConCom'>$".$Float01."</td>";
       $e3= "<td class='SinCom'>$".$Float02."</td>";
       $e4= "<td class='Importe'>$".$totalFila."</td>";

        $ele =  $e1.$e2.$e3.$e4;
        array_push($arrayAli, $ele); 
       }

       if(($Varchar02 =='RecargaTiempoAire') Or ($Varchar02 =='Tintoreria')Or ($Varchar02 =='Varios[01]')Or ($Varchar02 =='Varios[02]')Or ($Varchar02 =='Varios[03]')Or ($Varchar02 =='Varios[04]')Or ($Varchar02 =='Varios[05]')Or ($Varchar02 =='Varios[06]')){

        $TotalBloqueOtroCon += $Float01;
        $TotalBloqueOtroSin += $Float02;

       //$e1="<td class='Concepto'>".$Varchar02."</td>";
        if ($Varchar02 =="RecargaTiempoAire" || $Varchar02 =="Tintoreria" ){
          $concepto= $Varchar02;
        }else{
           $concepto="";
        }
        
       $e1="<td class='Concepto'>".$concepto."".$Varchar03."</td>";
       $e2= "<td class='ConCom'>$".$Float01."</td>";
       $e3= "<td class='SinCom'>$".$Float02."</td>";
       $e4= "<td class='Importe'>$".$totalFila."</td>";

        $ele =  $e1.$e2.$e3.$e4;
        array_push($arrayOtros, $ele); 
       }

      
     
    }
    //echo "<br>";
    $conn = null;

//***********************************************************************************

      foreach ($arrayHospe as $value) {
       $con = (string)$value;
       $arrayElemento[] = $con;
      }
      
        if(($TotalBloqueHospeCon >0)or($TotalBloqueHospeSin >0)){
        $e1="<td class='Concepto bordeNegro'>"."==Total Transporte=="."</td>";
        $e2= "<td class='ConCom bordeNegro'>$".$TotalBloqueHospeCon."</td>";
        $e3= "<td class='SinCom bordeNegro'>$".$TotalBloqueHospeSin."</td>";
        $e4= "<td class='Importe bordeNegro'>$".($TotalBloqueHospeCon+$TotalBloqueHospeSin)."</td>";
        $ele =  $e1.$e2.$e3.$e4;
       $arrayElemento[] =$ele;
       /*
       $e1= "<td class='Concepto'>_______________</td>";
       $e2= "<td class='ConCom'>_______________</td>";
       $e3= "<td class='SinCom'>_______________</td>";
       $e4= "<td class='Importe'>_______________</td>";
      */
       $e1= "<td class='Concepto' style='height: 10px;'></td>";
       $e2= "<td class='ConCom'></td>";
       $e3= "<td class='SinCom'></td>";
       $e4= "<td class='Importe'></td>";

        $ele =  $e1.$e2.$e3.$e4;
        $arrayElemento[] =$ele;

      }
      foreach ($arrayAli as $value) {
       $con = (string)$value;
       $arrayElemento[] = $con;
      }
      
      if(($TotalBloqueAliCon >0)or($TotalBloqueAliSin >0)){
        $e1="<td class='Concepto bordeNegro'>"."==Total Alimento=="."</td>";
        $e2= "<td class='ConCom bordeNegro'>$".$TotalBloqueAliCon."</td>";
        $e3= "<td class='SinCom bordeNegro'>$".$TotalBloqueAliSin."</td>";
        $e4= "<td class='Importe bordeNegro'>$".($TotalBloqueAliCon+$TotalBloqueAliSin)."</td>";
        $ele =  $e1.$e2.$e3.$e4;
       $arrayElemento[]= $ele;
       $e1= "<td class='Concepto' style='height: 10px;'></td>";
       $e2= "<td class='ConCom'></td>";
       $e3= "<td class='SinCom'></td>";
       $e4= "<td class='Importe'></td>";

        $ele =  $e1.$e2.$e3.$e4;
        $arrayElemento[] =$ele;
      }
      
      foreach ($arrayOtros as $array) {
      // echo "<tr>";
      $arrayElemento[] =$array;
      // echo "</tr>";
      }
      if(($TotalBloqueOtroCon >0)or($TotalBloqueOtroSin >0)){
        $e1="<td class='Concepto bordeNegro'>"."==Total Otros=="."</td>";
        $e2= "<td class='ConCom bordeNegro'>$".$TotalBloqueOtroCon."</td>";
        $e3= "<td class='SinCom bordeNegro'>$".$TotalBloqueOtroSin."</td>";
        $e4= "<td class='Importe bordeNegro'>$".($TotalBloqueOtroCon+$TotalBloqueOtroSin)."</td>";
        $ele =  $e1.$e2.$e3.$e4;
      $arrayElemento[] =$ele;
       $e1= "<td class='Concepto' style='height: 10px;'></td>";
       $e2= "<td class='ConCom'></td>";
       $e3= "<td class='SinCom'></td>";
       $e4= "<td class='Importe'></td>";
        $ele =  $e1.$e2.$e3.$e4;
        $arrayElemento[] =$ele;
      }   

      


//***********************************************************************************

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
          width: 90%;
          /*height: 95%;*/
          border: 0px solid;
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
            border: 0px solid #ddd;
           padding: 8px;
        }

        #tablaGeneral td,#tablaGeneral th {
         border: 0px solid #ddd;
         padding: 2px;
        }
         
        .bordeNegro{
           border: 1  px solid !important;
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
          <tr> <td> <h2>Comprobacion de Gatos de Viaje</h2></td>
          </tr>
        </table>
        <br>
        <div id= DatosGenerales>
          <table class="egt tabla" id="Datos">
          <tr> 
            <td>Empresa Por La Que Realiza Viaje:</td>
            <td><?php echo $clienteObjetivo;?> </td>
          </tr>
          <tr> 
            <td>Nombre de Quien Viaja:</td>
            <td><?php echo $nombre; ?></td>
          </tr>
          <tr> 
            <td>Fecha Comprobante</td>
            <td><?php echo $fechaComprobante ?></td>
          </tr>
          <tr>
             <td>Gastos del dia</td>
              <td><?php echo $Fecha01 ?></td>
          </tr>
          <tr> 
            <td>Lugar de Estancia</td>
            <td><?php echo $Varchar01 ?></td>
          </tr>
        </table>
        </div>
        <br>
      <table class="egt tabla" id="tablaGeneral">
          <tr>
            <td class="enca">Concepto</td>
            <td class="enca">Con Comprobante</td>
            <td class="enca">Sin Comprobante</td>
            <td class="enca">Importe</td>
          </tr>
            <?php 
                foreach ($arrayElemento as $array) {
                    echo "<tr>";
                   echo $array;
                    echo "</tr>";
                }
                    
            ?>
            <tr>
            <td class="bordeNegro">Total</td>
            <td class="bordeNegro"><?php echo "$".$totalCon;  ?></td>
            <td class="bordeNegro"><?php echo "$".$totalSin;  ?></td>
            <td class="bordeNegro"><?php echo "$".($totalCon+$totalSin);  ?></td>

          </tr>
        </table>
 <br>
         <br>
          <br>
        <table class="tabla">
          <thead>
          <tr>  
            <td></td>
            <td></td>
            <td class="fondoNegro"></td>
            <td style="width: 20% "></td>
            <td class="fondoNegro"></td>
            <td></td>
          </tr>
           <tr>
            <td></td>
            <td></td>
            <td>Firma de Empleado</td>
            <td></td>
            <td>Autoriza(nombre y firma)</td>
            <td></td>
          </tr>
            <tr>
            <td></td>
            <td></td>
            <td style="text-align: center; "><?php echo $nombre  ?></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>    
         <!-- </tbody> -->
        </table>

      </div>  
    </body>
<?php
////////////////////////////////////////////////////////////////////Fin de Tabla
    $dompdf->loadHtml(ob_get_clean());
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $nombreFolio =$nombre." Folio:".$folio.", Viaje.pdf";
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
      //$nombreFolio =$nombre." Folio:".$folio.", ValeProvisional.pdf";
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
