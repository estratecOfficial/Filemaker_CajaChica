<?php 
	
	include_once 'includes/user.php';
	include_once 'includes/user_session.php';

	$user_session = new UserSession();
	$user = new User();

		if(isset($_SESSION['user'])){
			//echo "session iniciada";
			$user->setUser($user_session->getCurrentUser());
    		include_once 'vistas/home.php';

		}else if(isset($_POST['username']) && isset($_POST['password'])){
			//echo "Validacion de Login";
			$userForm = $_POST['username'];
			$passForm = $_POST['password'];

			if($user->userExists($userForm,$passForm)){
				//echo "usuario validado";
				$user_session->setCurrentUser($userForm);
				$user->setUser($userForm);
				$user_session->setCurrentName($user->getNombre());
				include_once 'vistas/home.php';
				
			}else {
				//echo $userForm." ".$passForm."  ";
				//echo "  [".md5($passForm)."] ";
				//echo "nombre /pass incorrecto";
				$errorLogin ="Nombre de usuario y/o password es incorrecto";
				include_once "vistas/login.php";
			}
		}else{
			//echo "Login" ;
			include_once 'vistas/login.php';
		}



?>