<?php include '../libs/header.php';
	  include '../controladores/main_controller.php';
	  include '../controladores/ejecucion_controller.php'; ?>

<h3>En ejecución</h3>
<h5><?php echo $_POST['nombre']; ?></h5>

<div class="row z-depth-4">
	<form action="../controladores/layout_controller.php" method="POST">
		<br>
		<input type="number" name='ejecuta' value='<?php echo $_POST['ejecuta'] ?>' style='display: none;'>
		<input type="number" name='layout' value='<?php echo $_POST['layout'] ?>' style='display: none;'>
		<div class="col m10 offset-m1">
			
			<?php 
				$campos = new EjecucionController();
				$campos->obtenerCP($_POST['layout']);
			 ?>
		 <!-- </div> -->
		<div class="row">
			<div class="col m12">
			<div class='col m2'>
                        <a class='btn-floating btn-large waves-effect waves-light default-primario-color' href='proyectos.php'><i class='material-icons'>arrow_back</i></a>
                		</div>
			<div class="col m2 offset-m8">
				 <button class='btn-small btn waves-effect waves-light  waves-effect waves-light teal darken-4' type='submit' name='action'>Ejecución 
                      <i class='material-icons'>done</i>
                    </button>
			</div>
                		
			<div class="col m10">
				<br><br>
			</div>
		</div>
		</div>
	</div>
	</form>
</div>

<?php include '../libs/footer.php' ?>