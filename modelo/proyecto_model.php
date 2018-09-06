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
  $modalidad = $data['modalidad'];
  $estado = $data['estado'];
  $oeo = $data['oeo'];
  $ejercicio = $data['ejercicio'];
  $credito = $data['credito'];
  $solucion = $data['solucion'];


#Consulta para insertar
  $stmt = Conexion::conectar()->prepare("INSERT INTO proyecto (proyecto, fecha_alta, estado, modalidad, ejercicio_fiscal, oeo, credito, solucion, localidad) VALUES (:proyecto, :fecha_alta, :estado, :modalidad, :ejercicio_fiscal, :oeo, :credito, :solucion, :localidad)");

#Declaración de parametros
  $stmt -> bindParam(":proyecto", $proyecto, PDO::PARAM_STR);
  $stmt -> bindParam(":fecha_alta", $fecha, PDO::PARAM_STR);
  $stmt -> bindParam(":estado", $estado, PDO::PARAM_STR);
  $stmt -> bindParam(":modalidad", $modalidad, PDO::PARAM_STR);
  $stmt -> bindParam(":ejercicio_fiscal", $ejercicio, PDO::PARAM_STR);
  $stmt -> bindParam(":oeo", $oeo, PDO::PARAM_STR);
  $stmt -> bindParam(":credito", $credito, PDO::PARAM_STR);
  $stmt -> bindParam(":solucion", $solucion, PDO::PARAM_STR);
  $stmt -> bindParam(":localidad", $municipio, PDO::PARAM_STR);

#Ejecución de consulta si es true, entonces se insertó, sino, hubo un error
  $result = ($stmt->execute()) ? 1 : 0; #Esta línea es un if () <- condicion ? <- then : <- else

  if ($result == 1) {
    $stmt = Conexion::conectar()->prepare("SELECT idproyecto FROM proyecto ORDER BY fecha_alta DESC LIMIT 1");
    $stmt->execute();
    return $stmt->fetchAll();
  }

  return $result;
  }

  public function obtenerDatos($id)
  {
    $stmt = Conexion::conectar()->prepare("
    SELECT l.id_layout, p.proyecto, l.curp, l.nombre, l.apellido_paterno, l.apellido_materno, l.genero, l.estado_civil, l.fecha_nacimiento, l.ingreso, l.antiguedad, l.ocupacion, l.telefono, l.solucion, l.subsidio, l.credito, l.enganche_efectivo, l.enganche_especie, l.otros_apoyos, l.modalidad, l.cuv, l.puntaje, e.estado, m.municipio, l.codigo_postal, l.localidad, l.colonia, l.domicilio_beneficiario, l.tipo_asentamiento, l.latitud, l.longitud, l.domicilio_terreno, l.pcu, l.zona FROM layout l
    INNER JOIN municipio m on m.idmunicipio = l.id_municipio
    INNER JOIN estado e on e.idestado = l.id_estado
    INNER JOIN proyecto p on p.idproyecto = l.id_proyecto
    WHERE l.id_layout = :id;");

    $stmt -> bindParam(":id", $id['id'], PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
  }
}
?>
