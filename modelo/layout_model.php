<?php
require_once '../libs/conectardb.php';

/**
 *
 */
class LayoutModelo{

	function insertaLayout($data){
		$stmt = Conexion::conectar()->prepare("INSERT INTO layout (id_proyecto, curp, nombre, apellido_paterno, apellido_materno, nombre_completo, genero, estado_civil, fecha_nacimiento, rfc, ingreso, antiguedad, ocupacion, telefono, solucion, subsidio, credito, enganche_efectivo, enganche_especie, otros_apoyos, modalidad, cuv, puntaje, estado, municipio, codigo_postal, localidad, colonia, domicilio_beneficiario, tipo_asentamiento, coordenadas, latitud, longitud, domicilio_terreno, pcu, zona, usuario) VALUES (:proyecto, :curp, :nombre, :apellido_p, :apellido_m, :nombre_completo, :genero, :estado_civil, :fecha_nacimiento, :rfc, :ingreso, :antiguedad, :ocupacion, :telefono, :solucion, :subsidio, :credito, :enganche_efectivo, :enganche_especie, :otros_apoyos, :modalidad, :cuv, :puntaje, :estado, :municipio, :cp, :localidad, :colonia, :domicilio_beneficiario, :tipo_asentamiento, :coordenada, :latitud, :longitud, :domicilio_terreno, :pcu, :zona, :usuario);");

		$stmt -> bindParam(":proyecto", $data['proyecto'], PDO::PARAM_STR);
		$stmt -> bindParam(":curp", $data['curp'], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido_p", $data['apellido_p'], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido_m", $data['apellido_m'], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre_completo", $data['nombre_completo'], PDO::PARAM_STR);
		$stmt -> bindParam(":genero", $data['genero'], PDO::PARAM_STR);
		$stmt -> bindParam(":estado_civil", $data['estado_civil'], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_nacimiento"	,	$data['fecha_nacimiento'], PDO::PARAM_STR);
		$stmt -> bindParam(":rfc", $data['rfc'], PDO::PARAM_STR);
		$stmt -> bindParam(":ingreso", $data['ingreso'], PDO::PARAM_STR);
		$stmt -> bindParam(":antiguedad", $data['antiguedad'], PDO::PARAM_STR);
		$stmt -> bindParam(":ocupacion", $data['ocupacion'], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
		$stmt -> bindParam(":solucion", $data['solucion'], PDO::PARAM_STR);
		$stmt -> bindParam(":subsidio", $data['subsidio'], PDO::PARAM_STR);
		$stmt -> bindParam(":credito", $data['credito'], PDO::PARAM_STR);
		$stmt -> bindParam(":enganche_efectivo", $data['enganche_efectivo'], PDO::PARAM_STR);
		$stmt -> bindParam(":enganche_especie", $data['enganche_especie'], PDO::PARAM_STR);
		$stmt -> bindParam(":otros_apoyos", $data['otros_apoyos'], PDO::PARAM_STR);
		$stmt -> bindParam(":modalidad", $data['modalidad'], PDO::PARAM_STR);
		$stmt -> bindParam(":cuv", $data['cuv'], PDO::PARAM_STR);
		$stmt -> bindParam(":puntaje", $data['puntaje'], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $data['estado'], PDO::PARAM_STR);
		$stmt -> bindParam(":municipio", $data['municipio'], PDO::PARAM_STR);
		$stmt -> bindParam(":cp", $data['cp'], PDO::PARAM_STR);
		$stmt -> bindParam(":localidad", $data['localidad'], PDO::PARAM_STR);
		$stmt -> bindParam(":colonia", $data['colonia'], PDO::PARAM_STR);
		$stmt -> bindParam(":domicilio_beneficiario", $data['domicilio_beneficiario'], PDO::PARAM_STR);
		$stmt -> bindParam(":tipo_asentamiento", $data['tipo_asentamiento'], PDO::PARAM_STR);
		$stmt -> bindParam(":coordenada", $data['coordenada'], PDO::PARAM_STR);
		$stmt -> bindParam(":latitud", $data['latitud'], PDO::PARAM_STR);
		$stmt -> bindParam(":longitud", $data['longitud'], PDO::PARAM_STR);
		$stmt -> bindParam(":domicilio_terreno", $data['domicilio_terreno'], PDO::PARAM_STR);
		$stmt -> bindParam(":pcu", $data['pcu'], PDO::PARAM_STR);
		$stmt -> bindParam(":zona", $data['zona'], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $data['usuario'], PDO::PARAM_STR);

		$result = ($stmt->execute()) ? 1 : 0; #Esta línea es un if () <- condicion ? <- then : <- else

		
		return $result;
	}

	function actualizaLayout($data){
		$stmt = Conexion::conectar()->prepare("INSERT INTO layout (id_proyecto, curp, nombre, apellido_paterno, apellido_materno, nombre_completo, genero, estado_civil, fecha_nacimiento, rfc, ingreso, antiguedad, ocupacion, telefono, solucion, subsidio, credito, enganche_efectivo, enganche_especie, otros_apoyos, modalidad, cuv, puntaje, id_estado, id_municipio, codigo_postal, localidad, colonia, domicilio_beneficiario, tipo_asentamiento, coordenadas, latitud, longitud, domicilio_terreno, pcu, zona) VALUES (:proyecto, :curp, :nombre, :apellido_p, :apellido_m, :nombre_completo, :genero, :estado_civil, :fecha_nacimiento, :rfc, :ingreso, :antiguedad, :ocupacion, :telefono, :solucion, :subsidio, :credito, :enganche_efectivo, :enganche_especie, :otros_apoyos, :modalidad, :cuv, :puntaje, :estado, :municipio, :cp, :localidad, :colonia, :domicilio_beneficiario, :tipo_asentamiento, :coordenada, :latitud, :longitud, :domicilio_terreno, :pcu, :zona);");

		$stmt -> bindParam(":proyecto", $data['proyecto'], PDO::PARAM_STR);
		$stmt -> bindParam(":curp", $data['curp'], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido_p", $data['apellido_p'], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido_m", $data['apellido_m'], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre_completo", $data['nombre_completo'], PDO::PARAM_STR);
		$stmt -> bindParam(":genero", $data['genero'], PDO::PARAM_STR);
		$stmt -> bindParam(":estado_civil", $data['estado_civil'], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_nacimiento"	,	$data['fecha_nacimiento'], PDO::PARAM_STR);
		$stmt -> bindParam(":rfc", $data['rfc'], PDO::PARAM_STR);
		$stmt -> bindParam(":ingreso", $data['ingreso'], PDO::PARAM_STR);
		$stmt -> bindParam(":antiguedad", $data['antiguedad'], PDO::PARAM_STR);
		$stmt -> bindParam(":ocupacion", $data['ocupacion'], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $data['telefono'], PDO::PARAM_STR);
		$stmt -> bindParam(":solucion", $data['solucion'], PDO::PARAM_STR);
		$stmt -> bindParam(":subsidio", $data['subsidio'], PDO::PARAM_STR);
		$stmt -> bindParam(":credito", $data['credito'], PDO::PARAM_STR);
		$stmt -> bindParam(":enganche_efectivo", $data['enganche_efectivo'], PDO::PARAM_STR);
		$stmt -> bindParam(":enganche_especie", $data['enganche_especie'], PDO::PARAM_STR);
		$stmt -> bindParam(":otros_apoyos", $data['otros_apoyos'], PDO::PARAM_STR);
		$stmt -> bindParam(":modalidad", $data['modalidad'], PDO::PARAM_STR);
		$stmt -> bindParam(":cuv", $data['cuv'], PDO::PARAM_STR);
		$stmt -> bindParam(":puntaje", $data['puntaje'], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $data['estado'], PDO::PARAM_STR);
		$stmt -> bindParam(":municipio", $data['municipio'], PDO::PARAM_STR);
		$stmt -> bindParam(":cp", $data['cp'], PDO::PARAM_STR);
		$stmt -> bindParam(":localidad", $data['localidad'], PDO::PARAM_STR);
		$stmt -> bindParam(":colonia", $data['colonia'], PDO::PARAM_STR);
		$stmt -> bindParam(":domicilio_beneficiario", $data['domicilio_beneficiario'], PDO::PARAM_STR);
		$stmt -> bindParam(":tipo_asentamiento", $data['tipo_asentamiento'], PDO::PARAM_STR);
		$stmt -> bindParam(":coordenada", $data['coordenada'], PDO::PARAM_STR);
		$stmt -> bindParam(":latitud", $data['latitud'], PDO::PARAM_STR);
		$stmt -> bindParam(":longitud", $data['longitud'], PDO::PARAM_STR);
		$stmt -> bindParam(":domicilio_terreno", $data['domicilio_terreno'], PDO::PARAM_STR);
		$stmt -> bindParam(":pcu", $data['pcu'], PDO::PARAM_STR);
		$stmt -> bindParam(":zona", $data['zona'], PDO::PARAM_STR);

		$result = ($stmt->execute()) ? 1 : 0; #Esta línea es un if () <- condicion ? <- then : <- else

		if($result == 1){
			$stmt = Conexion::conectar()->prepare("UPDATE layout SET estado_contrato = 'sustituido' where id_layout = :id");
				$stmt -> bindParam(":id", $data['layout'], PDO::PARAM_STR);
				$result = ($stmt->execute()) ? 1 : 0;

				if ($result == 1) {
					$stmt = Conexion::conectar()->prepare("INSERT INTO sustitucion (motivo, id_layout) VALUES (:motivo, :id)");
					$stmt -> bindParam(":motivo", $data['motivo'], PDO::PARAM_STR);
					$stmt -> bindParam(":id", $data['layout'], PDO::PARAM_STR);
					$stmt->execute();
				}
		}
		return $result;
		$stmt->close();
	}

	function ejecucionLayout($data){
		$stmt = Conexion::conectar()->prepare("UPDATE layout SET estatus = 'EN EJECUCION', cuv = :cuv, puntaje = :puntaje WHERE id_layout = :id");
		$stmt -> bindParam(":id", $data['id'], PDO::PARAM_STR);
		$stmt -> bindParam(":cuv", $data['cuv'], PDO::PARAM_STR);
		$stmt -> bindParam(":puntaje", $data['puntaje'], PDO::PARAM_STR);
		
		$result = ($stmt->execute()) ? 1 : 0;

		return $result;

		$stmt->close();

	}

	function apartaLayout($data){
		$stmt = Conexion::conectar()->prepare("UPDATE layout SET estatus = 'APARTADO', fecha_apartado = :fecha WHERE id_layout = :id");
		$stmt -> bindParam(":id", $data['id'], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $data['fecha'], PDO::PARAM_STR);
		
		$result = ($stmt->execute()) ? 1 : 0;

		return $result;

		$stmt->close();

	}

	function obtenerCP($data)
	{
		$stmt = Conexion::conectar()->prepare("SELECT puntaje, cuv FROM layout WHERE id_layout = :id");
		$stmt -> bindParam(":id", $data['id'], PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	function ejecucionList($data)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM ejecucion_checklist WHERE id_layout = :id");
		$stmt -> bindParam(':id', $data['id'], PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
}
?>
