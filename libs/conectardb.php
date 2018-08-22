<?php 

$server = "localhost";
$user = "root";
$pass = "desarrollo_1";
$dbname = "sistema";

$conn = new mysqli($server, $user, $pass, $dbname);

if ($conn->connect_error) {
	die("Conexión fallida ". $conn->connect_error);
}
?>