<?php 

$status = "";
if ($_POST['action'] == "upload") 
{
    // obtenemos los datos del archivo 
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];
    $usuario = $_POST['usuario'];
    $alias = $_POST['alias'];
    
    if ($archivo != "") 
    {
        // guardamos el archivo a la carpeta ficheros
        $destino =  "http://localhost/sistema/sistema/libs/archivos/files/".$archivo;
        if (copy($_FILES['archivo']['tmp_name'],$destino)) 
        {
          $server = "localhost";
          $user = "root";
          $pass = "desarrollo_1";
          $dbname = "sistema";

          $conn = new mysqli($server, $user, $pass, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $select = "SELECT idejecucion_checklist FROM ejecucion_checklist WHERE id_layout = $usuario";
        $result = mysqli_query($conn, $select);
    
            while ($row = $result->fetch_assoc()) {
                $id = $row['idejecucion_checklist'];
    
            }
       
        if ($id == NULL) {
           switch ($alias) {
            case 1:
            $sql = "INSERT INTO ejecucion_checklist (licencia_construccion, ruta_licencia, id_layout) VALUES (1, '$destino', '$usuario')";
            break;
            case 2:
            $sql = "INSERT INTO ejecucion_checklist (expediente_financiera, ruta_financiera, id_layout) VALUES (1, '$destino', '$usuario')";
            break;
            case 3:
            $sql = "INSERT INTO ejecucion_checklist (contrato_oeo, ruta_oeo, id_layout) VALUES (1, '$destino', '$usuario')";
            break;
            case 4:
            $sql = "INSERT INTO ejecucion_checklist (anexo_tecnico, ruta_anexo, id_layout) VALUES (1, '$destino', '$usuario')";
            break;
            case 5:
            $sql = "INSERT INTO ejecucion_checklist (poliza_garantia, ruta_poliza, id_layout) VALUES (1, '$destino', '$usuario')";
            break;
            case 6:
            $sql = "INSERT INTO ejecucion_checklist (solicitud_subsidio, ruta_solicitud, id_layout) VALUES (1, '$destino', '$usuario')";
            break;
            case 7:
            $sql = "INSERT INTO ejecucion_checklist (certificado_subsidio, ruta_certificado, id_layout) VALUES (1, '$destino', '$usuario')";
            break;
            case 8:
            $sql = "INSERT INTO ejecucion_checklist (folio_fonden, ruta_fonden, id_layout) VALUES (1, '$destino', '$usuario')";
            break;
            case 9:
            $sql = "INSERT INTO ejecucion_checklist (foto_beneficiario, ruta_foto, id_layout) VALUES (1, '$destino', '$usuario')";
            break;
            case 10:
            $sql = "INSERT INTO ejecucion_checklist (acta_entrega, ruta_acta, id_layout) VALUES (1, '$destino', '$usuario')";
            break;
            default:
            $nombre = "Otro documento";
            break;
            }
        }else{
             // var_dump($id); die();
            switch ($alias) {
            case 1:
            $sql = "UPDATE ejecucion_checklist SET ruta_licencia = '$destino', licencia_construccion = 1 WHERE id_layout = '$usuario'";
            break;
            case 2:
            $sql = "UPDATE ejecucion_checklist SET ruta_financiera = '$destino', expediente_financiera = 1 WHERE id_layout = '$usuario'";
            break;
            case 3:
            $sql = "UPDATE ejecucion_checklist SET ruta_oeo = '$destino', contrato_oeo = 1 WHERE id_layout = '$usuario'";
            break;
            case 4:
            $sql = "UPDATE ejecucion_checklist SET ruta_anexo = '$destino', anexo_tecnico = 1 WHERE id_layout = '$usuario'";
            break;
            case 5:
            $sql = "UPDATE ejecucion_checklist SET ruta_poliza = '$destino', poliza_garantia = 1 WHERE id_layout = '$usuario'";
            break;
            case 6:
            $sql = "UPDATE ejecucion_checklist SET ruta_solicitud = '$destino', solicitud_subsidio = 1 WHERE id_layout = '$usuario'";
            break;
            case 7:
            $sql = "UPDATE ejecucion_checklist SET ruta_certificado = '$destino', certificado_subsidio = 1 WHERE id_layout = '$usuario'";
            break;
            case 8:
            $sql = "UPDATE ejecucion_checklist SET ruta_fonden = '$destino', folio_fonden = 1 WHERE id_layout = '$usuario'";
            break;
            case 9:
            $sql = "UPDATE ejecucion_checklist SET ruta_foto = '$destino', foto_beneficiario = 1 WHERE id_layout = '$usuario'";
            break;
            case 10:
            $sql = "UPDATE ejecucion_checklist SET ruta_acta = '$destino', acta_entrega = 1 WHERE id_layout = '$usuario'";
            break;
            default:
            $nombre = "Otro documento";
            break;

        }

    }
// var_dump($sql); die();

    if (!$inserta = mysqli_query($conn, $sql)) {
        echo " no insertado";
    }else{
        echo "<script>alert('Archivo subido correctamente');window.location='../vistas/ejecucion_check.php?l=$usuario';</script>";
    }
} 
else 
{
    $status = "Error al subir el archivo";
}
} 
}  

?>