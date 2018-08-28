<?php include '../libs/header.php';
      include '../controladores/actualizar_datos_controller.php';
?>
      <h3>Actualizar datos</h3>
<?php

$usuario = $_POST['id'];
      $actualizar = new ActualizarController();
      $actualizar->obtenerDatos($usuario);
      include '../libs/footer.php';

?>
