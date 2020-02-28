<?php 

session_start();
include_once '../includes/db.php';
include('../Resources/Fechas.php');

$user = $_SESSION['user'] ;
$nombre = $_SESSION['nombre'];
$fAct = fechaActual(); 
$fAtras = diasMenos($fAct,15);

$conn = new db();

//$sql = "SELECT DISTINCT folio, nombre, tipoFormulario, fechaComprobante FROM tablageneral WHERE (nombre ='" .$nombre."' ) AND (tipoFormulario = 3 ) AND (fechaComprobante between '".$fAtras."' AND '".$fAct."')";
$sql = "SELECT DISTINCT folio, nombre, fechaComprobante FROM tablageneral WHERE (nombre ='" .$nombre."' ) AND (tipoFormulario = 3 ) AND (fechaComprobante between '".$fAtras."' AND '".$fAct."')";
$result = $conn->connect()->prepare($sql); 
$result->execute();

$arregloEnviar = array(); //creamos un array
foreach($result->fetchAll() as $row ) 
{ 

    $folio=$row['folio'];
    $nombre=$row['nombre'];
    //$tipoFormulario=$row['tipoFormulario'];
    $fechaComprobante=$row['fechaComprobante'];

    $totalCompro=0;
    $totalGeneral=0;
    $conn2 = new db();
    $sql2 ='SELECT sum(float01 +Float02) as tot FROM tablageneral where ((folio = '.$folio.') and (tipoFormulario = 3) and (Varchar04 = "Estacionamiento") and Varchar05 ="CON" )';

    $result2 = $conn2->connect()->prepare($sql2); 
    $result2 ->execute();

    $conn3 = new db();
    $sql3 ='SELECT sum(float01 +Float02) as tot FROM tablageneral where ((folio = '.$folio.') and (tipoFormulario = 3) and (Varchar04 = "Estacionamiento") and Varchar05 ="SIN" )';

    $result3 = $conn3->connect()->prepare($sql3); 
    $result3 ->execute();

    /*
    $conn4 = new db();
    $sql4 ='SELECT sum(float01)as tot FROM tablageneral where ((folio = '.$folio.') and (tipoFormulario =3) and (Varchar04 != "Estacionamiento"))';

    $result4 = $conn4->connect()->prepare($sql4); 
    $result4 ->execute();
    */

///////////////////////////////////////////////////////
    $res2 = $result2->fetch();
    $res3 = $result3->fetch();
    //$res4 = $result4->fetch();
    $res4['tot'] =0;
    $totalCompro = floatval($res2['tot']+$res4['tot']);
    $totalGeneral = floatval($res2['tot']+$res3['tot']+$res4['tot']);

    $totalCompro= sprintf('%0.2f', $totalCompro);
    $totalGeneral= sprintf('%0.2f', $totalGeneral);
        
    // $arregloEnviar[] = array('folio'=> $folio,'nombre'=> $nombre,'tipoFormulario'=> $tipoFormulario,'fechaComprobante'=> $fechaComprobante, 'totalCompro'=>$totalCompro,'totalGeneral'=>$totalGeneral);

    $arregloEnviar[] = array('folio'=> $folio,'nombre'=> $nombre,'fechaComprobante'=> $fechaComprobante, 'totalCompro'=>$totalCompro,'totalGeneral'=>$totalGeneral);


    $conn2 =null;
    $conn3 =null;
    $conn4 =null;
}
$json_string = json_encode($arregloEnviar);
echo $json_string;
    
$conn = null;
?>