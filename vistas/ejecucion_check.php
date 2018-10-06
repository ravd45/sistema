<?php include '../libs/header.php';
include '../controladores/main_controller.php';
include '../controladores/ejecucion_controller.php'; 

?>

<h3>Lista de documentos para ejecución</h3>

		<div class='row z-depth-4'>
			<div class='col m10 offset-m1'>
				<div class='col m2 offset-m10'>	
								<form method='POST' action='../controladores/excel_controller.php'>
								    <input type='number' value='<?= $_GET['l'] ?>' style='display: none;' name='ejeCheck'>
								    <button class='btn-small btn waves-effect waves-light waves-effect waves-light green accent-4' type='submit' name='action'>
								    <i class='material-icons right'>print</i>Exportar
								    </button>
							    </form>
							</div>
				<?php $list = new EjecucionController();
				$list->ejecucionList($_GET['l']);
				$list->listaArchivos($_GET['l']);
				?>
				
				<div class="row">
					<div class="col m12">
						<div id="up"></div>
					</div>
				</div>
				<div class='row'>
					<div class='col m2'>
						<a class='btn-floating btn-large waves-effect waves-light default-primario-color' href='../vistas/proyectos.php'><i class='material-icons'>arrow_back</i></a>
					</div>
				</div>
			</div>
		</div>

		<script>
			function subir(a){
				var doc = a;
				var id = <?php echo $_GET['l']; ?>

				document.getElementById("up").innerHTML = '<br> <form action="../libs/subirEjecucion.php" method="POST" enctype="multipart/form-data"><table width="445" height="55" border="0" cellpadding="0" cellspacing="0"><tr><input name="archivo" type="file"  id="archivo" size="35" /><input name="alias" type="text" placeholder="Nombre del documento" value='+doc+' style="display: none"><input name="enviar" type="submit" class="btn-small grey"  id="enviar" value="subir" /><input name="action" style="display:none;" value="upload"/><input name="usuario" style="display:none;" value='+id+' /></td></tr></table></form>';
			}
		</script>
		<?php include '../libs/footer.php' ?>