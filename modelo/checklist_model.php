<?php 
require_once '../libs/conectardb.php';

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
			echo '<script>window.location = "../vistas/checklist.php?q='.$usuario.'";</script>';
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
		$uIfe = "";
		$uDomicilio = "";
		$uTerreno = "";
		$uActa = "";


		if ($ife == 1) {
			$uIfe = " ife = ". $ife.',';
		}else{
			$uIfe = "";

		}

		if ($curp == 1) {
			$uCurp = " curp =". $curp;
		}else{
			$uCurp = "";
		}

		if ($domicilio == 1) {
			$uDomicilio = ", comprobante_domicilio =".$domicilio;
			
		}else{
			$uDomicilio = "";
			
		}

		if ($terreno == 1) {
			$uTerreno = ", posesion_terreno = ".$terreno;
		}else{			
			$uTerreno = "";
		}
		if ($acta == 1) {
			$uActa = ", acta_nacimiento = ".$acta;
		}else{
			$uActa = "";
		}					

		if ($ife == 0 && $curp == 0 && $domicilio == 0 && $terreno == 0 && $acta == 0) {
			$result = 0;
			// $stmt = "se queda en este if";
		}else{
				$stmt = Conexion::conectar()->prepare("UPDATE checklist SET".$uIfe.$uCurp.$uDomicilio.$uTerreno.$uActa." WHERE id_layout = $usuario"); 

				$result = ($stmt->execute()) ? 1 : 0;
		}
		if ($result == 1) {
			echo '<script>window.location = "../vistas/checklist.php?q='.$usuario.'";</script>';
		}else{
			var_dump($stmt);
			// echo '<script>window.location = "../vistas/checklist.php?q='.$usuario.'";</script>';
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

	function obtenerDocumentos($data)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM checklist WHERE id_layout = :id;");
		$stmt->bindParam(":id", $data['id'], PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	function obtenerarchivos($data)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM ejecucion_checklist WHERE id_layout = :id");
		$stmt -> bindParam(':id', $data['id'], PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt->close();
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