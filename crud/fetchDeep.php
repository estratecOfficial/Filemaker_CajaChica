<?php
/*
include('database_connection.php');
include('DLL.php');
*/

include('../includes/database_connection.php');
include('../includes/dll.php');

//$_POST["Mes"] = numeroAMes(mesActual());
//echo "se inicia";
if(isset($_POST["Mes"])){
    $mes = $_POST["Mes"];
    if(isset($_POST["year"])){
      $year = $_POST["year"];
    }else{
      $year = yearActual();
    }

    $mes = transformarDia($mes);
    // $ultimoDia = last_month_day($mes);
    $ultimoDia = ultimoDiaMesYear($mes,$year);
    $mes = (int)("0"+$mes);
    $arraySql =[];

    $sql = "SELECT DISTINCT departamento FROM arqueo WHERE (FechaCapturaDatos BETWEEN '".$year."-".$mes."-01' And '".$ultimoDia."' and( Estado ='Pagado') ) ORDER BY Departamento";
    $conn = new db();
    $statement = $conn->connect()->prepare($sql); 
    $statement->execute();
    $result = $statement->fetchAll();

     foreach($result as $row)
     {
       $sqlTemp ="Select sum(Importe) As Total FROM arqueo WHERE departamento= '".$row["departamento"]."' AND (FechaCapturaDatos BETWEEN '".$year."-".$mes."-01' And '".$ultimoDia."' ) and ( Estado ='Pagado')";
       $arraySql[] = array('sql' => $sqlTemp, 'Departamento' => $row["departamento"], 'Total'=> 10) ;
     }

    foreach ($arraySql as $row) {
      $statement = $conn->connect()->prepare($row['sql']);
      $statement->execute();
      $t= $statement->fetch();
      $t= $t['Total'];
      $row['Total'] = $t;
      $output[] = array('Departamento'=> $row["Departamento"],'Total' =>$t);
     }
     echo json_encode($output,JSON_UNESCAPED_UNICODE);
    $connect = null;
    $statement = null;
    $conn = null;


}else{
 // $mes = numeroAMes(mesActual());
}



//-----------------------------------------------------



?>