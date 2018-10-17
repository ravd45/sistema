<?php
  require_once '../libs/conectardb.php';

  /**
   *
   */
  class BeneficiarioModelo
  {

    function cancelarBeneficiario($data)
    {
      $stmt = Conexion::conectar()->prepare("INSERT INTO cancelacion (motivo, idlayout, usuario) VALUES (:motivo,  :id, :usuario)");
      $stmt -> bindParam(":motivo", $data['motivo'], PDO::PARAM_STR);
      $stmt -> bindParam(":id", $data['id'], PDO::PARAM_STR);
      $stmt -> bindParam(":usuario", $data['usuario'], PDO::PARAM_STR);

      $result = ($stmt->execute()) ? 1 : 0;

      if($result == 1){
        $stmt = Conexion::conectar()->prepare("UPDATE layout SET estado_contrato = 'cancelado' where id_layout = :id");
          $stmt -> bindParam(":id", $data['id'], PDO::PARAM_STR);
          $stmt->execute();
      }
      return $result;
      $stmt->close();
    }
  }

?>
