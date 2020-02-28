<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LittleBox</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- Custom styles for this template -->
  <link href="../Resources/graficos.css" rel="stylesheet">
</head>
<body>
    <?php  
    $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio', 'Agosto','Septiembre','Octubre','Noviembre','Diciembre');
    $year = array('2015','2016','2017','2018','2019','2020','2021', '2022');
    ?>  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      
        <li><a class="navbar-brand" id="MesLabel" >Home</a></li>
        <li><a class="navbar-brand" id="YearLabel">About</a></li>
        <li><a class="navbar-brand" id="TotalLabel">T</a></li>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
                                  <select name="Mes" class="form-control" id="Mes">
                        <option selected="true" disabled="disabled">Selecciona Mes</option>
                          <?php
                            foreach($meses as $row){
                              echo '<option value="'.$row.'">'.$row.'</option>';
                            }
                          ?>
                      </select>
          </li>
          <li class="nav-item active">
                                  <select name="year" class="form-control" id="year">
                        <option selected="true" disabled="disabled">Selecciona Año</option>
                          <?php
                            foreach($year as $row2){
                              echo '<option value="'.$row2.'">'.$row2.'</option>';
                            }
                          ?>
                        </select>
          </li>
          <li class="nav-item active">
            <!-- <input id="save-pdf" type="button" value="test"  /> -->
          </li>
          
        
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->

<div class="cont">
      <div class="row">
          <div class="col-lg-6 col-md-6 mb-6">
            <div class="card h-100">
                            <div class="card-header-tab card-header-tab-animation card-header">
                                <div class="card-header-title">
                                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                    Departamentos 
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chart_wrap"> 
                                    <div id="chart_div"></div>
                                </div>          
                            </div>      
            </div>
          </div>
          <div class="col-lg-6 col-md-6 mb-6">
            <div class="card h-100">
                <div class="card-header-tab card-header-tab-animation card-header">
                  <div class="card-header-title">                 
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <h6> Conceptos </h6>
                    </div>
                    <div class="col-md-3">
                      <!--
                      <select name="Mes" class="form-control" id="Mes">
                        <option selected="true" disabled="disabled">Selecciona Mes</option>
                          <?php
                            foreach($meses as $row){
                              echo '<option value="'.$row.'">'.$row.'</option>';
                            }
                          ?>
                      </select>
                    -->
                    </div>
                    <div class="col-md-3">
                      <!--
                      <select name="year" class="form-control" id="year">
                        <option selected="true" disabled="disabled">Selecciona Año</option>
                          <?php
                            foreach($year as $row2){
                              echo '<option value="'.$row2.'">'.$row2.'</option>';
                            }
                          ?>
                        </select>
                      -->
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="chart_wrap"> 
                        <div id="chart_div2">
                        </div>
                    </div>          
                  </div>
              </div>
            </div>
      </div>
      <div class="divi">
      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12">
                            <div class="card-header-tab card-header-tab-animation card-header">
                                <div class="card-header-title">
                                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                    Histograma Departamentos
                                </div>
                            </div>
                            <div >
                                    <div id="chart_Filter"></div> 
                                    <div id="chart_lines"></div>                                              
                            </div>
        </div>
      </div>
</div>
    
    <!--
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white"></p>
    </div>
    
  </footer>
-->
  <!-- Bootstrap core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="../Resources/googleChart03.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>-->
  

</body>
<script>
    $(document).ready(function(){
        $('#Mes').change(function(){
            var Mes = $(this).val();
            var year = $('#year').val();
            console.log("se selecciona desde 'Mes':"+Mes+" "+year);
            if(Mes != ''){
                RefrescarGraficoMesConcepto(Mes, year);
                RefrescarGraficoMesDepartamento(Mes, year);
                //RefrescarGraficoMesDepartamento(Mes, 'Usuario');
                // console.log("valor adquirido de Labels: "+$('#MesLabel').html()+","+$('#YearLabel').html());
            }
        });
        $('#year').change(function(){
            var Mes = $('#Mes').val();
            var year = $(this).val();
             console.log("se selecciona desde 'year':"+Mes+" "+year);
            if(year != ''){

                RefrescarGraficoMesConcepto(Mes, year);
                RefrescarGraficoMesDepartamento(Mes, year);
                RefrescarGraficoHistoricoDepartamento(year,"user"); 
            }
        });
    });
</script>

</html>
