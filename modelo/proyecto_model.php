<?php
#se importa la conexcion para la db
require_once '../libs/conectardb.php';

/**
 *
 */
class ProyectoModelo{

#Función para insertar el proyecto en la db
  public function creaProyecto($data)
  {
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

  public function obtenerDatos($id)
  {
    $stmt = Conexion::conectar()->prepare("
    SELECT l.curp, l.nombre, l.apellido_paterno, l.apellido_materno, l.genero, l.estado_civil, l.fecha_nacimiento, l.ingreso, l.antiguedad, l.ocupacion, l.telefono, l.solucion, l.subsidio, l.credito, l.enganche_efectivo, l.enganche_especie, l.otros_apoyos, l.modalidad, l.cuv, l.puntaje, e.estado, m.municipio, l.codigo_postal, l.localidad, l.colonia, l.domicilio_beneficiario, l.tipo_asentamiento, l.latitud, l.longitud, l.domicilio_terreno, l.pcu FROM layout l
    INNER JOIN municipio m on m.idmunicipio = l.id_municipio
    INNER JOIN estado e on e.idestado = l.id_estado
    WHERE l.id_layout = :id;");

    $stmt -> bindParam(":id", $id['id'], PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
  }
}
?>
