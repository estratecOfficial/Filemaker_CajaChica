//console.log("inicio de google chart");
console.log(MesActual());

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {

//-------------------------------------------------------------------------------------

  Inicio();
}
//----------------------------------------------------------------
function DibujarGraficoMesDepartamento(chart_data){
      var totGene =0;
      var jsonData = chart_data;
      var dataMesDepartamentos = new google.visualization.DataTable();
      dataMesDepartamentos.addColumn('string', 'Departamentos');
      dataMesDepartamentos.addColumn('number', 'Total');
      $.each(jsonData, function(i, jsonData){
          var Departamento = jsonData.Departamento;
          var Total = parseFloat($.trim(jsonData.Total));
          totGene = totGene + Total;
          //console.log(Departamento+":"+Total);
          dataMesDepartamentos.addRows([[Departamento, Total]]);
      });
      //--------------------------
      totGene = totGene.toFixed(2);
       totGene= fNumber.go(totGene,"$");
       $('#TotalLabel').html(totGene);
      //console.log ("[TG]="+totGene);
      //---------------------------

      var options = {
          chartArea: {'width': '100%', 'height': '95%'},
          animation:{
            duration: '1000',
            easing: 'out',
          },
          //legend:{position: 'top', textStyle: {color: 'black', fontSize: 10}}
      };

      dataMesDepartamentos.sort({column: 1, desc: true}); //ordena dataTable por la columna 2, la de numeros
      referencia(dataMesDepartamentos);
      var chartConceptosMeses = new google.visualization.PieChart(document.getElementById('chart_div'));
      chartConceptosMeses.draw(dataMesDepartamentos, options);
  }
 //-------------------------
