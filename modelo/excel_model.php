<?php
require_once '../libs/conectardb.php';

/**
 *
 */
class ExcelModelo
{

  public function exportar($data)
  {
    $id = $data['id'];
    $server = "localhost";
    $user = "root";
    $pass = "desarrollo_1";
    $dbname = "sistema";

    $conn = new mysqli($server, $user, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$sql = "SELECT UPPER( l.estatus) as 'STATUS', UPPER(l.fecha_apartado) as 'FECHA APARTADO', UPPER(l.curp) AS 'CURP', UPPER(l.nombre) AS 'NOMBRE', UPPER(l.apellido_paterno) AS 'APELLIDO PATERNO', UPPER(l.apellido_materno) AS 'APELLIDO MATERNO', UPPER(l.nombre_completo) AS 'NOMBRE COMPLETO', UPPER(l.genero) AS 'GENERO', UPPER(l.estado_civil) AS 'ESTADO CIVIL', UPPER(l.fecha_nacimiento) AS 'FECHA DE NACIMIENTO', UPPER(l.rfc) AS 'RFC', UPPER(l.ingreso) AS 'INGRESO',
    UPPER(l.antiguedad) AS 'ANTIGÜEDAD', UPPER(l.ocupacion) AS 'OCUPACIÓN', UPPER(l.telefono) AS 'TELÉFONO', UPPER(l.solucion) AS 'SOLUCIÓN', UPPER(l.subsidio) AS 'SUBSIDIO', UPPER(l.credito) AS 'CRÉDITO', UPPER(l.enganche_efectivo) AS 'ENGANCHE EN EFECTIVO', UPPER(l.enganche_especie) AS 'ENGANCHE EN ESPECIE', UPPER(l.otros_apoyos) AS 'OTROS APOYOS', UPPER(l.modalidad) AS 'MODALIDAD',
    UPPER(l.cuv) AS 'CUV', UPPER(l.puntaje) AS 'PUNTAQJE', upper(e.estado) AS 'ESTADO', upper(m.municipio) AS 'MUNICIPIO', UPPER(l.codigo_postal) AS 'CÓDIGO POSTAL', UPPER(l.localidad) AS 'LOCALIDAD', UPPER(l.colonia) AS 'COLONIA', UPPER(l.domicilio_beneficiario) AS 'DOMICILIO DEL BENEFICIARIO', UPPER(l.tipo_asentamiento) AS 'TIPO DE ASENTAMIENTO', UPPER(l.coordenadas) AS 'COORDENADAS', UPPER(l.latitud) AS 'LATITUD', UPPER(l.longitud) AS 'LONGITUD', UPPER(l.domicilio_terreno) AS 'DOMICILIO DEL TERRENO', UPPER(l.pcu) AS 'PCU'
    FROM layout l
    INNER JOIN municipio m on m.idmunicipio = l.id_municipio
    INNER JOIN estado e on e.idestado = l.id_estado
    INNER JOIN proyecto p on p.idproyecto = l.id_proyecto
    WHERE l.id_proyecto = $id;";
    // $sql = "SELECT l.estatus as status, l.fecha_apartado as fecha_apartado, l.curp, l.nombre, l.apellido_paterno, l.apellido_materno, l.nombre_completo, l.genero, l.estado_civil, l.fecha_nacimiento, l.rfc, l.ingreso,
    // l.antiguedad, l.ocupacion, l.telefono, l.solucion, l.subsidio, l.credito, l.enganche_efectivo, l.enganche_especie, l.otros_apoyos, l.modalidad,
    // l.cuv, l.puntaje, e.estado, m.municipio, l.codigo_postal, l.localidad, l.colonia, l.domicilio_beneficiario, l.tipo_asentamiento, l.coordenadas, l.latitud, l.longitud, l.domicilio_terreno, l.pcu
    // FROM layout l
    // INNER JOIN municipio m on m.idmunicipio = l.id_municipio
    // INNER JOIN estado e on e.idestado = l.id_estado
    // INNER JOIN proyecto p on p.idproyecto = l.id_proyecto
    // WHERE l.id_proyecto = $id;";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        $filas[]= $row;
    }
     // if(isset($_POST["export_data"])) {

        if(!empty($filas)) {

            $filename = "layout.xls";

            header("Content-Type: application/vnd.ms-excel");

            header("Content-Disposition: attachment; filename=".$filename);



            $mostrar_columnas = false;



            foreach($filas as $fila) {

                if(!$mostrar_columnas) {

                    echo implode("\t", array_keys($fila)) . "\n";

                    $mostrar_columnas = true;

                }

                echo implode("\t", array_values($fila)) . "\n";

            }



        }else{

           echo '<script language="javascript">
               alert("No hay datos para exportar");
               window.location = "../vistas/proyectos.php";
               </script>'; 

        }

        exit;


  }
}

 ?>
