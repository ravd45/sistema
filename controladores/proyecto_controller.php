<?php

/**
 *
 */
#Se importa el modelo
require_once '../modelo/proyecto_model.php';
require_once '../modelo/main_model.php';

class ProyectoController
{

#Funcion para enviar los datos al modelo
	function creaProyecto(){
#Variables que se manipulan
		$data = ['id' => $_POST['municipio']];
		$result = MainModelo::obtenerMunicipio($data);

		foreach ($result as $row => $item) {
			$localidad = $item['municipio'];
				$proyecto = $localidad." (".$_POST['beneficiarios'].")";
		}

#Se crea el arreglo con los datos de la vista
		$data = ['proyecto' => $proyecto,
				 		 'fecha' => $_POST['fecha'],
				 		 'municipio' => $_POST['municipio'],
				 		 'beneficiarios' => $_POST['beneficiarios']
						];

#Se invoca el modelo y se mandan los datos
		$response = ProyectoModelo::creaProyecto($data);

		if (!is_null($response)) {
			foreach ($response as $key => $value) {
				$id = $value['idproyecto'];
			}
			echo "<script language='javascript'>window.location='../vistas/form_layout.php?w=$id';</script>";
		} else {
			echo "Error al crear el proyecto";
		}
	}
}

#Se verifica que existan todas los datos
if (isset($_POST['fecha']) && isset($_POST['municipio']) && isset($_POST['beneficiarios'])) {

	$proyecto = new ProyectoController();
	$proyecto -> creaProyecto();
}
?>
