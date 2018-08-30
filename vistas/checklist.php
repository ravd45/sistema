<?php include '../libs/header.php';
	  include '../controladores/checklist_controller.php';	?>
<h3>Lista de documentos</h3>

<?php 
$id = $_POST['id'];
$checklist = new ChecklistController();
$checklist->obtenerLista($id);
?>

	<div id="subir" class="modal">
    <div class="modal-content">
      <h4>Modal Header <?php $_POST['numero'] ?></h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

<?php
include '../libs/footer.php';	
?>
