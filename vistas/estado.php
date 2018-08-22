<?php 

include '../libs/conectardb.php';

$sql = "SELECT * FROM estado";
$result = $conn->query($sql);

while ($row=$result->fetch_assoc()){
	$estado = $row['estado'];
	$id = $row['idestado'];

	  echo '<option value="'.$id.'">'.$estado.'</option>';
     

}
 ?>