function DibujarGraficoHistograma(chart_data){
  var jsonData = chart_data;
  var data3 = new google.visualization.DataTable();
  data3.addColumn('string', 'Mes');
  //-----------------------------------------------
  data3.addColumn('number', 'Administración');
  data3.addColumn('number', 'Almacén');
  data3.addColumn('number', 'Calidad y Procesos ');
  data3.addColumn('number', 'Call Center');
  data3.addColumn('number', 'Contabilidad');
  data3.addColumn('number', 'Desarollo de Negocios.');
  data3.addColumn('number', 'Dirección');
  data3.addColumn('number', 'Facturación');
  data3.addColumn('number', 'Gestión Foránea');
  data3.addColumn('number', 'Logística');
  data3.addColumn('number', 'MPS');
  data3.addColumn('number', 'Producción');
  data3.addColumn('number', 'Recepción');
  data3.addColumn('number', 'Recursos Humanos');
  data3.addColumn('number', 'Refacciones');
  data3.addColumn('number', 'Retail');
  data3.addColumn('number', 'Servicio Técnico');
  data3.addColumn('number', 'Sistemas');

  $.each(jsonData, function(i, jsonData){
    var Meses = jsonData.Meses;
    var Dep01 = parseFloat($.trim(jsonData.Dep01));
    var Dep02 = parseFloat($.trim(jsonData.Dep02));
    var Dep03 = parseFloat($.trim(jsonData.Dep03));
    var Dep04 = parseFloat($.trim(jsonData.Dep04));
    var Dep05 = parseFloat($.trim(jsonData.Dep05));
    var Dep06 = parseFloat($.trim(jsonData.Dep06));
    var Dep07 = parseFloat($.trim(jsonData.Dep07));
    var Dep08 = parseFloat($.trim(jsonData.Dep08));
    var Dep09 = parseFloat($.trim(jsonData.Dep09));
    var Dep10 = parseFloat($.trim(jsonData.Dep10));
    var Dep11 = parseFloat($.trim(jsonData.Dep11));
    var Dep12 = parseFloat($.trim(jsonData.Dep12));
    var Dep13 = parseFloat($.trim(jsonData.Dep13));
    var Dep14 = parseFloat($.trim(jsonData.Dep14));
    var Dep15 = parseFloat($.trim(jsonData.Dep15));
    var Dep16 = parseFloat($.trim(jsonData.Dep16));
    var Dep17 = parseFloat($.trim(jsonData.Dep17));
    var Dep18 = parseFloat($.trim(jsonData.Dep18));

    data3.addRows([[Meses, Dep01, Dep02, Dep03, Dep04, Dep05, Dep06, Dep07, Dep08, Dep09, Dep10, Dep11, Dep12, Dep13, Dep14, Dep15,Dep16,Dep17,Dep18]]);
    });
        // The intervals data as narrow lines (useful for showing raw source data)
  var options_lines = {
      'chartArea': {'width': '90%', 'height': '88%'},
      lineWidth: 4,
      legend: 'none'
      };
          //https://stackoverflow.com/questions/20764157/zoom-google-line-chart
  var columnsTable = new google.visualization.DataTable();
  columnsTable.addColumn('number', 'colIndex');
  columnsTable.addColumn('string', 'colLabel');
  var initState= {selectedValues: []};
          // put the columns into this data table (skip column 0)
  for (var i = 1; i < data3.getNumberOfColumns(); i++) {
    columnsTable.addRow([i, data3.getColumnLabel(i)]);
  }
  var chart = new google.visualization.ChartWrapper({
    chartType: 'AreaChart',
    containerId: 'chart_lines',
    dataTable: data3,
    options: {
      width: '95%',
      height: '90%',
      tooltip:{showColorCode: true},
      legend:{position:'top'},
      pointsVisible:true,
      reverseCategories:false,
      chartArea:{left:60,top:60,right:20,bottom:30,width:'98%',height:'88%'},
    }
  });

  var columnFilter = new google.visualization.ControlWrapper({
    controlType: 'CategoryFilter',
    containerId: 'chart_Filter',
    dataTable: columnsTable,
    options: {
      filterColumnLabel: 'colLabel',
      filterColumnIndex: 1,
      useFormattedValue: true,
      ui: {
          label: 'Departamentos',
          allowTyping: false,
          allowMultiple: true,
          caption : 'Seleccione',
          //width: '90%',
          allowNone: true,
          //selectedValuesLayout: 'belowStacked'
          selectedValuesLayout: 'aside'
      }
    },
    state: initState
    });
  function setChartView () {
    var state = columnFilter.getState();
    var row;
    var view = {
      columns: [0]
    };
    for (var i = 0; i < state.selectedValues.length; i++){
      row = columnsTable.getFilteredRows([{column: 1, value: state.selectedValues[i]}])[0];
      view.columns.push(columnsTable.getValue(row, 0));
    }
    // sort the indices into their original order
    view.columns.sort(function (a, b){
      return (a - b);
    });
    if (state.selectedValues.length > 0){
      chart.setView(view);
    }else {
      chart.setView(null);
    }
    chart.draw();
    }
  
     var formatter = new google.visualization.NumberFormat({
        prefix: '$', negativeColor: 'red', negativeParens: true});
        formatter.format(data3, 1);
        formatter.format(data3, 2);
        formatter.format(data3, 3);
        formatter.format(data3, 4);
        formatter.format(data3, 5);
        formatter.format(data3, 6);
        formatter.format(data3, 7);
        formatter.format(data3, 8);
        formatter.format(data3, 9);
        formatter.format(data3, 10);
        formatter.format(data3, 11);
        formatter.format(data3, 12);
        formatter.format(data3, 13);
        formatter.format(data3, 14);
        formatter.format(data3, 15);
        formatter.format(data3, 16);
        formatter.format(data3, 17);
        formatter.format(data3, 18);

    var chart_lines = new google.visualization.AreaChart(document.getElementById('chart_lines'));
    chart_lines.draw(data3, options_lines);
    google.visualization.events.addListener(columnFilter, 'statechange', setChartView);
    setChartView();
    columnFilter.draw();
  }
//-------------------------------------------------------------------
function DibujarGraficoMesConcepto(chart_data, chart_main_title){
      var jsonData = chart_data;
      var dataMesConceptos = new google.visualization.DataTable();
      dataMesConceptos.addColumn('string', 'Concepto');
      dataMesConceptos.addColumn('number', 'Total');
      $.each(jsonData, function(i, jsonData){
          var Concepto = jsonData.Concepto;
          var Total = parseFloat($.trim(jsonData.Total));
          dataMesConceptos.addRows([[Concepto, Total]]);
      });
      var options = {
          'chartArea': {'width': '100%', 'height': '95%'},
          //legend:{position: 'none', textStyle: {color: 'black', fontSize: 10}}
      };


      dataMesConceptos.sort({column: 1, desc: true});

       referencia(dataMesConceptos);

      /*var formatter = new google.visualization.NumberFormat({
        prefix: '$', negativeColor: 'red', negativeParens: true});
        formatter.format(dataMesConceptos, 1);
        */

      var chartConceptosMeses = new google.visualization.PieChart(document.getElementById('chart_div2'));
      chartConceptosMeses.draw(dataMesConceptos, options);
  }
