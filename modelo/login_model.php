<?php 
require_once '../libs/conectardb.php';
/**
 * 
 */


class LoginModelo{

	function iniciarSesion($data){

#Declarando variables traidas desde la vista por el controlador
		$usuario = $data['usuario'];
		$contrasenia = $data['contrasenia'];

#Consulta
		$stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE correo = :usuario AND pass = :contrasenia");

#Declaracion de parametros
		$stmt -> bindParam(":usuario", $usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":contrasenia", $contrasenia, PDO::PARAM_STR);
#Ejecución de la consulta
		$stmt->execute();

#Retornando resultado de la consulta	
		return $stmt -> fetchAll();

#Cerrando conexión a la base de datos
		$stmt -> close();
	}
}

 ?>