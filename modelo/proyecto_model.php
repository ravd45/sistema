<?php 
#se importa la conexcion para la db
require_once '../libs/conectardb.php';

/**
 * 
 */
class ProyectoModelo{
	
#Función para insertar el proyecto en la db
	function creaProyecto($data){

#Declaración de variables
	$proyecto = $data['proyecto'];		
	$fecha = $data['fecha'];
	$municipio = $data['municipio'];
	$beneficiarios = $data['beneficiarios'];

#Consulta para insertar
	$stmt = Conexion::conectar()->prepare("INSERT INTO proyecto (proyecto, localidad, no_beneficiarios, fecha_alta) VALUES (:proyecto, :localidad, :no_beneficiarios, :fecha_alta)");

#Declaración de parametros
	$stmt -> bindParam(":proyecto", $proyecto, PDO::PARAM_STR);
	$stmt -> bindParam(":localidad", $municipio, PDO::PARAM_STR);
	$stmt -> bindParam(":no_beneficiarios", $beneficiarios, PDO::PARAM_STR);
	$stmt -> bindParam(":fecha_alta", $fecha, PDO::PARAM_STR);

#Ejecución de consulta si es true, entonces se insertó, sino, hubo un error
	$result = ($stmt->execute()) ? 1 : 0; #Esta línea es un if () <- condicion ? <- then : <- else 

	return $result;
	}
}
?>