
<?php

//database_connection.php
/*
$connect = new PDO(
	"mysql:host=localhost;dbname=filemakerconect",
	"root",
	"Megabass69",
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
*/

class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    public function __construct(){
        $this->host     = '107.180.56.150';
        $this->db       = 'bd_FileMaker_CajaChica';
        $this->user     = 'CajaChica_bd_F';
        $this->password = "EstratecC4j4cH1C412345%";
        $this->charset  = 'utf8mb4';
    }
    function connect(){
    
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
    

}
?> 


