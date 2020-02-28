<!DOCTYPE html>
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Captura</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css" /> -->
    <!--Tempo -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
     <!--Fin Tempo -->
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.css.map" /> -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
   
    <!--  <link rel="stylesheet" href="Resources/stylesheet.css"> -->
    <!--  <link rel="stylesheet" href="bower_components/bootstrap-adaptive-tabs/bootstrap-adaptive-tabs.css" />-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="Resources/Crud.js" type="text/javascript" charset="utf-8" async defer></script>
    
    <!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
     <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
      <link rel="stylesheet" type="text/css" href="Resources/bootstrap-dynamic-tabs.css">
      <script src="Resources/bootstrap-dynamic-tabs.js"></script>
      <script src="Resources/Propio.js" type="text/javascript" charset="utf-8" async defer></script>

<?php
header("Refresh: 3000;");
?>

</head>

<?php
include_once 'includes/ExpireSession.php';
?>
<body>
    <div id="tras">
        <?php 
            if ( isset( $_SESSION['user'] ) ) {
            // Sesión activa
            }else{
                //si se acaba el tiempo de 15 minutos, se dirige a la pantalla de inicio.
            include_once 'includes/logout_Expire.php';
            }
                ?>
    </div>
    <header id="main-header">
            <a id="logo-header" href="#">
                <img class ="imagenIzq" src="Resources/images/eMini.png" alt="">
            </a> <!-- / #logo-header -->
            <a >
               <span class="site-name"><?php echo $user->getNombre(); $_SESSION['Departamento']  = $user->getDepartamento();   ?></span>
            </a> 
            <nav>
                <ul>
                    
                    <li><a href="includes/logout.php">Salir</a></li>
                </ul>
            </nav><!-- / nav -->
    </header><!-- / #main-header -->
   
<!-- -->
<div id=Cuerpo>

    <div>
      <ul id="mytabs" class="nav nav-pills ">
        <li class="active"><a id="menu00" href="#home" data-toggle="pill">Transporte</a></li>
        <li><a id="menu01" href="#menu1" data-toggle="pill">Estacionamiento</a></li>
        <li><a id="menu02" href="#menu2" data-toggle="pill">Viajes</a></li>
        <li><a id="menu03" href="#menu3" data-toggle="pill">Otros</a></li>
        <li><a id="menu04" href="#menu4" data-toggle="pill">Solicitud de Gastos</a></li>
        <li><a id="menu05" href="#menu5" data-toggle="pill">Casetas</a></li>
        <!--<li><a href="#menu6" data-toggle="pill">This is Menu item 6</a></li>
        <li><a href="#menu7" data-toggle="pill">This is Menu item 7</a></li>
        <li><a href="#menu8" data-toggle="pill">This is Menu item 8</a></li>
        <li><a href="#menu9" data-toggle="pill">This is Menu item 9</a></li>
        <li><a href="#menu10" data-toggle="pill">This is Menu item 10</a></li>-->
      </ul>
    </div>
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <div id = "agregarNuevo">
                        <?php include "tGeneral/TabTransporte.php" ?>  
                    </div>
                     <hr class="someClass">
                     <a class="botonLarge" id="BtnReload01" >Recarga Tabla Transportes</a>
                     <div id= "tabla">
                        <?php include "crud/FolioUsuarioTransporteJson.php"; ?>
                        <div id="subTabla01"><p></p>
                        </div>
                    </div>  
        </div>
        <div id="menu1" class="tab-pane fade">
          <div id = "agregarNuevoEstacionamiento">
                        <?php include "tGeneral/TabEstacionamiento.php" ?>
                    </div>
                     <hr class="someClass">
                     <a class="botonLarge" id="BtnReload02" >Recarga Tabla Estacionamiento</a>
                        <div id= "tabla02">
                            <?php include "crud/FolioUsuarioEstacionamientoJson.php"; ?>
                            <div id="subTabla02"><p></p>
                            </div>
                    </div>
        </div>
        <div id="menu2" class="tab-pane fade">
          <div id="agregar Viaje">
                        <?php 

                            include "tGeneral/TabViaje.php" 
                            ?> 
                    </div>
                    <hr class="someClass">
                    <a class="botonLarge" id="BtnReload03" >Recarga Tabla Viajes</a>
                        <div id= "tabla03">
                            <?php include "crud/FolioUsuarioViajesJson.php"; ?>
                            <div id="subTabla03"><p></p>
                            </div>
                        </div>
        </div>
        <div id="menu3" class="tab-pane fade">
           <div id="agregar Otros">
                        <?php 
                            include "tGeneral/TabOtros.php" 
                            ?> 
                    </div>
                    <hr class="someClass">
                    <a class="botonLarge" id="BtnReload04" >Recarga Tabla Otros</a>
                    <div id= "tabla04">
                            <?php include "crud/FolioUsuarioOtrosJson.php"; ?>
                            <div id="subTabla04"><p></p>
                            </div>
                    </div>
        </div>
        <div id="menu4" class="tab-pane fade">
          <div id="agregarValesProvisionales">
                        <?php 
                            include "tGeneral/TabValeProvisional.php" 
                            ?> 
                    </div>
                    <hr class="someClass">
                    <a class="botonLarge" id="BtnReload05" >Recarga Tabla Solicitud de Gastos </a>
                    <div id= "tabla05">
                            <?php // include "crud/FolioUsuarioValesJson.php"; ?>
                            <div id="subTabla05"><p></p>
                            </div>
                    </div>
        </div>
        <div id="menu5" class="tab-pane fade">
                 <div id="agregarCasetas">
                        <?php 
                            include "tGeneral/TabCasetas.php" 
                            ?> 
                    </div>
                    <hr class="someClass">
                    <a class="botonLarge" id="BtnReload06" >Recarga Tabla Casetas</a>
                    <div id= "tabla06">
                            <?php // include "crud/FolioUsuarioValesJson.php"; ?>
                            <div id="subTabla06"><p></p>
                            </div>
                    </div>
        </div>
       <!-- <div id="menu6" class="tab-pane fade">
          <h3>Menu 6</h3>
          <p>Some content in menu 2.</p>
        </div>
        <div id="menu7" class="tab-pane fade">
          <h3>Menu 7</h3>
          <p>Some content in menu 2.</p>
        </div>
        <div id="menu8" class="tab-pane fade">
          <h3>Menu 8</h3>
          <p>Some content in menu 2.</p>
        </div>
        <div id="menu9" class="tab-pane fade">
          <h3>Menu 9</h3>
          <p>Some content in menu 2.</p>
        </div>
        <div id="menu10" class="tab-pane fade">
          <h3>Menu 10</h3>
          <p>Some content in menu 2.</p>
        </div> -->
      </div>
</div>  
  <script>
  
  </script>

            

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script> -->

    <script src="Resources/CalendarioEspañol.js" type="text/javascript" charset="utf-8" async defer></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.jqueryui.min.css">
    

    <link rel="stylesheet" href="Resources/main.css">  

</body>
</html> 