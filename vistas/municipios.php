<?php 

include '../libs/conectardb.php';

$sql = "SELECT * FROM municipio";
$result = $conn->query($sql);

while ($row=$result->fetch_assoc()){
	$municipio = $row['municipio'];
	$id = $row['idmunicipio'];

	  echo '<option value="'.$id.'">'.$municipio.'</option>';
     

}
 ?>