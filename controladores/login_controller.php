<?php 
/**
 * 
 */
require_once '../modelo/login_model.php';

class InicioSesion{
	
	function iniciaSesion()
	{
		session_start();
		$usuario = $_POST['usuario'];
		$pass = $_POST['pass'];
		$data = ['usuario' => $usuario, 'pass'=>$pass];

		 $result = LoginModelo::iniciarSesion($data);

		 if (empty($result) || is_null($result)) {
		 	$_SESSION['usuario'] = "";
		 	$response = 0;
		 } else {
		 	foreach ($result as $key => $value) {
		 		$_SESSION['usuario'] = $value['nombre'];
				$_SESSION['rol'] = $value['rol'];
				$_SESSION['ee'] = $value['ee'];

				if ($value['estado'] == 'activo') {
					$response = 1;
				}else{
					$response = 2;
				}

				if ($value['rol'] == 'invitado') {
					$response = 3;
				}

				if ($value['rol'] == 'invitado' && $value['estado'] == 'inactivo') {
					$response = 2;
				}

		 	}
		 }

		 print_r($response);
	}
}

if(isset($_POST['usuario'])){
	$is = new InicioSesion();
	$is->iniciaSesion();
}

?>