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
    UPPER(l.antiguedad) AS 'ANTIGÜEDAD', UPPER(l.ocupacion) AS 'OCUPACION', UPPER(l.telefono) AS 'TELEFONO', UPPER(l.solucion) AS 'SOLUCION', UPPER(l.subsidio) AS 'SUBSIDIO', UPPER(l.credito) AS 'CREDITO', UPPER(l.enganche_efectivo) AS 'ENGANCHE EN EFECTIVO', UPPER(l.enganche_especie) AS 'ENGANCHE EN ESPECIE', UPPER(l.otros_apoyos) AS 'OTROS APOYOS', UPPER(l.modalidad) AS 'MODALIDAD',
    UPPER(l.cuv) AS 'CUV', UPPER(l.puntaje) AS 'PUNTAQJE', upper(e.estado) AS 'ESTADO', upper(m.municipio) AS 'MUNICIPIO', UPPER(l.codigo_postal) AS 'CODIGO POSTAL', UPPER(l.localidad) AS 'LOCALIDAD', UPPER(l.colonia) AS 'COLONIA', UPPER(l.domicilio_beneficiario) AS 'DOMICILIO DEL BENEFICIARIO', UPPER(l.tipo_asentamiento) AS 'TIPO DE ASENTAMIENTO', UPPER(l.coordenadas) AS 'COORDENADAS', UPPER(l.latitud) AS 'LATITUD', UPPER(l.longitud) AS 'LONGITUD', UPPER(l.domicilio_terreno) AS 'DOMICILIO DEL TERRENO', UPPER(l.pcu) AS 'PCU'
    FROM layout l
    INNER JOIN municipio m on m.idmunicipio = l.id_municipio
    INNER JOIN estado e on e.idestado = l.id_estado
    INNER JOIN proyecto p on p.idproyecto = l.id_proyecto
    WHERE l.id_proyecto = $id  AND l.estado_contrato = 'activo';";
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

       echo '
    <script> 
    window.location="../vistas/error_alert.php?q=1"
</script>'; 

   }

   exit;


}
    function exportarChecklist($data)
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
    $sql = "SELECT c.ife, c.curp, c.comprobante_domicilio as 'Comprobante de Domicilio', c.posesion_terreno as 'Comprobante de posesión de terreno', c.acta_nacimiento as 'Acta de Nacimiento', l.nombre_completo as 'Beneficiario' FROM checklist c INNER JOIN layout l on l.id_layout = c.id_layout WHERE c.id_layout = $id;";
    $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            $filas[]= $row;
        }
     // if(isset($_POST["export_data"])) {

    if(!empty($filas)) {

        $filename = "checklist.xls";

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

      echo'<script> 
    window.location="../vistas/error_alert.php?q='.$id.'"
</script>'; 

 }

 exit;
    }
}

?>
