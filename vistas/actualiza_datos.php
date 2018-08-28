<?php include '../libs/header.php';
      include '../controladores/actualizar_datos_controller.php';
?>
      <h3>Actualizar datos</h3>
<?php
      $actualizar = new ActualizarController();
      $actualizar->obtenerDatos(2);
      include '../libs/footer.php'; ?>
