<?php
  require_once '../libs/conectardb.php';

  /**
   *
   */
  class BeneficiarioModelo
  {

    function cancelarBeneficiario($data)
    {
      $stmt = Conexion::conectar()->prepare("INSERT INTO cancelacion (motivo, fecha_cancelacion, idlayout) VALUES (:motivo, :fecha, :id)");
      $stmt -> bindParam(":motivo", $data['motivo'], PDO::PARAM_STR);
      $stmt -> bindParam(":fecha", $data['fecha'], PDO::PARAM_STR);
      $stmt -> bindParam(":id", $data['id'], PDO::PARAM_STR);

      $result = ($stmt->execute()) ? 1 : 0;

      return $result;
      $stmt->close();
    }
  }

?>
