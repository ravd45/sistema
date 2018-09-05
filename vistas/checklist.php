<?php include '../libs/header.php';
	  include '../controladores/checklist_controller.php';	?>
<h3>Lista de documentos iniciales</h3>

<?php 
if (isset($_POST['id'])) {
$id = $_POST['id'];
}else{
  $id = $_GET['q'];
}
$checklist = new ChecklistController();
$checklist->obtenerLista($id);

include '../libs/footer.php';	
?>
