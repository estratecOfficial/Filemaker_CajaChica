<?php

class UserSession{

	public function __construct(){
		session_start();
	}

	public function setCurrentUser($user){
		$_SESSION['user'] = $user;
	}

	public function setCurrentName($nombre){
		$_SESSION['nombre'] = $nombre;
	}

	public function getCurrentUser(){
		return $_SESSION['user'];
	}
	public function getCurrentName(){
		return $_SESSION['nombre'];
	}

	public function closeSession(){
		session_unset();
		session_destroy();
	}

}


?>

