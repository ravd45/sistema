<?php 
require_once '../libs/conectardb.php';

/**
 * 
 */
class ChecklistModelo{
	
	function obtenerLista($data)
	{
		$stmt = Conexion::conectar()->prepare("SELECT c.*, l.nombre_completo FROM checklist c INNER JOIN layout l on c.id_layout = l.id_layout WHERE c.id_layout = :id");
		$stmt -> bindParam(":id", $data['id'], PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	function insertaDocumentos()
	{
		$ife = (isset($_POST['ife'])) ? 1 : 0;
		$curp = (isset($_POST['curp'])) ? 1 : 0;
		$domicilio = (isset($_POST['domicilio'])) ? 1 : 0;
		$terreno = (isset($_POST['terreno'])) ? 1 : 0;
		$acta = (isset($_POST['acta'])) ? 1 : 0;
		$usuario = $_POST['id'];

		$stmt = Conexion::conectar()->prepare("INSERT INTO checklist (ife, curp, comprobante_domicilio, posesion_terreno, id_layout, acta_nacimiento) VALUES ($ife, $curp, $domicilio, $terreno, $usuario, $acta) ");
		$result = ($stmt->execute()) ? 1 : 0;

		if ($result == 1) {
			 echo '<script>window.location = "../vistas/proyectos.php";</script>';
		}

		return $result;

		$stmt-> close();
	}

	function actualizaDocumentos()
	{
		$ife = (isset($_POST['ife'])) ? 1 : 0;
		$curp = (isset($_POST['curp'])) ? 1 : 0;
		$domicilio = (isset($_POST['domicilio'])) ? 1 : 0;
		$terreno = (isset($_POST['terreno'])) ? 1 : 0;
		$acta = (isset($_POST['acta'])) ? 1 : 0;
		$usuario = $_POST['id'];

		$stmt = Conexion::conectar()->prepare("UPDATE checklist SET ife = $ife, curp = $curp, comprobante_domicilio = $domicilio, posesion_terreno = $terreno, acta_nacimiento = $acta WHERE id_layout = $usuario");
		$result = ($stmt->execute()) ? 1 : 0;

		if ($result == 1) {
			 echo '<script>window.location = "../vistas/proyectos.php";</script>';
		}

		return $result;
		$stmt->close();
	}

	function nombre($data)
	{
		$stmt = Conexion::conectar()->prepare("SELECT nombre_completo FROM layout WHERE id_layout = :id");
		$stmt -> bindParam(":id", $data['id'], PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt-close();
	}
}

$checklist = new ChecklistModelo();
if (isset($_POST['vacio'])) {
	$checklist->insertaDocumentos();
}

if (isset($_POST['existe'])) {
	$checklist->actualizaDocumentos();
}

?>