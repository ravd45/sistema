<?php 
require_once '../libs/conectardb.php';

/**
 * 
 */
class ChecklistModelo{
	
	function obtenerLista($data)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM checklist where id_layout = :id");
		$stmt -> bindParam(":id", $data['id'], PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
}
?>