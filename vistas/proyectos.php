<?php include '../libs/header.php';
      include '../controladores/main_controller.php';?>

<h3>Lista de Proyectos</h3>
<div class="row">
  <div class="col m10 offset-m1">
  <?php $main = new MainController();
  $main->listaProyectos();?>
</div>
</div>
<?php if ($_SESSION['rol'] != 'invitado') {
 ?>
  <div class="row">
    <div class="col m12">
      <div class="col m8 offset-m1">
          <a class="btn-floating btn-large waves-effect waves-light default-primario-color" href="vista_general.php"><i class="material-icons">arrow_back</i></a>
      </div>
    </div>
  </div>
 
<?php } ?>
  <div>
   
  </div>
  <script>
    function cancelacion() {
      var id = document.getElementById('btn-cancel').val;
      console.log(id);
    }
  </script>
  <script>

     $(function(){
      $('#FormBuscador').change(function(){
        var buscador = document.getElementById('buscador').val;
        console.log(buscador);
      })
     })
    
  </script>

<?php include '../libs/footer.php'; ?>
