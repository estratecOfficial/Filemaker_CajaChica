<?php 

session_start();
include_once '../includes/db.php';
include('../Resources/Fechas.php');

$user = $_SESSION['user'] ;
$nombre = $_SESSION['nombre'];
$fAct = fechaActual(); 
$fAtras = diasMenos($fAct,15);

$conn = new db();

$sql = "SELECT DISTINCT folio, nombre, tipoFormulario,clienteObjetivo,fechaComprobante FROM tablageneral WHERE (nombre ='" .$nombre."' ) AND (tipoFormulario = 2 ) AND (fechaComprobante between '".$fAtras."' AND '".$fAct."')";
$result = $conn->connect()->prepare($sql); 
$result->execute();

$arregloEnviar = array(); //creamos un array
foreach($result->fetchAll() as $row ) 
{ 

    $folio=$row['folio'];
    $nombre=$row['nombre'];
    $tipoFormulario=$row['tipoFormulario'];
    $fechaComprobante=$row['fechaComprobante'];
    $clienteObjetivo = $row['clienteObjetivo'];


    $conn2 = new db();
    $sql2 ='SELECT sum(float01) as tot FROM tablageneral where ((folio = '.$folio.') and (tipoFormulario = 2))';

    $result2 = $conn2->connect()->prepare($sql2); 
    $result2 ->execute();

    $conn3 = new db();
    $sql3 ='SELECT sum(float02) as tot FROM tablageneral where ((folio = '.$folio.') and (tipoFormulario = 2))';

    $result3 = $conn3->connect()->prepare($sql3); 
    $result3 ->execute();


///////////////////////////////////////////////////////
        $res2 = $result2->fetch();
        $res3 = $result3->fetch();

        $totalCompro = floatval($res2['tot']);
        $totalSinCompro = floatval($res3['tot']);

    $arregloEnviar[] = array('folio'=> $folio,'nombre'=> $nombre,'tipoFormulario'=> $tipoFormulario,'fechaComprobante'=> $fechaComprobante, 'totalCompro'=>$totalCompro,'totalSinCompro'=>$totalSinCompro,'clienteObjetivo'=>$clienteObjetivo);


    $conn2 = null;
    $conn3 =null;
}
$json_string = json_encode($arregloEnviar);
echo $json_string;
    
$conn = null;
?>