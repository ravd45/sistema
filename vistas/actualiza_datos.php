<?php include '../libs/header.php';
      include '../controladores/actualizar_datos_controller.php';
?>
      <h3>Sustitución de beneficiario</h3>
<?php

$usuario = $_POST['id'];
      $actualizar = new ActualizarController();
      $actualizar->obtenerDatos($usuario);?>
<script>
	function otros() {
		var select = document.getElementById('motivo').value;
		if(select == 'Otro'){
			document.getElementById('observacion').innerHTML = "<i class='material-icons prefix'>assignment</i><input id='observacion' name='observacion' type='text' class='validate' required><label>Motivo de sustitución</label>";
		}else{
			document.getElementById('observacion').innerHTML = "";
		}
	}
</script>

<?php
      include '../libs/footer.php';

?>
