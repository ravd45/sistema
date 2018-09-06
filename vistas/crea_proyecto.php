<?php include '../libs/header.php'; 
include '../controladores/main_controller.php';?>

<h3>Crear nuevo proyecto</h3>

<form action="../controladores/proyecto_controller.php" method="POST">
	<div class="row">
		<div class="col m10 offset-m1 div-inicio">
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">home</i>
				<input id="proyecto" name="proyecto" type="text" class="validate" required>
				<label>Proyecto</label>
			</div>
			<!-- estado de méxico -->
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">location_city</i>
				<select class="" name="estado">
					<option value="" disabled selected>Selecciona el estado</option>
					
				</select>
				<label>Estado</label>
			</div>
			<!-- municipio -->
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">location_city</i>
				<select class="" name="municipio">
					<option value="" disabled selected>Selecciona el Municipio</option>
					
				</select>
				<label>Municipio/Localidad</label>
			</div>
			<!-- modalidad -->
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">list</i>
				<select id="modalidad" name="modalidad" onchange="rangoIngreso()" required="true">
					<option value="" disabled selected>Selecciona la modalidad</option>
					<option value="AUTOPRODUCCION">Autoproducción</option>
					<option value="MEJORAMIENTO">Mejoramiento</option>
					<option value="AMPLIACION">Ampliación</option>
					<option value="FONDEN">Fonden</option>
				</select>
				<label>Modalidad</label>
			</div>
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">schedule</i>
				<input id="ejercicio" name="fecha" type="text" value="" class="validate" required readonly>
				<label>Ejercicio fiscal</label>
			</div>
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">schedule</i>
				<select id="oeo" name="oeo" onchange="rangoIngreso()" required="true">
					<option value="" disabled selected>Selecciona la OEO</option>
					<option value="ROCA A.C.">ROCA A.C.</option>
					<option value="DP11">DP11</option>
					
				</select>
				<label>OEO</label>
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
