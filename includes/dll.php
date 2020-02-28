<?php

function numeroAMes($mes){
	switch ($mes) {
		case '1':
			return "Enero";
			break;
		case '2':
			return "Febrero";
			break;
		case '3':
			return "Marzo";
			break;
		case '4':
			return "Abril";
			break;
		case '5':
			return "Mayo";
			break;
		case '6':
			return "Junio";
			break;
		case '7':
			return "Julio";
			break;
		case '8':
			return "Agosto";
			break;
		case '9':
			return "Septiembre";
			break;
		case '10':
			return "Octubre";
			break;
		case '11':
			return "Noviembre";
			break;
		case '12':
			return "Diciembre";
			break;
	}
}
function mesActual(){
	return date("m");
}
function yearActual(){
	return date("Y");
}

function transformarDia($mes){
	//echo "se recibe el mes:".$mes;
	//echo "<br>";
	switch ($mes) {
    case "Enero":
    	//return last_month_day(1);
    	return (int)("1");
        break;
    case "Febrero":
       return (int)("2");
        break;
    case "Marzo":
      return (int)("3");
        break;
     case "Abril":
      return (int)("4");
        break;
     case "Mayo":
       return (int)("5");
        break;
     case "Junio":
       return (int)("6");
        break;
     case "Julio":
       return (int)("7");
        break;
     case "Agosto":
       return (int)("8");
        break;
     case "Septiembre":
       return (int)("9");
        break;
     case "Octubre":
       return (int)("10");
        break;
     case "Noviembre":
       return (int)("11");
        break;
     case "Diciembre":
       return (int)("12");
        break;
	}
}
  function last_month_day($month) { 
      $year = date('Y');
      $month = (int)$month;
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
  };
    function ultimoDiaMesYear($month,$year) { 
      $year = $year;
      $month = (int)$month;
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
  };

function debug($output) {
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects:== " . $output . "' );</script>";
}
function firstDay($year,$mes) {
	return date('Y-m-d', mktime(0,0,0, $mes, "1", $year));
}
function lastDay($year,$mes) {
    $day = date("d", mktime(0,0,0, $mes+1, 0, $year));
    return date('Y-m-d', mktime(0,0,0, $mes, $day, $year));
}

function ponerIndice($valor) {
    switch ($valor) {
    case "0":
    	return "Meses";
        break;
    case "1":
		return "Dep01";
        break; 
    case "2":
      	return "Dep02";
        break;
    case "3":
      	return "Dep03";
        break;
    case "4":
       	return "Dep04";
        break;
    case "5":
       	return "Dep05";
        break;
    case "6":
       	return "Dep06";
        break;
    case "7":
       	return "Dep07";
        break;
    case "8":
       	return "Dep08";
        break;
    case "9":
       	return "Dep09"; 
        break;
    case "10":
       	return "Dep10";
        break;
    case "11":
      	return "Dep11";
        break;
    case "12":
       	return "Dep12";
        break;
    case "13":
       	return "Dep13";
        break;
    case "14":
      	return "Dep14";
        break;
    case "15":
      	return "Dep15";
      	break;
    case "16":
    	return "Dep16";
        break;
    case "17":
    	return "Dep17";
    	break;
    case "18":
      	return "Dep18";
        break;
    case "19":
      	return "Dep19";
        break; 
    case "20":
      	return "Dep20";
        break;             
	}
}
?>

