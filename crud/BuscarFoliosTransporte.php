<?php 

session_start();
include_once '../includes/db.php';
include_once ('../Resources/Fechas.php');

$user = $_SESSION['user'] ;
$nombre = $_SESSION['nombre'];
//-------
$fAct = fechaActual(); 
$fAtras = diasMenos($fAct,15);
//------
$conn = new db();
//$sql = "SELECT DISTINCT folio, nombre, tipoFormulario, fechaComprobante FROM tablageneral WHERE (nombre ='" .$nombre."' ) AND (tipoFormulario = 1 )";
//$sql = "SELECT DISTINCT folio, nombre, tipoFormulario, fechaComprobante FROM tablageneral WHERE (nombre ='" .$nombre."' ) AND (tipoFormulario = 1 ) AND (fechaComprobante between '".$fAtras."' AND '".$fAct."')";
$sql = "SELECT DISTINCT folio, nombre, fechaComprobante FROM tablageneral WHERE (nombre ='" .$nombre."' ) AND (tipoFormulario = 1 ) AND (fechaComprobante between '".$fAtras."' AND '".$fAct."')";
$result = $conn->connect()->prepare($sql); 
$result->execute();

$arregloEnviar = array(); //creamos un array
foreach($result->fetchAll() as $row ) 
{ 
    $folio=$row['folio'];
    $nombre=$row['nombre'];
    //$tipoFormulario=$row['tipoFormulario'];
    $fechaComprobante=$row['fechaComprobante'];
    $total=0;
    $conn2 = new db();
    $sql2 = 'SELECT sum(float01) FROM tablageneral where folio = '.$folio;
    $result2 = $conn2->connect()->prepare($sql2); 
    $result2 ->execute();
    foreach ($result2->fetchAll() as $filaTotal){
    $total =$filaTotal[0];
    }
    //$arregloEnviar[] = array('folio'=> $folio,'nombre'=> $nombre,'tipoFormulario'=> $tipoFormulario,'fechaComprobante'=> $fechaComprobante, 'totalfolio'=>$total);
      $arregloEnviar[] = array('folio'=> $folio,'nombre'=> $nombre,'fechaComprobante'=> $fechaComprobante, 'totalfolio'=>$total);
    $conn2 = null;
}
$json_string = json_encode($arregloEnviar);
echo $json_string;
    
$conn = null;
?>