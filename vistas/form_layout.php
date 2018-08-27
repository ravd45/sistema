<?php include '../libs/header.php'; ?>

<h3>LLenar formulario</h3>
<form action="../controladores/layout_controller.php" method="POST">
	<div class="row">
		<div class="col m12">
			<!-- proyecto -->
			<div class="input-field col m12"> 
				<i class="material-icons prefix">build</i>
				<select name="proyecto" onchange="alerta()">
					<option value="" disabled selected>Selecciona el proyecto</option>
					<?php include '../libs/proyecto.php'; ?>
				</select>
				<label>Proyecto</label>
			</div>
			<!-- fecha de apartado 
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input id="fecha_apartado" name="fecha_apartado" type="text" class="validate datepicker" required>
				<label>Fecha de apartado</label>
			</div>-->
			<!-- nombre -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input id="nombre" name="nombre" type="text" class="validate" required>
				<label>Nombre</label>
			</div>
			<!-- apellido paterno -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input id="apellido_p" name="apellido_p" type="text" class="validate" required>
				<label>Apellido paterno</label>
			</div>
			<!-- apellido materno -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input id="apellido_m" name="apellido_m" type="text" class="validate" required>
				<label>Apellido materno</label>
			</div>
			<!-- curp -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input id="CURP" name="curp" type="text" class="validate" required>
				<label>CURP</label>
			</div>
			<!-- genero -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<select class="" name="genero" required>
					<option value="" disabled selected>Selecciona el genero</option>
					<option value="Femenino">Femenino</option>
					<option value="Masculino">Masculino</option>

				</select>
				<label>Genero</label>
			</div>
			<!-- estado civil -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<select class="" name="estado_civil" required>
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
			<!-- fecha de nacimiento -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="fecha_nacimiento" type="text" class="validate datepicker">
				<label>Fecha de nacimiento</label>
			</div>
			<!-- ingreso -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="ingreso" type="text" class="validate" required>
				<label>Ingreso</label>
			</div>
			<!-- antiguedad -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="antiguedad" type="text" class="validate">
				<label>Antigüedad</label>
			</div>
			<!-- ocupación -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="ocupacion" type="text" class="validate" required>
				<label>Ocupación</label>
			</div>
			<!-- teléfono -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="telefono" type="text" class="validate" required>
				<label>Teléfono</label>
			</div>
			<!-- solución -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="solucion" type="text" class="validate" required>
				<label>Solución</label>
			</div>
			<!-- subsidio -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="subsidio" type="text" class="validate" required>
				<label>Subsidio</label>
			</div>
			<!-- credito -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="credito" type="text" class="validate" required>
				<label>Credito</label>
			</div>
			<!-- enganche en efectivo -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="enganche_efectivo" type="text" class="validate" required>
				<label>Enganche en efectivo</label>
			</div>
			<!-- enganche en especie -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<select multiple name="enganche_especie">
					<option value="" disabled selected>Selecciona el tipo de enganche</option>
					<option value="Mano de obra">Mano de obra</option>
					<option value="Material">Material</option>
					<option value="Efectivo">Efectivo</option>
					<option value="Pendiente">Pendiente</option>
				</select>
				<label>Enganche en especie</label>
			</div>
			<!-- otros apoyos -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="otros_apoyos" type="text" class="validate" required>
				<label>Otros apoyos</label>
			</div>
			<!-- modalidad -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<select class="" name="modalidad">
					<option value="" disabled selected>Selecciona la modalidad</option>
					<option value="Autoproduccion">Autoproducción</option>
					<option value="Mejoramiento">Mejoramiento</option>
					<option value="Ampliacion">Ampliación</option>
				</select>
				<label>Modalidad</label>
			</div>
			<!-- CUV -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="cuv" type="text" class="validate" required>
				<label>CUV</label>
			</div>
			<!-- puntaje -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="puntaje" type="text" class="validate" required>
				<label>Puntaje</label>
			</div>
			<!-- estado de méxico -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<select class="" name="estado">
					<option value="" disabled selected>Selecciona el estado</option>
					<?php include '../libs/estado.php'; ?>
				</select>
				<label>Estado</label>
			</div>
			<!-- municipio -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<select class="" name="municipio">
					<option value="" disabled selected>Selecciona el Municipio</option>
					<?php include '../libs/municipios.php'; ?>
				</select>
				<label>Municipio/Localidad</label>
			</div>
			<!-- código postal -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="cp" type="text" class="validate" required>
				<label>Código Postal</label>
			</div>
			<!-- colonia -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="colonia" type="text" class="validate" required>
				<label>Colonia</label>
			</div>
			<!-- domicilio del beneficiario -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="domicilio_beneficiario" type="text" class="validate">
				<label>Domicilio del beneficiario</label>
			</div>
			<!-- tipo_asentamiento -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<select class="" name="tipo_asentamiento"></a>>
					<option value="" disabled selected>Selecciona el tipo de asentamiento</option>
					<option value="U1">U1</option>
					<option value="U2">U2</option>
					<option value="U3">U3</option>
				</select>
				<label>Tipo de asentamiento</label>
			</div>
			<!-- latitud -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="latitud" type="text" class="validate" required>
				<label>Latitud</label>
			</div>
			<!-- longitud -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="Longitud" type="text" class="validate" required>
				<label>Longitud</label>
			</div>
			<!-- domicilio del terreno -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="domicilio_terreno" type="text" class="validate" required>
				<label>Domicilio del terreno</label>
			</div>
			<!-- PCU -->
			<div class="input-field col m4">
				<i class="material-icons prefix">home</i>
				<input name="pcu" type="text" class="validate" required>
				<label>PCU</label>
			</div>
			<div class="input-field col m5 offset-m7">
				<button class="btn waves-effect waves-light btn-floating btn-large waves-effect waves-light green accent-2" type="submit" name="action">
					<i class="material-icons right">done</i>
				</button>
			</div>
		</div>
	</div>
</form>
<script>
	function alerta() {
		alert("¿Estás seguro que deseas cambiar de proyecto?");
	}
</script>
<?php include '../libs/footer.php'; ?>