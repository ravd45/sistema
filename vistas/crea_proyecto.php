<?php include '../libs/header.php'; ?>

<h3>Crear nuevo proyecto</h3>

<form action="../controladores/proyecto_controller.php" method="POST">
	<div class="row">
		<div class="col m10 offset-m1 div-inicio">
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">home</i>
				<input id="proyecto" name="proyecto" type="text" class="validate" required>
				<label>Proyecto</label>
			</div>
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">place</i>
				<select name="municipio" required>
					<option value="" disabled selected>Selecciona el Municipio</option>
					<?php include '../libs/municipios.php'; ?>
				</select>
				<label>Localidad</label>
			</div>
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">directions_walk</i>
				<input type="number" name="beneficiarios" required>
				<label> Número de beneficiados</label>
			</div>
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">schedule</i>
				<input id="proyecto" name="fecha" type="text" <?php include '../libs/fecha.php'; ?> readonly = "true" class="validate" required>
				<label>Fecha de creación</label>
			</div>
			<div class="col m12 offset-m12" style="margin-top:3%;">
					  <button class="btn waves-effect waves-light btn-floating btn-large waves-effect waves-light green accent-2" type="submit" name="action">
                            <i class="material-icons right">edit</i>
                        </button>
			</div>
		</div>
	</div>
</form>


<a href="vista_general.php"><i class="material-icons">keyboard_backspace</i>volver</a>
<?php include '../libs/footer.php' ?>
