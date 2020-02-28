<?php 

session_start();
include_once '../includes/db.php';
include('../Resources/Fechas.php');

$user = $_SESSION['user'] ;
$nombre = $_SESSION['nombre'];
$fAct = fechaActual(); 
$fAtras = diasMenos($fAct,15);

$conn = new db();
 // 4 para Vales

$sql = "SELECT DISTINCT folio, nombre, tipoFormulario, fechaComprobante, Varchar02, Varchar03, Float01 FROM tablageneral WHERE (nombre ='" .$nombre."' ) AND (tipoFormulario = 4 )AND (fechaComprobante between '".$fAtras."' AND '".$fAct."')";
$result = $conn->connect()->prepare($sql); 
$result->execute();

$arregloEnviar = array(); //creamos un array
foreach($result->fetchAll() as $row ) 
{ 

    $folio=$row['folio'];
    $nombre=$row['nombre'];
    $tipoFormulario=$row['tipoFormulario'];
    $fechaComprobante=$row['fechaComprobante'];
    $importe= $row['Float01'];
    $concepto = $row['Varchar02'];
    $observaciones = $row['Varchar03'];



///////////////////////////////////////////////////////
        
    $arregloEnviar[] = array('folio'=> $folio,'nombre'=> $nombre,'tipoFormulario'=> $tipoFormulario,'fechaComprobante'=> $fechaComprobante, 'importe'=>$importe,'concepto'=>$concepto,'observaciones'=>$observaciones);

}
$json_string = json_encode($arregloEnviar);
echo $json_string;
    
$conn = null;
?>