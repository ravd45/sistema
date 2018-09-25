<?php include '../libs/header.php' ?>
<h3>Vista General</h3>
<div class="row">
	<div class="col m12">
		<div class="col m3 offset-m2">
			<h6 class="dark-pimario-color">Crear nuevo Proyecto</h6>
			<br>
			<a href="crea_proyecto.php"><img class="img-menu" src="../img/nuevo_proyecto.png" title="Crear proyecto" alt="crear proyecto"></a>
		</div>
		<?php 
			if ($_SESSION['rol']=='administrador') { ?>
			<div class="col m3">
			<h6 class="dark-pimario-color">Panel de administración</h6>
			<br>
			<a href="panel_administrador.php"><img class="img-menu" width="290px" height="130px" src="../img/panel.png" title="Panel de administración" alt="Panel de administración"></a>
		</div>
		<?php	}
		 ?>
		<div class="col m3">
			<h6 class="dark-pimario-color"> Lista de Proyectos</h6>
			<br>
			<a href="proyectos.php"><img class="img-menu" src="../img/lista_proyecto.png" title="Lista de proyectos" alt="lista de proyectos"></a>
		</div>
	</div>
</div>
<!-- <ol>
	<li><a href="checklist.php">CheckList</a></li>
	<li><a href="crea_proyecto.php">Crea nuevo Proyecto</a></li>
	<li><a href="form_layout.php">Llenar layout</a></li>
	<li><a href="lista_proyectos.php"></a>Lista de proyectos</li>
</ol> -->

<?php include '../libs/footer.php'; ?>
