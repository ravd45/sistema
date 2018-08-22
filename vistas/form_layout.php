<?php include '../libs/header.php'; ?>

<h3>LLenar formulario</h3>

<div class="row">
	<div class="col m12">
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="proyecto" type="text" class="validate" required>
		<label>Proyecto</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<select class="">
			<option value="" disabled selected>Selecciona el estatus</option>
			<option value="Apartado">Apartado</option>
			<option value="En ejecución">En ejecución</option>
		</select>
		<label>Estatus</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="fecha_apartado" type="text" class="validate" required>
		<label>Fecha de apartado</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="nombre" type="text" class="validate" required>
		<label>Nombre</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="apellido_p" type="text" class="validate" required>
		<label>Apellido paterno</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="apellido_m" type="text" class="validate" required>
		<label>Apellido materno</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="CURP" type="text" class="validate" required>
		<label>CURP</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<select class="">
			<option value="" disabled selected>Selecciona el genero</option>
			<option value="Femenino">Femenino</option>
			<option value="Masculino">Masculino</option>

		</select>
		<label>Genero</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<select class="">
			<option value="" disabled selected>Selecciona el estado civil</option>
			<option value="Soltero">Soltero</option>
			<option value="Casado">Casado</option>
			<option value="Unión libre">Unión libre</option>
			<option value="Separado">Separado</option>
			<option value="Divorciado">Divorciado</option>
			<option value="Viudo">Viudo</option>

		</select>
		<label>Estado civil</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="fecha_nacimiento" type="text" class="validate" required>
		<label>Fecha de nacimiento</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="rfc" type="text" class="validate" required>
		<label>RFC</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="ingreso" type="text" class="validate" required>
		<label>Ingreso</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="antiguedad" type="text" class="validate" required>
		<label>Antigüedad</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="ocupacion" type="text" class="validate" required>
		<label>Ocupación</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="telefono" type="text" class="validate" required>
		<label>Teléfono</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="solucion" type="text" class="validate" required>
		<label>Solución</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="subsidio" type="text" class="validate" required>
		<label>Subsidio</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="credito" type="text" class="validate" required>
		<label>Credito</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="enganche_efectivo" type="text" class="validate" required>
		<label>Enganche en efectivo</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<select multiple>
			<option value="" disabled selected>Selecciona el tipo de enganche</option>
			<option value="Mano de obra">Mano de obra</option>
			<option value="Material">Material</option>
			<option value="Efectivo">Efectivo</option>
		</select>
		<label>Enganche en especie</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="otros_apoyos" type="text" class="validate" required>
		<label>Otros apoyos</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<select class="">
			<option value="" disabled selected>Selecciona la modalidad</option>
			<option value="Autoproduccion">Autoproducción</option>
			<option value="Mejoramiento">Mejoramiento</option>
			<option value="Ampliacion">Ampliación</option>
		</select>
		<label>Modalidad</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="cuv" type="text" class="validate" required>
		<label>CUV</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="puntaje" type="text" class="validate" required>
		<label>Puntaje</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<select class="">
			<option value="" disabled selected>Selecciona el estado</option>
			<?php include 'estado.php'; ?>
		</select>
		<label>Estado</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<select class="">
			<option value="" disabled selected>Selecciona el Municipio</option>
			<?php include 'municipios.php'; ?>
		</select>
		<label>Municipio/Localidad</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="cp" type="text" class="validate" required>
		<label>Código Postal</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="colonia" type="text" class="validate" required>
		<label>Colonia</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="domicilio_beneficiario" type="text" class="validate" required>
		<label>Domicilio del beneficiario</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<select class="">
			<option value="" disabled selected>Selecciona el tipo de asentamiento</option>
			<option value="U1">U1</option>
			<option value="U2">U2</option>
			<option value="U3">U3</option>
		</select>
		<label>Tipo de asentamiento</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="latitud" type="text" class="validate" required>
		<label>Latitud</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="Longitud" type="text" class="validate" required>
		<label>Longitud</label>
	</div>
	<div class="input-field col m4">
		<i class="material-icons prefix">home</i>
		<input id="domicilio_terreno" type="text" class="validate" required>
		<label>Domicilio del terreno</label>
	</div>
	<div class="input-field col m5 offset-m7">
			<a class="btn-floating btn-large waves-effect waves-light green accent-2" type="submit" ><i class="material-icons">done</i></a>
	</div>
	</div>
</div>

<?php include '../libs/footer.php'; ?>