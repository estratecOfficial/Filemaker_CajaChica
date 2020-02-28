<?php
/*
include('database_connection.php');
include('DLL.php');
*/

include('../includes/database_connection.php');
include('../includes/dll.php');
$arrayDepartamentos =[];
$output = [];
$arregloMapa =[
	["0",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,],
	["1",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,],
	["2",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,],
	["3",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,],
	["4",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,],
	["5",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,],
	["6",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,],
	["7",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,],
	["8",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,],
	["9",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,],
	["10",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,],
	["11",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,],
	//["DOCE",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null],
];

//$_POST['Year']=$year = yearActual();

if(isset($_POST["Year"])){
	$year = $_POST["Year"];
	$sqlDeparta = "SELECT distinct Departamento from departamento ORDER by Departamento"; //Sacar todos los departamentos
	$conn = new db();
	$statement = $conn->connect()->prepare($sqlDeparta); 
	$statement->execute();
	$result = $statement->fetchAll();
	$conn = null;
	for ($i=1; $i <=12 ; $i++) {
//Variables
		$mesRecor = numeroAMes($i);
		$mesRecor = substr($mesRecor,0,3);
		//$year = yearActual();
		$ini = firstDay($year,$i);
		$fin = lastDay($year,$i);
		$arrayTotalesTemp =[];
		$totalDepa = count($result);
//Ejecucion, Sacar la sumatoria de datos
		$conn = new db();
		foreach($result as $row){
			$dep = $row["Departamento"]; 
			$sqlMeses ="SELECT (CASE WHEN sum(Importe) IS NULL THEN 0 ELSE sum(Importe) END) As Total from arqueo where (departamento='".$dep."' and FechaCapturaDatos BETWEEN '".$ini."' and '".$fin."') and( Estado ='Pagado') "   ;
			$statement = $conn->connect()->prepare($sqlMeses); 
			$statement->execute();
			$result2 = $statement->fetch();
			$tot= $result2['Total'];
			$arrayTotalesTemp[] = array('Departamento' => $dep, 'Total'=> $tot) ;
		}
		$arrayTotalesTemp[] =  array('Departamento' => "Fin", 'Total'=> 0) ;
		$conn =null;
//-----------Arreglar el MAP
		$arregloMapa[$i-1][0]=$mesRecor;
		for ($y=0; $y <($totalDepa) ; $y++) { 
			$arregloMapa[$i-1][$y+1]=$arrayTotalesTemp[$y]['Total'];
		}
	 }
//------------copiado de map, agregado de indices y preparado de $output
	 for ($x=0; $x <12 ; $x++) {
	 	$output[$x]=array();
	 	for ($y=0; $y <=$totalDepa ; $y++) { 
	 		$indice=ponerIndice($y);
	 		$output[$x][$indice]= $arregloMapa[$x][$y];
	 	}
	 }
//Nullificar variables y envio de Json
	$connect = null;
	$statement = null;
	echo json_encode($output);

}else{
	
}
?>