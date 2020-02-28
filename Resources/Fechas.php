<?php



function test(){
    echo "exito";
}

function fechaActual(){
  return date("Y-m-d");
}

function diasMenos($actual,$menos){
  return date("Y-m-d",strtotime($actual."- ".$menos." days"));
}



?>

