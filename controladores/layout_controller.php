<?php

require_once '../modelo/layout_model.php';
require_once '../modelo/main_model.php';
/**
 *
 */
class LayoutController{
	function entidades(){
	#variables manipuladas
		$data = ['id' => $_POST['municipio']];
		$result = MainModelo::obtenerMunicipio($data);

		foreach ($result as $row => $item) {
			$localidad = $item['municipio'];
			}
			$nom_comp = $_POST['nombre']." ".$_POST['apellido_p']." ".$_POST['apellido_m'];
			$coordenada = $_POST['latitud']." -".$_POST['longitud'];
			$rfc = substr($_POST['curp'], 0, 10);

	#Arreglo traido del formulario
			$data = ['proyecto' => $_POST['proyecto'],
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
			'estado' => $_POST['estado'],
			'municipio' => $_POST['municipio'],
			'cp' => $_POST['cp'],
			'localidad'=>$localidad,
			'colonia' => $_POST['colonia'],
			'domicilio_beneficiario' => $_POST['domicilio_beneficiario'],
			'tipo_asentamiento' => $_POST['tipo_asentamiento'],
			'coordenada' => $coordenada,
			'latitud' => $_POST['latitud'],
			'longitud' => "-".$_POST['longitud'],
			'domicilio_terreno' => $_POST['domicilio_terreno'],
			'pcu' => $_POST['pcu']];

			return $data;
	}
	function guardaLayout(){
		$data = $this->entidades();

		$response = LayoutModelo::insertaLayout($data);
print_r($data);
		if ($response==1) {
			echo "<script>window.location = '../vistas/proyectos.php';</script>";
		}else{

			echo "datos no insertado";
			echo $response;
		}
	}

	public function actualizaLayout()
	{
		// code...
	}
}

if(isset($_POST['curp'])){
	$layout = new LayoutController();
	$layout->guardaLayout();
}
if (isset($_POST['actualizacion'])) {
	$layout = new LayoutController();
	$layout->actualizaLayout();
}
?>
