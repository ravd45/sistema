<?php include '../libs/header.php'; ?>

<h3>Crear nuevo proyecto</h3>

<form action="">
	<div class="row">
		<div class="col m10 offset-m1 div-inicio">
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">home</i>
				<input id="proyecto" type="text" class="validate" required>
				<label>Proyecto</label>
			</div>
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">place</i>
				<select class="">
					<option value="" disabled selected>Selecciona el Municipio</option>
					<?php include 'municipios.php'; ?>
				</select>
				<label>Localidad</label>
			</div>
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">directions_walk</i>
				<input type="number" required>
				<label> Número de beneficiados</label>
			</div>
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">schedule</i>
				<input id="proyecto" type="text" <?php include '../libs/fecha.php'; ?> readonly = "true" class="validate" required>
				<label>Fecha de creación</label>
			</div>
			<div class="col m12 offset-m12" style="margin-top:3%;">
					<a class="btn-floating btn-large waves-effect waves-light green accent-2" type="submit" ><i class="material-icons">edit</i></a>
			</div>
		</div>
	</div>
</form>


<a href="vista_general.php"><i class="material-icons">keyboard_backspace</i>volver</a>
<?php include '../libs/footer.php' ?>
