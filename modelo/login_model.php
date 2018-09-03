<?php 
require_once '../libs/conectardb.php';
/**
 * 
 */


class LoginModelo{

	function iniciarSesion($data)
	{

		#Declarando variables traidas desde la vista por el controlador
		$usuario = $data['usuario'];
		$contrasenia = $data['contrasenia'];

		#Consulta
		$stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE correo = :usuario AND pass = :contrasenia");
		//solo trae un registro

		#Declaracion de parametros
		$stmt -> bindParam(":usuario", $usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":contrasenia", $contrasenia, PDO::PARAM_STR);
		#Ejecución de la consulta
		$stmt->execute();
		//tambien se puede hacer commit pero no es tan riesgosa la consulta

		#Retornando resultado de la consulta	
		return $stmt -> fetchAll();
		//también se puede ocupar el fetch ya que sabemos que es un solo registro

		#Cerrando conexión a la base de datos
		$stmt -> close();
		//Se cierra la conexion por seguridad solamente
	}
}

?>