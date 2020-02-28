<?php 

session_start();
include_once '../includes/db.php';

$user = $_SESSION['user'] ;
$nombre = $_SESSION['nombre'];

$conn = new db();
 // 5 para Vales Provisionales
//$nombre = "Adrián Villalobos";
//echo $nombre;
$sql = "SELECT folio,Float02 FROM tablageneral WHERE ((nombre ='" .$nombre."' ) AND (tipoFormulario = 5 ) AND (Estado = 'Pendiente'))";

$result = $conn->connect()->prepare($sql); 
$result->execute();

$arregloEnviar = array(); //creamos un array
foreach($result->fetchAll() as $row ) 
{ 
    $folio=$row['folio'];
    $importe = $row['Float02'];
///////////////////////////////////////////////////////
        
$arregloEnviar[] = array('folio'=> $folio,'importe' =>$importe);
}
$json_string = json_encode($arregloEnviar);
echo $json_string;
    
$conn = null;
?>