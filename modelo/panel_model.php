<?php 
require_once '../libs/conectardb.php';

/**
 * 
 */
// class PanelModelo
// {
// 	public function buscarUsuario()
// 	{
// 		$stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE estado = 'activo' ");
// 		$stmt->execute();

// 		return $stmt->fetchAll();

// 		$stmt->close();
// 	}

// 	function eliminarUsuario($data)
// 	{
// 		$stmt = Conexion::conectar()->prepare("UPDATE usuario SET estado = 'inactivo' WHERE correo = :correo AND pass = :pass ");
		
// 		$stmt->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
// 		$stmt->bindParam(':pass', $data['pass'], PDO::PARAM_STR);
// 		$result = ($stmt->execute()) ? 1 : 0;

// 		return $result;

// 		$stmt->close();
// 	}
// }

class PanelModelo
{
	function buscarUsuario()
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE estado = 'activo' ");
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	function eliminarUsuario($data)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE usuario SET estado = 'inactivo' WHERE correo = :correo AND pass = :pass ");
		
		$stmt->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
		$stmt->bindParam(':pass', $data['pass'], PDO::PARAM_STR);
		$result = ($stmt->execute()) ? 1 : 0;

		return $result;

		$stmt->close();
	}

	function listaUsuarios($data)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE estado = :estado");
		$stmt ->bindParam(":estado", $data['estado'], PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	function creaUsuario($data)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO usuario (nombre, correo, pass, rol) VALUES (:nombre, :correo, :pass, :rol)");

		$stmt -> bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":correo", $data['correo'], PDO::PARAM_STR);
		$stmt -> bindParam(":pass", $data['pass'], PDO::PARAM_STR);
		$stmt -> bindParam(":rol", $data['rol'], PDO::PARAM_STR);

		$result = ($stmt->execute()) ? 1 : 0;

		return $result;

		$stmt->close();
	}
}

?>