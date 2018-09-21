<?php 
include '../libs/header.php';
include '../controladores/actualizar_datos_controller.php';

$id = $_POST['layout'];

$actualizar = new ActualizarController();
$actualizar->actualizaBeneficiario($id);

include '../libs/footer.php';

 ?>