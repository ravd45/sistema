<?php
require_once '../libs/conectardb.php';
/**
 *
 */
class MainModelo
{
  public function obtenerIdProyecto($data)
  {
    $stmt = Conexion::conectar()->prepare("SELECT idproyecto FROM proyecto WHERE proyecto = :proyecto;");

    $stmt -> bindParam(":proyecto", $data['proyecto'], PDO::PARAM_STR);
    $stmt->execute();

    return $stmt -> fetchAll();
    $stmt->close();
  }

  public function obtenerProyectos()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM proyecto ORDER BY fecha_alta DESC;");
    $stmt->execute();
    return $stmt -> fetchAll();
    $stmt->close();
  }

  public function obtenerMunicipio($data)
  {
    $stmt = Conexion::conectar()->prepare("SELECT municipio FROM municipio WHERE idmunicipio = :id;");

    $stmt -> bindParam(":id", $data['id'], PDO::PARAM_STR);
    $stmt->execute();

    return $stmt -> fetchAll();
    $stmt->close();
  }

  public function obtenerIdMunicipio($data)
  {
    $stmt = Conexion::conectar()->prepare("SELECT idmunicipio FROM municipio WHERE municipio = :municipio;");

    $stmt -> bindParam(":municipio", $data['municipio'], PDO::PARAM_STR);
    $stmt->execute();

    return $stmt -> fetchAll();
    $stmt->close();
  }


  public function obtenerIdEstado($data)
  {
    $stmt = Conexion::conectar()->prepare("SELECT idestado FROM estado WHERE estado = :estado;");

    $stmt -> bindParam(":estado", $data['estado'], PDO::PARAM_STR);
    $stmt->execute();

    return $stmt -> fetchAll();
    $stmt->close();
  }


  public function catalogoEstado()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM estado;");
    $stmt->execute();
    return $stmt -> fetchAll();
    $stmt->close();
  }

  public function catalogoMunicipio()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM municipio;");
    $stmt->execute();
    return $stmt -> fetchAll();
    $stmt->close();
  }

  public function listaProyectos($data)
  {
    $stmt = Conexion::conectar()->prepare("SELECT p.proyecto, l.estatus, l.fecha_apartado, l.nombre_completo, l.id_layout FROM proyecto p
                                           INNER JOIN layout l on l.id_proyecto = p.idproyecto
                                           WHERE p.idproyecto = :id  and l.estado_contrato = 'activo' ORDER BY l.nombre_completo ASC;");
    $stmt -> bindParam(":id", $data['id'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt -> fetchAll();
    $stmt->close();
  }

}


?>
