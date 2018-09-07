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
		// $result = MainModelo::obtenerMunicipio();


		// foreach ($result as $row => $item) {
		// 	$localidad = $item['municipio'];
				$proyecto =  $_POST['proyecto'] .", ".$_POST['estado'] .", ".$_POST['municipio'].", ".$_POST['modalidad'].", Ejercicio fiscal ".$_POST['ejercicio'].", OEO: ".$_POST['oeo'];
		// }

#Se crea el arreglo con los datos de la vista
		$data = ['proyecto' => $proyecto,
				 		 'fecha' => $_POST['fecha'],
				 		 'municipio' => $_POST['municipio'],
				 		 'oeo' => $_POST['oeo'],
				 		 'estado'=> $_POST['estado'],
				 		 'ejercicio'=>$_POST['ejercicio'],
				 		 'modalidad'=>$_POST['modalidad'],
				 		 'credito'=>$_POST['credito'],
				 		 'solucion'=>$_POST['solucion']
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
if (isset($_POST['fecha']) && isset($_POST['municipio'])) {

	$proyecto = new ProyectoController();
	$proyecto -> creaProyecto();
}
?>