//-------------------------------------------------------------------
    function RefrescarGraficoMesConcepto(Mes, year){
    var temp_title = year + ' '+Mes+'';
    //console.log ("(2)concepto :"+temp_title);
    $.ajax({
        //url:"./php/fetch.php",
        url:"../crud/fetch.php",
        method:"POST",
        data:{Mes:Mes,year:year},
        dataType:"JSON",
        success:function(dataMesConceptos)
        {
            //console.log ("Se consigue datos de Concepto");
            $('#MesLabel').html(Mes);
            $('#YearLabel').html(year);
            DibujarGraficoMesConcepto(dataMesConceptos, temp_title);
        },
        error: function(textStatus, errorThrown) { 
                   
                    console.log ("falla en conseguirlos datos de Concepto");
                   }, 
               async: true //async: false
          }).responseText;
}


function RefrescarGraficoMesDepartamento(Mes, year){
    var temp_title = year + ' '+Mes+'';
    //console.log ("1)Departamento :"+temp_title);
      $.ajax({
            url:"../crud/fetchDeep.php",
            method:"POST",
            data:{Mes:Mes,year:year},
            dataType:"JSON",
            success:function(dataMesDepartamentos){
              DibujarGraficoMesDepartamento(dataMesDepartamentos);
              //console.log(dataMesDepartamentos);
            },
            error: function( textStatus, errorThrown) { 
              console.log("No hay datos de Departamentos del mes seleccionado, compruebe la informacion"); 
            },
            async: true //async: false
          }).responseText;
}
function RefrescarGraficoHistoricoDepartamento(Year, title){
    var temp_title = title + ' '+Year+'';
    //console.log ("3)GraficoHistoricoDepartamento :"+temp_title);

    $.ajax({
            url:"../crud/fetchUltimate.php",
            data:{Year:Year},
            method:"POST",
            dataType:"JSON",
            success:function(dataHisto){
              DibujarGraficoHistograma(dataHisto);
            },
            error: function(textStatus, errorThrown) { 
              console.log("No hay datos de histograma seleccionado, compruebe la informacion"); 
            },
            async: true //async: false
          }).responseText;  
}
//----------------------------------
function MesActual(){
  var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  var f=new Date();
  fecha = meses[f.getMonth()];
  return fecha;
}
function YearActual(){
  var f=new Date();
  fecha = f.getFullYear();
  return fecha;
}
//------------------------------
var fNumber = {
  sepMil: ",", // separador para los miles
  sepDec: '.', // separador para los decimales
  formatear:function (num){
    num +='';
    var splitStr = num.split('.');
    var splitLeft = splitStr[0];
    var splitRight = splitStr.length > 1 ? this.sepDec + splitStr[1] : '';
    var regx = /(\d+)(\d{3})/;
    while (regx.test(splitLeft)) {
      splitLeft = splitLeft.replace(regx, '$1' + this.sepMil + '$2');
    }
    return this.simbol + splitLeft + splitRight;
  },
  go:function(num, simbol){
  this.simbol = simbol ||'';
  return this.formatear(num);
  }
} 

function referencia(valor){
  total =0;
  //console.log("Referencia");
        for (var i = 0; i < valor.getNumberOfRows(); i++){
        total = total + valor.getValue(i, 1); 
        //console.log(valor.getValue(i, 1) );
        //console.log("Total:"+total); 
      }
      var total = 0;
      for (var i = 0; i < valor.getNumberOfRows(); i++){
        total = total + valor.getValue(i, 1);  
      }

      for (var i = 0; i < valor.getNumberOfRows(); i++) {
        var label = valor.getValue(i, 0);
        var val = valor.getValue(i, 1) ;      
        var percentual = ((val / total) * 100).toFixed(1); 
      
        numForm = fNumber.go(val,"$");
        valor.setFormattedValue(i, 0,'['+ label  + ']  '+numForm+' ('+ percentual + '%)');            
      }
}
//----------------------------------
function Inicio(){
  $('#MesLabel').html(MesActual());
  $('#YearLabel').html(YearActual());
  //var f = new Date();
  //var year = f.getFullYear();
  //console.log (year);
  //console.log ("inicio de graficos");
  RefrescarGraficoMesConcepto(MesActual(), YearActual()); 
  RefrescarGraficoMesDepartamento( MesActual(), YearActual()); 
  RefrescarGraficoHistoricoDepartamento( YearActual(), "Auto");
  
}