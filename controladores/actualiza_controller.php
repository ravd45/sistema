<?php 
require_once '../modelo/actualiza_model.php';
class ActualizaController
{
	public function calculaFechaNac()
	{
		$curp = $_POST['curp'];

		$fn = substr($curp, 4, 6);
		$anio = substr($fn,0,2);
		$mes = substr($fn, 2, 2);
		$dia = substr($fn, 4);

		if ($anio >= 00 && $anio <= 18) {
			$xxi = "20".$anio."-".$mes."-".$dia;
			return $xxi;
		}else{
			$xx = "19".$anio."-".$mes."-".$dia;
			return $xx;
		}
	}

	function actualizarDatos()
	{
		@session_start();
		$nom_comp = $_POST['nombre']." ".$_POST['apellido_p']." ".$_POST['apellido_m'];
		$coordenada = $_POST['latitud']." ".$_POST['longitud'];
		$rfc = substr($_POST['curp'], 0, 10);
		$enganche_especie =  implode ( ', ' , $_POST['enganche_especie']);
		$fecha_nacimiento = $this->calculaFechaNac();
		$gen = substr($_POST['curp'], 10, 1);
		$subsidio = ($_POST['modalidad'] == 'Autoproduccion' || $_POST['modalidad'] == 'AUTOPRODUCCION') ? '71056.96' : '29402.88';
		$genero = ($gen == 'M' || $gen == 'm') ? 'Femenino' : 'Masculino';
		$enganche_efect = (isset($_POST['enganche_efectivo'])) ? $_POST['enganche_efectivo'] : 0;
		$otro_apoyo = 		(isset($_POST['otros_apoyos'])) ? $_POST['otros_apoyos'] : 0;
		$sumatoria = intval($_POST['credito']) + intval($subsidio) + intval($enganche_efect) + intval($otro_apoyo) + 1;
		$domicilio = $_POST['domicilio_beneficiario']. ', '.$_POST['localidad'].', '.$_POST['codigo_postal'].', '.$_POST['estado'];

		
		$data = ['proyecto' => $_POST['proyecto'],
		'curp' => $_POST['curp'],
		'nombre' => $_POST['nombre'],
		'apellido_p' => $_POST['apellido_p'],
		'apellido_m' => $_POST['apellido_m'],
		'nombre_completo' => $nom_comp,
		'genero' => $genero,
		'estado_civil' => $_POST['estado_civil'],
		'fecha_nacimiento' => $fecha_nacimiento,
		'rfc' => $rfc,
		'ingreso' => $_POST['ingreso'],
		'antiguedad' => $_POST['antiguedad'],
		'ocupacion' => $_POST['ocupacion'],
		'telefono' => $_POST['telefono'],
		'solucion' => $_POST['solucion'],
		'subsidio' => $subsidio,
		'credito' => $_POST['credito'],
		'enganche_efectivo' => $_POST['enganche_efectivo'],
		'enganche_especie' => $enganche_especie,
		'otros_apoyos' => $_POST['otros_apoyos'],
		'modalidad' => $_POST['modalidad'],
		'cuv' => "'".$_POST['cuv'],
		'puntaje' => $_POST['puntaje'],
		'estado' => $_POST['estado'],
		'municipio' => $_POST['municipio'],
		'cp' => $_POST['codigo_postal'],
		'localidad'=> $_POST['localidad'],
		'colonia' => $_POST['colonia'],
		'domicilio_beneficiario' => $domicilio,
		'tipo_asentamiento' => $_POST['tipo_asentamiento'],
		'coordenada' => $coordenada,
		'latitud' => $_POST['latitud'],
		'longitud' => $_POST['longitud'],
		'domicilio_terreno' => $_POST['domicilio_terreno'],
		'pcu' => $_POST['pcu'],
		'zona'=>$_POST['zona'],
		'usuario'=>$_SESSION['usuario'],
		'layout'=>$_POST['layout']];

		$actualiza = ActualizaModelo::actualizaDatos($data);

		var_dump($data);
		var_dump($actualiza);
	}
}

if (isset($_POST['datos'])) {
	$actualiza = new ActualizaController();
	$actualiza->actualizarDatos();
}


