<?php 
/**
 * 
 */
require_once '../modelo/login_model.php';

// class InicioSesion{
	 
// 	public function inicio()
// 	{
// 		session_start();

// 		$data = ['usuario' => $_POST['usuario'],
// 				 'contrasenia' => $_POST['contrasenia']];
// 	   global $response;
// 	    $response = LoginModelo::iniciarSesion($data);
		
		
// 		if (empty($response) || is_null($response)) {
// 			$_SESSION['usuario'] = "";
// 			echo "<script>
// 				window.location='../vistas/error_alert.php?q=2';</script>";
// 		} else{
// 			foreach ($response as $key => $value) {
// 				// var_dump($response); die();
// 				$_SESSION['usuario'] = $value['nombre'];
// 				$_SESSION['rol'] = $value['rol'];

// 				echo "<script>
// 					window.location='../vistas/vista_general.php';</script>";			
// 			}
// 		}
// 	}

// 	function usuario()
// 	{
// 	}
// }

// if(isset($_POST['usuario'])){
// 	$is = new InicioSesion();
// 	$is->inicio();
// }
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

				if ($value['estado'] == 'activo') {
					$response = 1;
				}else{
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