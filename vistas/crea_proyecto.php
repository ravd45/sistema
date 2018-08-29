<?php include '../libs/header.php'; ?>

<h3>Crear nuevo proyecto</h3>

<form action="../controladores/proyecto_controller.php" method="POST">
	<div class="row">
		<div class="col m10 offset-m1 div-inicio">
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
			<div class="input-field col m6 offset-m4">
				<i class="material-icons prefix">schedule</i>
				<input id="proyecto" name="fecha" type="text" value="<?php include '../libs/fecha.php'; ?>" class="validate" required readonly>
				<label>Fecha de creación</label>
			</div>
			<div class="row">
      	<div class="col m12">
      		<div class="col m8 offset-m1">
              <a class="btn-floating btn-large waves-effect waves-light default-primario-color" href="vista_general.php"><i class="material-icons">arrow_back</i></a>
      		</div>
      		<div class="col m2 offset-m1">
            <button class="btn waves-effect waves-light btn-floating btn-large waves-effect waves-light green accent-2" type="submit" name="action">
              <i class="material-icons right">edit</i>
      		</div>
        </button>
      	</div>
      </div>
		</div>
	</div>
</form>
<?php include '../libs/footer.php' ?>
