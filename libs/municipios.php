<?php 

include 'conexionCat.php';

$sql = "SELECT * FROM municipio";
$result = $conn->query($sql);

while ($row=$result->fetch_assoc()){
	$municipio = $row['municipio'];
	$id = $row['idmunicipio'];

	  echo '<option id="opcion" value="'.$id.'">'.$municipio.'</option>';
     

}
 ?>