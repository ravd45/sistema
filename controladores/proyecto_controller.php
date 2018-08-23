<?php 

/**
 * 
 */
#Se importa el modelo
require_once '../modelo/proyecto_model.php';

class ProyectoController
{

#Funcion para enviar los datos al modelo
	function creaProyecto(){
#Se crea el arreglo con los datos de la vista
		$data = ['proyecto' => $_POST['proyecto'],
				 'fecha' => $_POST['fecha'],
				 'municipio' => $_POST['municipio'],
				 'beneficiarios' => $_POST['beneficiarios']
				];

#Se invoca el modelo y se mandan los datos
		$response = ProyectoModelo::creaProyecto($data);

		if ($response == 1) {
			echo "<script language='javascript'>window.location='../vistas/form_layout.php';</script>";
		} else {
			echo "Error";
		}
	}
}

#Se verifica que existan todas los datos
if (isset($_POST['proyecto']) && isset($_POST['fecha']) && isset($_POST['municipio']) && isset($_POST['beneficiarios'])) {
	
	$proyecto = new ProyectoController();
	$proyecto -> creaProyecto();
}
?>