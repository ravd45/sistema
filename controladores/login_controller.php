<?php 

/**
 * 
 */
require_once '../modelo/login_model.php';

class InicioSesion{
	
	public function inicio(){
		$data = ['usuario' => $_POST['usuario'],
				 'contrasenia' => $_POST['contrasenia']];
		$response = LoginModelo::iniciarSesion($data);
		
		if (empty($response) || is_null($response)) {
			echo "<script>window.location='../index.php';</script>";
		} else{
			echo "<script>window.location='../vistas/vista_general.php?=1';</script>";
		}
	}
}

if(isset($_POST['usuario'])){
	$is = new InicioSesion();
	$is->inicio();
}

?>