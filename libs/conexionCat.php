<?php 
$server = "localhost";
$user = "root";
$pass = "desarrollo_1";
$dbname = "sistema";

$conn = new mysqli($server, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>