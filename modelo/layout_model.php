<?php 
require_once '../libs/conectardb.php';

/**
 * 
 */
class LayoutModelo{
	
	function insertaLayout($data){
		$stmt = Conexion::conectar()->prepare("INSERT INTO layout (id_proyecto, fecha_apartado, curp, nombre, apellido_paterno, apellido_materno, nombre_completo, genero, estado_civil, fecha_nacimiento, rfc, ingreso, antiguedad, ocupacion, telefono, solucion, subsidio, credito, enganche_efectivo, enganche_especie, otros_apoyos, modalidad, cuv, puntaje, id_estado, id_municipio, codigo_postal, localidad, colonia, domicilio_beneficiario, tipo_asentamiento, coordenadas, latitud, longitud, domicilio_terreno, pcu) VALUES (:proyecto, :fecha_apartado, :nombre, :apellido_p, :apellido_m, :nombre_completo, :curp, :genero, :fecha_nacimiento, :rfc, :ingreso, :antiguedad, :ocupacion, :telefono, :solucion, :subsidio, :credito, :enganche_efectivo, :enganche_especie, :otros_apoyos, :modalidad, :cuv, :puntaje, :estado, :municipio, :cp, :colonia, :domicilio_beneficiario, :tipo_asentamiento, :coordenada, :latitud, :longitud, :domicilio_terreno, :pcu)")
		
		$stmt -> bindParam(":proyecto", $data['proyecto'], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_apartado"	,	$data['fecha_apartado'], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido_p", $data['apellido_p'], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido_m", $data['apellido_m'], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre_completo", $data['nombre_completo'], PDO::PARAM_STR);
		$stmt -> bindParam(":curp", $data['curp'], PDO::PARAM_STR);
		$stmt -> bindParam(":genero", $data['genero'], PDO::PARAM_STR);
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
		$stmt -> bindParam(":puntaje", $data['puntaje'], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $data['estado'], PDO::PARAM_STR);
		$stmt -> bindParam(":municipio", $data['municipio'], PDO::PARAM_STR);
		$stmt -> bindParam(":cp", $data['cp'], PDO::PARAM_STR);
		$stmt -> bindParam(":colonia", $data['colonia'], PDO::PARAM_STR);
		$stmt -> bindParam(":domicilio_beneficiario", $data['domicilio_beneficiario'], PDO::PARAM_STR);
		$stmt -> bindParam(":tipo_asentamiento", $data['tipo_asentamiento'], PDO::PARAM_STR);
		$stmt -> bindParam(":coordenada", $data['coordenada'], PDO::PARAM_STR);
		$stmt -> bindParam(":latitud", $data['latitud'], PDO::PARAM_STR);
		$stmt -> bindParam(":longitud", $data['longitud'], PDO::PARAM_STR);
		$stmt -> bindParam(":domicilio_terreno", $data['domicilio_terreno'], PDO::PARAM_STR);
		$stmt -> bindParam(":pcu", $data['pcu'], PDO::PARAM_STR);

	}
}
?>