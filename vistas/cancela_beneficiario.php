<?php include '../libs/header.php';
      include '../controladores/cancela_controller.php';
?>
      <h3>Cancelación de beneficiario</h3>
<?php

$usuario = $_POST['id'];
      $cancelar = new CancelaController();
      $cancelar->obtenerDatos($usuario);
      include '../libs/footer.php';

?>
