<?php 

session_start();
include_once '../includes/db.php';

$user = $_SESSION['user'] ;
$nombre = $_SESSION['nombre'];

$conn = new db();
$nombre= "Adrián Villalobos";
$sql = "SELECT DISTINCT folio, nombre, tipoFormulario, fechaComprobante,clienteObjetivo FROM tablageneral WHERE (nombre ='" .$nombre."' ) AND (tipoFormulario = 6 )";
$result = $conn->connect()->prepare($sql); 
$result->execute();

$arregloEnviar = array(); //creamos un array
foreach($result->fetchAll() as $row ) 
{ 

    $folio=$row['folio'];
    $nombre=$row['nombre'];
    $tipoFormulario=$row['tipoFormulario'];
    $fechaComprobante=$row['fechaComprobante'];
    $cliente=$row['clienteObjetivo'];

    $totalCompro=0;
    $totalGeneral=0;
    $conn2 = new db();
    $sql2 ='SELECT sum(float01) as tot FROM tablageneral where ((folio = '.$folio.') and (tipoFormulario = 6) and (Varchar04 = "GastosCasetas") and Varchar05 ="CON" )';

    $result2 = $conn2->connect()->prepare($sql2); 
    $result2 ->execute();

    

///////////////////////////////////////////////////////
        $res2 = $result2->fetch();
        $totalGeneral = floatval($res2['tot']);

        $totalGeneral= sprintf('%0.2f', $totalGeneral);
        
    $arregloEnviar[] = array('folio'=> $folio,'nombre'=> $nombre,'tipoFormulario'=> $tipoFormulario,'fechaComprobante'=> $fechaComprobante,'totalGeneral'=>$totalGeneral,'cliente'=>$cliente);


    $conn2 = null;
}
$json_string = json_encode($arregloEnviar);
echo $json_string;
    
$conn = null;
?>