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
			echo "Datos invalidos";
		} else{
			echo "";
		}
	}
}

if(isset($_POST['usuario'])){
	$is = new InicioSesion();
	$is->inicio();
}

?>