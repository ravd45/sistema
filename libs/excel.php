<?php
// $id = $_POST['folio'];
        /*Produccion
        $server = "localhost";
        $user = "id7019453_root";
        $pass = "desarrollo_1";
        $dbname = "id7019453_sistema";
        */

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

        $sql = "SELECT cuv FROM layout;";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            $filas[]= $row;
        }
        if(isset($_POST["export_data"])) {

            if(!empty($filas)) {

                $filename = "libros.xls";

                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=".$filename);
                header("Pragma: no-cache");
                header("Expires: 0");



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



            <table id="" class="table table-striped table-bordered">

                <tr>

                    <th>cuv</th>

                </tr>



                <tbody>

                    <?php foreach($filas as $fila) { ?>

                        <tr>

                            <td style="mso-number-format:'0.00'; font-weight: bold;"> &nbsp;<?php echo $fila ['cuv']; ?></td>


                     </tr>

                 <?php } ?>

             </tbody>

         </table>

     </div> 
