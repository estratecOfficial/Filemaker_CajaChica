<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema de Captura</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="Resources/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="Resources/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="Resources/assets/css/form-elements.css">
        <link rel="stylesheet" href="Resources/assets/css/style.css">

        <link rel="shortcut icon" href="Resources/assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="Resources/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="Resources/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="Resources/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="Resources/assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <img src="Resources/images/logo.jpg" alt="alterno">
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Sistema de Captura</strong></h1>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>El tiempo de sesion es de 30 minutos</h3>
                            		<p>Introduce tu usuario y contraseña</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
                                              <?php
                                                if(isset($errorLogin)){         
                                                echo $errorLogin;
                                                echo "<br>";
                                                //echo $_SERVER['REMOTE_ADDR'];
                                                }
                                                if(isset ($tiempoExpirado)){
                                                echo $tiempoExpirado;
                                                }
                                                ?>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="usuarioInicio">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="passwordInicio">
			                        </div>
			                        <button type="submit" class="btn" value="Iniciar Sesión" id="enviarLog">Entrar</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="Resources/assets/js/jquery-1.11.1.min.js"></script>
        <script src="Resources/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="Resources/assets/js/jquery.backstretch.min.js"></script>
        <script src="Resources/assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>