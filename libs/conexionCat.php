<?php 
/*Produccion*/
	    $server = "localhost";
	    $user = "id7019453_root";
	    $pass = "desarrollo_1";
	    $dbname = "id7019453_sistema";

	    /*Desarrollo
		$server = "localhost";
		$user = "root";
		$pass = "desarrollo_1";
		$dbname = "sistema";*/

$conn = new mysqli($server, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>