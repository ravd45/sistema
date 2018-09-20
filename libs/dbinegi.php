<?php 
/**
 * 
 */
class ConexionInegi{
	
	function conectar(){

		/*Produccion*/
	    // $server = "localhost";
	    // $user = "id7019453_root";
	    // $pass = "desarrollo_1";
	    // $dbname = "id7019453_sistema";

	    /*Desarrollo*/
		$server = "localhost";
		$user = "root";
		$pass = "desarrollo_1";
		$dbname = "estados";
		
		$conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
		return $conn;
		
	}
}
?>