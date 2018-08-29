<?php include '../libs/header.php';
	  include '../controladores/checklist_controller.php';	?>
<h3>Lista de documentos</h3>

<?php 
$id = $_POST['id'];
$checklist = new ChecklistController();
$checklist->obtenerLista($id);

include '../libs/footer.php';	
?>
