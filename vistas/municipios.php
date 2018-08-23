<?php 

include 'conectardb.php';
/**
 * 
 */
class Municipios{

	function __construct(){
		$this = new Municipios();
		$result = $this::municipios();

	}
	function municipios(){
		$this = new Municipios();
		$result = $this::obtenerMunicipios();

		foreach ($result as $row => $item) {
			var_dump($item['municipio']);
		}
	}
	
#Funcion para obtener los 217 municipios desde la base de datos
	function obtenerMunicipios(){
		
#Consulta
		$stmt = Conexion::conectar()->prepare("SELECT *  FROM municipios");

#Ejecución de la consulta
		$stmt -> execute();

#Obtencion de los municipios
		return $stmt -> fetchAll();
	}
}

}
 ?>