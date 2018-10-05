<?php 
require_once '../libs/conectardb.php';

/**
 * 
 */
class ActualizaModelo
{
	
	function actualizaDatos($data)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE layout SET curp=:curp, nombre=:nombre, apellido_paterno=:apellido_p, apellido_materno=:apellido_m, nombre_completo=:nombre_completo, genero=:genero, estado_civil=:estado_civil, fecha_nacimiento=:fecha_nacimiento, rfc=:rfc, ingreso=:ingreso, antiguedad=:antiguedad, ocupacion=:ocupacion, telefono=:telefono, solucion=:solucion, subsidio=:subsidio, credito=:credito, enganche_efectivo=:enganche_efectivo, enganche_especie=:enganche_especie, otros_apoyos=:otros_apoyos, modalidad=:modalidad, cuv=:cuv, puntaje=:puntaje, estado=:estado, municipio=:municipio, codigo_postal=:codigo_postal, localidad=:localidad, colonia=:colonia, domicilio_beneficiario=:domicilio_beneficiario, tipo_asentamiento=:tipo_asentamiento, coordenadas=:coordenadas, latitud=:latitud, longitud=:longitud, domicilio_terreno=:domicilio_terreno, pcu=:pcu, zona=:zona WHERE id_layout = :id");
		$stmt->bindParam(":id",$data['layout'],PDO::PARAM_STR);
		$stmt->bindParam(":curp",$data['curp'],PDO::PARAM_STR);
		$stmt->bindParam(":nombre",$data['nombre'],PDO::PARAM_STR);
		$stmt->bindParam(":apellido_p",$data['apellido_p'],PDO::PARAM_STR);
		$stmt->bindParam(":apellido_m",$data['apellido_m'],PDO::PARAM_STR);
		$stmt->bindParam(":nombre_completo",$data['nombre_completo'],PDO::PARAM_STR);
		$stmt->bindParam(":genero",$data['genero'],PDO::PARAM_STR);
		$stmt->bindParam(":estado_civil",$data['estado_civil'],PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento",$data['fecha_nacimiento'],PDO::PARAM_STR);
		$stmt->bindParam(":rfc",$data['rfc'],PDO::PARAM_STR);
		$stmt->bindParam(":ingreso",$data['ingreso'],PDO::PARAM_STR);
		$stmt->bindParam(":antiguedad",$data['antiguedad'],PDO::PARAM_STR);
		$stmt->bindParam(":ocupacion",$data['ocupacion'],PDO::PARAM_STR);
		$stmt->bindParam(":telefono",$data['telefono'],PDO::PARAM_STR);
		$stmt->bindParam(":solucion",$data['solucion'],PDO::PARAM_STR);
		$stmt->bindParam(":subsidio",$data['subsidio'],PDO::PARAM_STR);
		$stmt->bindParam(":credito",$data['credito'],PDO::PARAM_STR);
		$stmt->bindParam(":enganche_efectivo",$data['enganche_efectivo'],PDO::PARAM_STR);
		$stmt->bindParam(":enganche_especie",$data['enganche_especie'],PDO::PARAM_STR);
		$stmt->bindParam(":otros_apoyos",$data['otros_apoyos'],PDO::PARAM_STR);
		$stmt->bindParam(":modalidad",$data['modalidad'],PDO::PARAM_STR);
		$stmt->bindParam(":cuv",$data['cuv'],PDO::PARAM_STR);
		$stmt->bindParam(":puntaje",$data['puntaje'],PDO::PARAM_STR);
		$stmt->bindParam(":estado",$data['estado'],PDO::PARAM_STR);
		$stmt->bindParam(":municipio",$data['municipio'],PDO::PARAM_STR);
		$stmt->bindParam(":codigo_postal",$data['cp'],PDO::PARAM_STR);
		$stmt->bindParam(":localidad",$data['localidad'],PDO::PARAM_STR);
		$stmt->bindParam(":colonia",$data['colonia'],PDO::PARAM_STR);
		$stmt->bindParam(":domicilio_beneficiario",$data['domicilio_beneficiario'],PDO::PARAM_STR);
		$stmt->bindParam(":tipo_asentamiento",$data['tipo_asentamiento'],PDO::PARAM_STR);
		$stmt->bindParam(":coordenadas",$data['coordenada'],PDO::PARAM_STR);
		$stmt->bindParam(":latitud",$data['latitud'],PDO::PARAM_STR);
		$stmt->bindParam(":longitud",$data['longitud'],PDO::PARAM_STR);
		$stmt->bindParam(":domicilio_terreno",$data['domicilio_terreno'],PDO::PARAM_STR);
		$stmt->bindParam(":pcu",$data['pcu'],PDO::PARAM_STR);
		$stmt->bindParam(":zona",$data['zona'],PDO::PARAM_STR);

		$result = $stmt->execute();

		return $result;

		$stmt->close();
	}
}
