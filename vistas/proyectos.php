<?php include '../libs/header.php';
      include '../controladores/main_controller.php';?>

<h3>Lista de Proyectos</h3>
<div class="row">
  <div class="col m10 offset-m1">
  <?php $main = new MainController();
  $main->listaProyectos();?>
</div>
</div>

  <div id="cancelacion" class="modal">
    <div class="modal-content">
      <h4>Cancelación</h4>
      <div class="row">
   <form class="col s12">
     <div class="row">
       <div class="input-field col s12">
         <textarea id="textarea1" class="materialize-textarea"></textarea>
         <label for="textarea1">Motivo de cancelación</label>
       </div>
     </div>
   </form>
 </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
    </div>
  </div>

  <div class="row">
    <div class="col m12">
      <div class="col m8 offset-m1">
          <a class="btn-floating btn-large waves-effect waves-light default-primario-color" href="vista_general.php"><i class="material-icons">arrow_back</i></a>
      </div>
    </div>
  </div>
<?php include '../libs/footer.php'; ?>
