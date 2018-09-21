<?php 
require_once '../modelo/proyecto_model.php';
/**
 * 
 */
class EliminarController
{
	
	function eliminarProyecto($proyecto)
	{
		$data = ['id'=>$proyecto];
		$result = ProyectoModelo::eliminarProyecto($data);

		// var_dump($result);
		if ($result != 0) {

			echo "<script>window.location = '../vistas/proyectos.php'</script>";
		}else{
			echo "<h1>Error al eliminar el proyecto</h1>";
		}
	}
}



if (isset($_POST['proyecto'])) {
$proyecto = $_POST['proyecto'];


	$eliminar = new EliminarController();
	$eliminar->eliminarProyecto($proyecto);
}


?>