<?php 
require_once '../libs/conectardb.php';

/**
 * 
 */
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
		$stmt = Conexion::conectar()->prepare("INSERT INTO usuario (nombre, correo, pass, rol, ee) VALUES (:nombre, :correo, :pass, :rol, :ee)");

		$stmt -> bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":correo", $data['correo'], PDO::PARAM_STR);
		$stmt -> bindParam(":pass", $data['pass'], PDO::PARAM_STR);
		$stmt -> bindParam(":rol", $data['rol'], PDO::PARAM_STR);
		$stmt -> bindParam(":ee", $data['ee'], PDO::PARAM_STR);

		$result = ($stmt->execute()) ? 1 : 0;

		return $result;

		$stmt->close();
	}

	function listaCancelados()
	{
		$stmt = Conexion::conectar()->prepare("SELECT c.*, l.nombre_completo FROM sistema.cancelacion c inner join layout l on l.id_layout = c.idlayout where datediff(now(),c.fecha_cancelacion) < 60 AND reactivado = 0;");
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	function reactivarBeneficiario($data)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE layout SET estado_contrato = 'activo' WHERE id_layout = :id");
		$stmt->bindParam(":id",$data['id'], PDO::PARAM_STR);

		$result = ($stmt->execute()) ? 1 : 0;

		if ($result == 1) {
			$stmt = Conexion::conectar()->prepare("UPDATE cancelacion SET reactivado = 1 WHERE idlayout = :id");
			$stmt->bindParam(":id",$data['id'], PDO::PARAM_STR);

			$response = ($stmt->execute()) ? 1 : 0;
		}

		return $response;

		$stmt->close();
	}
}

?>