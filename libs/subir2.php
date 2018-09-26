<?php 

// $status = "";
// if ($_POST["action"] == "upload") 
// {
//     // obtenemos los datos del archivo 
//     $tamano = $_FILES["archivo"]['size'];
//     $tipo = $_FILES["archivo"]['type'];
//     $archivo = $_FILES["archivo"]['name'];
//     $usuario = $_POST['usuario'];
//     $alias = $_POST['alias'];

//     switch ($alias) {
//         case 1:
//             $nombre = "IFE / INE";
//             break;
//          case 2:
//             $nombre = "CURP";
//             break;
//          case 3:
//             $nombre = "Comprobande de domicilio";
//             break;
//          case 4:
//             $nombre = "Acta de nacimiento";
//             break;
//          case 5:
//             $nombre = "Comprobante de posesión";
//             break;

//         default:
//             $nombre = "Otro documento";
//             break;
//     }

//     if ($archivo != "") 
//     {
//         // guardamos el archivo a la carpeta ficheros
//         $destino =  "archivos/files/".$archivo;
//         if (copy($_FILES['archivo']['tmp_name'],$destino)) 
//         {
//           $server = "localhost";
//           $user = "root";
//           $pass = "desarrollo_1";
//           $dbname = "sistema";

//           $conn = new mysqli($server, $user, $pass, $dbname);
//           if ($conn->connect_error) {
//             die("Connection failed: " . $conn->connect_error);
//         } 

//         $sql = "INSERT INTO documento (documento, id_layout, alias) VALUES ('".$destino."', $usuario, '".$nombre."')";
//         if (!$inserta = mysqli_query($conn, $sql)) {
//             echo " no insertado";
//         }else{
//             echo "<script>alert('Archivo subido correctamente');window.location='../vistas/checklist.php?q=$usuario';</script>";
//         }
//     } 
//     else 
//     {
//         $status = "Error al subir el archivo";
//     }
// } 
// }  

$status = "";
if ($_POST["action"] == "upload") 
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
        $destino =  "archivos/files/".$archivo;
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

        $select = "SELECT idcheck FROM checklist WHERE id_layout = $usuario";
        $result = mysqli_query($conn, $select);

        while ($row = $result->fetch_assoc()) {
          $id = $row['idcheck'];
      }

      if ($id == NULL) {
          switch ($alias) {
              case 1:
              $sql = "INSERT INTO checklist (ife, ruta_ife, id_layout) VALUES (1, '$destino', '$usuario')";
              break;
              case 2:
              $sql = "INSERT INTO checklist (curp, ruta_curp, id_layout) VALUES (1, '$destino', '$usuario')";
              break;
              case 3:
              $sql = "INSERT INTO checklist (comprobante_domicilio, ruta_comprobante, id_layout) VALUES (1, '$destino', '$usuario')";
              break;
              case 5:
              $sql = "INSERT INTO checklist (posesion_terreno, ruta_posesion, id_layout) VALUES (1, '$destino', '$usuario')";
              break;
              case 4:
              $sql = "INSERT INTO checklist (acta_nacimiento, ruta_nacimiento, id_layout) VALUES (1, '$destino', '$usuario')";
              break;

              default:
              $nombre = "Otro documento";
              break;
          }
      } else {
        switch ($alias) {
            case 1:
            $sql = "UPDATE checklist SET ife = 1, ruta_ife = '$destino' WHERE id_layout = '$usuario'";
            break;

            case 2:
            $sql = "UPDATE checklist SET curp = 1, ruta_curp = '$destino' WHERE id_layout = '$usuario'";    
            break;

            case 3:
            $sql = "UPDATE checklist SET comprobante_domicilio = 1, ruta_comprobante = '$destino' WHERE id_layout = '$usuario'";    
            break;

            case 5:
            $sql = "UPDATE checklist SET posesion_terreno = 1, ruta_posesion = '$destino' WHERE id_layout = '$usuario'";    
            break;

            case 4:
            $sql = "UPDATE checklist SET acta_nacimiento = 1, ruta_nacimiento = '$destino' WHERE id_layout = '$usuario'";    
            break;

            default:
            $nombre = "Otro documento";
            break;
        }
    }

    if (!$inserta = mysqli_query($conn, $sql)) {
        echo "Error al insertar";
    }else{
        echo "<script>alert('Archivo subido correctamente');window.location='../vistas/checklist.php?q=$usuario';</script>";
    }
}
} 
else 
{
    $status = "Error al subir el archivo";
}
} 
 
?>