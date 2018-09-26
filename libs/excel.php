<?php
$id = $_POST['folio'];
/*Produccion*/
        $server = "localhost";
        $user = "id7019453_root";
        $pass = "desarrollo_1";
        $dbname = "id7019453_sistema";

        /*Desarrollo
        $server = "localhost";
        $user = "root";
        $pass = "desarrollo_1";
        $dbname = "sistema";*/


$conn = new mysqli($server, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT l.estatus as status, l.fecha_apartado as fecha_apartado, l.curp, l.nombre, l.apellido_paterno, l.apellido_materno, l.nombre_completo, l.genero, l.estado_civil, l.fecha_nacimiento, l.rfc, l.ingreso,
l.antiguedad, l.ocupacion, l.telefono, l.solucion, l.subsidio, l.credito, l.enganche_efectivo, l.enganche_especie, l.otros_apoyos, l.modalidad,
l.cuv, l.puntaje, e.estado, m.municipio, l.codigo_postal, l.localidad, l.colonia, l.domicilio_beneficiario, l.tipo_asentamiento, l.coordenadas, l.latitud, l.longitud, l.domicilio_terreno, l.pcu
FROM layout l
INNER JOIN municipio m on m.idmunicipio = l.id_municipio
INNER JOIN estado e on e.idestado = l.id_estado
INNER JOIN proyecto p on p.idproyecto = l.id_proyecto
WHERE l.id_proyecto = $id;";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    $filas[]= $row;
}
 if(isset($_POST["export_data"])) {

    if(!empty($filas)) {

        $filename = "libros.xls";

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

        echo 'No hay datos a exportar';

    }

    exit;

}
?>

<div class="container">

    <h2>Exportar datos a Excel con PHP y MySQL</h2>



    <div class="well-sm col-sm-12">

        <div class="btn-group pull-right">

            <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Exportar a Excel</button>

            </form>

        </div>

    </div>


<!--
    <table id="" class="table table-striped table-bordered">

        <tr>

            <th>id</th>

            <th>Municipio</th>
        </tr>



        <tbody>

            <?php foreach($filas as $fila) { ?>

                <tr>

                    <td><?php echo $fila ['idmunicipio']; ?></td>

                    <td><?php echo $fila ['municipio']; ?></td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</div> -->
