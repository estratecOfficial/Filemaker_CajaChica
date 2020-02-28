<?php

include_once 'db.php';

class User extends DB{

	private $nombre;
	private $username;
	private $departamento;

	public function userExists($user, $pass){
		//$md5pass = md5($pass);
		$md5pass = hash('Sha512',md5($pass));
		//$md5pass = md5($md5pass);
		$query = $this->connect()->prepare('SELECT * FROM empleado WHERE username = :user AND password = :pass');
		$query->execute(['user' => $user,'pass' => $md5pass]);

		if($query->rowCount()){
			return true;
		}else{
			return false;
		}
	}

	public function setUser($user){
		$query = $this->connect()->prepare('SELECT * From empleado WHERE username = :user');
		$query->execute(['user' => $user]);

		foreach ($query as $currentUser) {
			$this->nombre = $currentUser['Nombre']." ".$currentUser['ApellidoPat'];
			$this->username = $currentUser['username'];
			$this->Departamento = $currentUser['Departamento'];
		}
	}

	public function getNombre(){
		return $this->nombre;
	}
	public function getUsername(){
		return $this->username;
	}
	public function getDepartamento(){
		return $this->Departamento;
	}

}

?>