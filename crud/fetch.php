<?php
/*
include('database_connection.php');
include('DLL.php');
*/

include('../includes/database_connection.php');
include('../includes/dll.php');


if(isset($_POST["Mes"]))
{
  $mes = $_POST["Mes"];
  $year = $_POST["year"];

  $mes = transformarDia($mes);
  //$ultimoDia = last_month_day($mes);
  $ultimoDia = ultimoDiaMesYear($mes,$year);

  $mes = (int)("0"+$mes);
  $arraySql =[];

  $sql = "SELECT DISTINCT Concepto FROM arqueo WHERE (FechaCapturaDatos BETWEEN '".$year."-".$mes."-01' And '".$ultimoDia."' and( Estado ='Pagado') ) ORDER BY Concepto";

  $conn = new db();
  $statement = $conn->connect()->prepare($sql);
  $statement->execute();
  $result = $statement->fetchAll();
  
  foreach($result as $row){
    $sqlTemp ="Select sum(Importe) As Total FROM arqueo WHERE Concepto= '".$row["Concepto"]."' AND (FechaCapturaDatos BETWEEN '".$year."-".$mes."-01' And '".$ultimoDia."' and( Estado ='Pagado') )";
    $arraySql[] = array('sql' => $sqlTemp, 'Concepto' => $row["Concepto"], 'Total'=> 10) ;
  }

  foreach ($arraySql as $row) {
    $statement = $conn->connect()->prepare($row['sql']);
    $statement->execute();
    $t= $statement->fetch();

   	$t= $t['Total'];
   	$row['Total'] = $t;
   	$output[] = array('Concepto'=> $row["Concepto"],'Total' =>$t);
  }
  $connect = null;
  $statement = null;
  $conn = null;

  echo json_encode($output);
}else{
}

?>