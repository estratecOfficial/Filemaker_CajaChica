<?php

include_once '../includes/db.php';
$pdo = new db();

//$_POST['type'] = "cliente";
//$_POST['term'] ="Estr";
// (2) SEARCHING FOR?

$data = [];
switch ($_POST['type']) {
  // (2A) INVALID SEARCH TYPE
  default :
    break;
  // (2B) SEARCH FOR USER
  case "cliente":
  // You might want to limit number of results on massive databases
  // SELECT * FROM XYZ WHERE `FIELD` LIKE ? LIMIT 20
  // $stmt = $pdo->prepare("SELECT * FROM clientes WHERE cliente LIKE ?");
    $stmt = $pdo->connect()->prepare("SELECT * FROM clientes WHERE Cliente LIKE ? limit 200");
    $stmt->execute([$_POST['term'] . "%"]);
    while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
      //$data[] = $row['Cliente'];
      $data[] = $row['Cliente'];
    }
    break;
}
// (3) RETURN RESULT
$pdo = null;
echo json_encode($data);
?>