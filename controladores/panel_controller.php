<?php 
require_once '../modelo/panel_model.php';
/**
 * 
 */
class PanelController
{
	
	function consultaUsuario()
	{
		$correo = $_POST['correo'];
		$pass = $_POST['contrasenia'];

		$usuario = PanelModelo::buscarUsuario();
		foreach ($usuario as $key => $value) {

			if ($correo == $value['correo']) {
				if ($pass == $value['pass']) {
					$response = 0;
				}
			} 

		}
		print_r($response);
	}

	public function eliminarUsuario()
	{
		$correo = $_POST['correo'];
		$pass = $_POST['contrasenia'];

		$data = ['correo' => $correo, 'pass' => $pass];

		$response = PanelModelo::eliminarUsuario($data);

		print_r($response);
	}

	function listaUsuarios()
	{
		$estado = $_POST['estado'];
		$data = ['estado' => $estado];

		$lista = PanelModelo::listaUsuarios($data);

		foreach ($lista as $key => $value) {
			$result = '<tr><td>'.$value['nombre'].'</td><td>'.$value['correo'].'</td><td>'.$value['pass'].'</td><td>'.$value['rol'].'</td></tr>';
			print_r($result);
		}
	}

	function creaUsuario()
	{
		$nombre = $_POST['nombre'];
		$correo = $_POST['correo'];
		$pass = $_POST['pass'];
		$rol = $_POST['rol'];
		$ee = $_POST['ee'];
		$data = ['nombre' =>$nombre, 'correo' =>$correo, 'pass' =>$pass, 'rol' =>$rol, 'ee'=>$ee];

		$response = PanelModelo::creaUsuario($data);

		print_r($response);
	}

	function buscaCorreo()
	{
		$correo = $_POST['correo'];

		$usuario = PanelModelo::buscarUsuario();
		foreach ($usuario as $key => $value) {

			if ($correo == $value['correo']) {
				
				$response = 1;
			}
		}
		print_r($response);
	}

	function listaCancelados()
	{
		$data = ['cancelado' => $_POST['cancelados']];
		$listaCancel = PanelModelo::listaCancelados($data);

		foreach ($listaCancel as $key => $value) {
			if ($data['cancelado']==0) {
				
			
			$response = '<tr><td>'.$value['nombre_completo'].'</td><td>'.$value['motivo'].'</td><td>'.$value['fecha_cancelacion'].'</td><td>'.$value['usuario'].'</td><td><button class="activar btn-small" value="'.$value['idlayout'].'">Re-Activar</button></td></tr>';
		}else{
			$response = '<tr><td>'.$value['nombre_completo'].'</td><td>'.$value['motivo'].'</td><td>'.$value['fecha_cancelacion'].'</td><td>'.$value['usuario'].'</td></tr>';
		}

		print_r($response);
		}
	}

	function listaSustituidos()
	{
		$listaCancel = PanelModelo::listaSustituidos();

		foreach ($listaCancel as $key => $value) {
			$response = '<tr><td>'.$value['sustituido'].'</td><td>'.$value['motivo'].'</td><td>'.$value['fecha_sustitucion'].'</td><td>'.$value['sustituto'].'</td><td>'.$value['usuario'].'</td></tr>';
		print_r($response);
		}
	}


	function reactivarBeneficiario()
	{
		$data = ['id' => $_POST['id']];

		$response = PanelModelo::reactivarBeneficiario($data);

		print_r($response);
	}
}

if (isset($_POST['correo']) && isset($_POST['contrasenia']) && isset($_POST['consulta'])) {

	$panel = new PanelController();
	$panel -> consultaUsuario();
}
if (isset($_POST['correo']) && isset($_POST['contrasenia']) && isset($_POST['elimina'])) {

	$panel = new PanelController();
	$panel -> eliminarUsuario();
}
if (isset($_POST['estado'])) {
	
	$panel = new PanelController();
	$panel -> listaUsuarios();
}
if (isset($_POST['crear'])) {
	$panel = new PanelController();
	$panel -> creaUsuario();
}
if (isset($_POST['ccorreo'])) {
	$panel = new PanelController();
	$panel -> buscaCorreo();
}

if (isset($_POST['reactivar'])) {
	$panel = new PanelController();
	$panel -> reactivarBeneficiario();
}

if (isset($_POST['cancelados'])) {
	$panel = new PanelController();
	$panel -> listaCancelados();
}
?>