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
    /*Produccion
        $server = "localhost";
        $user = "id7019453_root";
        $pass = "desarrollo_1";
        $dbname = "id7019453_sistema"; */

        /*Desarrollo*/
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
    UPPER(l.antiguedad) AS 'ANTIGUEDAD', UPPER(l.ocupacion) AS 'OCUPACION', UPPER(l.telefono) AS 'TELEFONO', UPPER(l.solucion) AS 'SOLUCION', UPPER(l.subsidio) AS 'SUBSIDIO', UPPER(l.credito) AS 'CREDITO', UPPER(l.enganche_efectivo) AS 'ENGANCHE EN EFECTIVO', UPPER(l.enganche_especie) AS 'ENGANCHE EN ESPECIE', UPPER(l.otros_apoyos) AS 'OTROS APOYOS', UPPER(l.modalidad) AS 'MODALIDAD',
    UPPER(l.cuv) AS 'CUV', UPPER(l.puntaje) AS 'PUNTAJE', upper(l.estado) AS 'ESTADO', upper(l.municipio) AS 'MUNICIPIO', UPPER(l.codigo_postal) AS 'CODIGO POSTAL', UPPER(l.localidad) AS 'LOCALIDAD', UPPER(l.colonia) AS 'COLONIA', UPPER(l.domicilio_beneficiario) AS 'DOMICILIO DEL BENEFICIARIO', UPPER(l.tipo_asentamiento) AS 'TIPO DE ASENTAMIENTO', UPPER(l.coordenadas) AS 'COORDENADAS', UPPER(l.latitud) AS 'LATITUD', UPPER(l.longitud) AS 'LONGITUD', UPPER(l.domicilio_terreno) AS 'DOMICILIO DEL TERRENO', UPPER(l.pcu) AS 'PCU'
    FROM layout l
    INNER JOIN proyecto p on p.idproyecto = l.id_proyecto
    WHERE l.id_proyecto = $id  AND l.estado_contrato = 'activo' ORDER BY l.nombre_completo ASC;";
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
    /*Produccion
        $server = "localhost";
        $user = "id7019453_root";
        $pass = "desarrollo_1";
        $dbname = "id7019453_sistema"; */

        /*Desarrollo*/
        $server = "localhost";
        $user = "root";
        $pass = "desarrollo_1";
        $dbname = "sistema";


    $conn = new mysqli($server, $user, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT upper(c.ruta_ife) as 'Ruta de IFE/INE',
upper(c.ife) as 'IFE / INE',
upper(c.ruta_curp) as 'Ruta de la CURP',
upper(c.curp) as 'CURP',
upper(c.ruta_comprobante) as 'Ruta de comprobante de domicilio',
upper(c.comprobante_domicilio) as 'Comprobante de domicilio',
upper(c.ruta_posesion) as 'Ruta de comprobante de posesion de terreno',
upper(c.posesion_terreno) as 'Comprobante de posesion de terreno',
upper(c.ruta_nacimiento) as 'Ruta de Acta de nacimiento',
upper(c.acta_nacimiento) as 'Acta de nacimiento',
upper(l.nombre_completo) as 'Beneficiario'
FROM checklist c INNER JOIN layout l on l.id_layout = c.id_layout WHERE c.id_layout = $id;";
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

     function exportarEjeChecklist($data)
    {
           $id = $data['id'];
    /*Produccion
        $server = "localhost";
        $user = "id7019453_root";
        $pass = "desarrollo_1";
        $dbname = "id7019453_sistema"; */

        /*Desarrollo*/
        $server = "localhost";
        $user = "root";
        $pass = "desarrollo_1";
        $dbname = "sistema";


    $conn = new mysqli($server, $user, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT upper(c.ruta_licencia) as 'Ruta de licencia',
upper(c.licencia_construccion) as 'Licencia de construccion',
upper(c.ruta_financiera) as 'Ruta de Contrato de la financiera',
upper(c.contrato_financiera) as 'Contrato de la financiera',
upper(c.ruta_smunicipal) as 'Ruta de solicitud de subsidio municipal',
upper(c.subsidio_municipal) as 'Solicitud de subsidio municipal',
upper(c.ruta_cmunicipal) as 'Ruta de certificado de subsidio municipal',
upper(c.certificado_municipal) as 'Certificado de subsidio municipal',
upper(c.ruta_4) as 'Ruta de Anexo 4',
upper(c.anexo_4) as 'Anexo 4',
upper(c.ruta_mandato) as 'Ruta de carta de mandato irrevocable',
upper(c.mandato_irrevocable) as 'Carta de mandato irrevocable',
upper(c.ruta_oeo) as 'Ruta de contrato OEO',
upper(c.contrato_oeo) as 'Contrato OEO',
upper(c.ruta_anexo) as 'Ruta de anexo tecnico',
upper(c.anexo_tecnico) as 'Anexo tecnico',
upper(c.ruta_poliza) as 'Ruta de poliza de garantia',
upper(c.poliza_garantia) as 'Poliza de garantia',
upper(c.ruta_acta) as 'Ruta de acta de entrega',
upper(c.acta_entrega) as 'Acta de entrega',
upper(c.ruta_solicitud) as 'Ruta de solicitud de subsidio',
upper(c.solicitud_subsidio) as 'Solicitud de subsidio',
upper(c.ruta_certificado) as 'Ruta de certificado de subsidio',
upper(c.certificado_subsidio) as 'Certificado de subsidio',
upper(c.ruta_fonden) as 'Ruta de folio fonden',
upper(c.folio_fonden) as 'Folio fonden',
upper(c.ruta_foto) as 'Ruta de foto con el beneficiario',
upper(c.foto_beneficiario) as 'Foto con el beneficiario',
upper(l.nombre_completo) as 'Beneficiario'
FROM ejecucion_checklist c INNER JOIN layout l on l.id_layout = c.id_layout WHERE c.id_layout =$id;";
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