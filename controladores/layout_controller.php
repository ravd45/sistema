<?php

require_once '../modelo/layout_model.php';
require_once '../modelo/main_model.php';
/**
 *
 */
class LayoutController{
	function entidades($localidad, $municipio, $proyecto,$estado,$layout){
	#variables manipuladas

			$nom_comp = $_POST['nombre']." ".$_POST['apellido_p']." ".$_POST['apellido_m'];
			$coordenada = $_POST['latitud']." -".$_POST['longitud'];
			$rfc = substr($_POST['curp'], 0, 10);

	#Arreglo traido del formulario
			$data = ['proyecto' => $proyecto,
			'curp' => $_POST['curp'],
			'nombre' => $_POST['nombre'],
			'apellido_p' => $_POST['apellido_p'],
			'apellido_m' => $_POST['apellido_m'],
			'nombre_completo' => $nom_comp,
			'genero' => $_POST['genero'],
			'estado_civil' => $_POST['estado_civil'],
			'fecha_nacimiento' => $_POST['fecha_nacimiento'],
			'rfc' => $rfc,
			'ingreso' => $_POST['ingreso'],
			'antiguedad' => $_POST['antiguedad'],
			'ocupacion' => $_POST['ocupacion'],
			'telefono' => $_POST['telefono'],
			'solucion' => $_POST['solucion'],
			'subsidio' => $_POST['subsidio'],
			'credito' => $_POST['credito'],
			'enganche_efectivo' => $_POST['enganche_efectivo'],
			'enganche_especie' => $_POST['enganche_especie'],
			'otros_apoyos' => $_POST['otros_apoyos'],
			'modalidad' => $_POST['modalidad'],
			'cuv' => $_POST['cuv'],
			'puntaje' => $_POST['puntaje'],
			'estado' => $estado,
			'municipio' => $municipio,
			'cp' => $_POST['cp'],
			'localidad'=>$localidad,
			'colonia' => $_POST['colonia'],
			'domicilio_beneficiario' => $_POST['domicilio_beneficiario'],
			'tipo_asentamiento' => $_POST['tipo_asentamiento'],
			'coordenada' => $coordenada,
			'latitud' => $_POST['latitud'],
			'longitud' => "-".$_POST['longitud'],
			'domicilio_terreno' => $_POST['domicilio_terreno'],
			'pcu' => $_POST['pcu'],
			'layout'=>$layout];

			return $data;
	}
	function guardaLayout(){
			$data = ['id' => $_POST['municipio']];
			$result = MainModelo::obtenerMunicipio($data);

			foreach ($result as $row => $item) {
				$localidad = $item['municipio'];
					$data = $this->entidades($localidad, $_POST['municipio'], $_POST['proyecto'], $_POST['estado'],"0");
				}


		$response = LayoutModelo::insertaLayout($data);

		if ($response==1) {
			echo "<script>window.location = '../vistas/proyectos.php';</script>";
		}else{

			echo "datos no insertado";
			echo $response;
		}
	}

	public function actualizaLayout()
	{
		$data = ['municipio' => $_POST['municipio'], 'proyecto'=>$_POST['proyecto'], 'estado'=>$_POST['estado']];
		$result = MainModelo::obtenerIdMunicipio($data);
		$response = MainModelo::obtenerIdProyecto($data);
		$resultadoestado = MainModelo::obtenerIdEstado($data);

		foreach ($resultadoestado as $row => $item) {
			$idestado = $item['idestado'];
		}

		foreach ($response as $row => $item) {
			$idproyecto = $item['idproyecto'];
		}
		foreach ($result as $row => $item) {
			$idmunicipio = $item['idmunicipio'];
				$data = $this->entidades($_POST['municipio'],$idmunicipio,$idproyecto, $idestado, $_POST['layout']);
			}


	$response = LayoutModelo::actualizaLayout($data);

	if ($response==1) {
		echo "<script>window.location = '../vistas/proyectos.php';</script>";
	}else{

		echo "datos no insertado<br>";
		var_dump($data);

	}
	}
}

if(isset($_POST['curp']) && is_numeric($_POST['municipio']) && is_numeric($_POST['proyecto'])){
	$layout = new LayoutController();
	$layout->guardaLayout();
}else{
	$layout = new LayoutController();
	$layout->actualizaLayout();
}




?>
