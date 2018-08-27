<?php 

include 'conexionCat.php';

$sql = "SELECT p.*, m.municipio FROM proyecto p
INNER JOIN municipio m on m.idmunicipio = p.localidad;
";
$result = $conn->query($sql);

while ($row=$result->fetch_assoc()){
	$proyecto = $row['proyecto'];
	$id = $row['idproyecto'];
	$municipio

		// echo $proyecto;
	  echo '<option value="'.$id.'">'.$proyecto." ".$.'</option>';

}
 ?>