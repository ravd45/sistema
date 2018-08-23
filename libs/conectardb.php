<?php 
/**
 * 
 */
class Conexion{
	
	function conectar(){
		$server = "localhost";
		$user = "root";
		$pass = "desarrollo_1";
		$dbname = "sistema";
		
		$conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
		return $conn;
		
	}
}
?>