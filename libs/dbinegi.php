<?php 
/**
 * 
 */
class ConexionInegi{
	
	function conectar(){
		$server = "localhost";
		$user = "root";
		$pass = "desarrollo_1";
		$dbname = "estados";
		
		$conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
		return $conn;
		
	}
}
?>