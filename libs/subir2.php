<?php 

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

        $sql = "INSERT INTO documento (documento, id_layout, alias) VALUES ('".$destino."', $usuario, '".$alias."')";
        if (!$inserta = mysqli_query($conn, $sql)) {
            echo " no insertado";
        }else{
            echo "<script>alert('Archivo subido correctamente');window.location='../vistas/proyectos.php?i=1';</script>";
        }
    } 
    else 
    {
        $status = "Error al subir el archivo";
    }
} 
}  

?>