<?php
require_once '../libs/conectardb.php';
require_once '../libs/dbinegi.php';
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

    function obtenerTotalCapturados($id)
  {
    $stmt = Conexion::conectar()->prepare("SELECT count(*) AS total FROM proyecto p
                                           INNER JOIN layout l on l.id_proyecto = p.idproyecto
                                           WHERE p.idproyecto = :id  and l.estado_contrato = 'activo'");
    $stmt -> bindParam(":id", $id['id'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }

  public function obtenerProyectos()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM proyecto ORDER BY idproyecto DESC;");
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
    $stmt = ConexionInegi::conectar()->prepare("SELECT * FROM estados;");
    $stmt->execute();
    return $stmt -> fetchAll();
    $stmt->close();
  }

  public function catalogoMunicipio($data)
  {
    $stmt = ConexionInegi::conectar()->prepare("SELECT em.*, e.estado, m.municipio from estados_municipios em
inner join estados e on e.id = em.estados_id
inner join municipios m on m.id = em.municipios_id
where e.estado = :estado
 order by m.municipio asc;
");
    $stmt->bindParam(':estado', $data['estado'],PDO::PARAM_STR);
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

  function obtenerDatosProyecto($data)
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM proyecto WHERE idproyecto = :id");
    $stmt->bindParam(':id', $data['id'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }

  function obtenerCP($data)
  {
    $stmt = ConexionInegi::conectar()->prepare("call estados.codigosPostales(:municipio)");
    $stmt->bindParam(':municipio', $data['municipio'], PDO::PARAM_STR,4000);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }

  function obtenMunicipio($data)
  {
    $stmt = Conexion::conectar()->prepare("SELECT localidad FROM proyecto WHERE idproyecto = :id");
    $stmt->bindParam(':id',$data['id'],PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }

  function obtenerColonias($data)
  {
    $stmt = ConexionInegi::conectar()->prepare("SELECT colonia FROM colonia WHERE codigo_postal = :cp");
    $stmt->bindParam(':cp', $data['cp'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }

}


?>
