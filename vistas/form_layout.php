<?php include '../libs/header.php';
include '../controladores/main_controller.php';
?>

<h3>Llenar formulario</h3>
<form action="../controladores/layout_controller.php" method="POST">
	<div class="row">
		<div class="col m12">
			<!-- proyecto -->
			<div class="input-field col m6">
				<i class="material-icons prefix">build</i>
				<select name="proyecto" onchange="alerta()" required="true">
					<option value="" disabled selected>Selecciona el proyecto</option>
					<?php
					if (isset($_GET['w'])) {
						$proyecto = $_GET['w'];
					}
					$main = new MainController();
					$main->obtenerProyectos($proyecto);
					?>
				</select>
				<label>Proyecto</label>
			</div>
			<!-- modalidad -->
			<div class="input-field col m6">
				<i class="material-icons prefix">list</i>
				<select class="" name="modalidad" required="true">
					<option value="" disabled selected>Selecciona la modalidad</option>
					<option value="Autoproduccion">Autoproducción</option>
					<option value="Mejoramiento">Mejoramiento</option>
					<option value="Ampliacion">Ampliación</option>
				</select>
				<label>Modalidad</label>
			</div>
			<!-- nombre -->
			<div class="input-field col m4">
				<i class="material-icons prefix">account_circle</i>
				<input id="nombre" name="nombre" type="text" class="validate" required>
				<label>Nombre</label>
			</div>
			<!-- apellido paterno -->
			<div class="input-field col m4">
				<i class="material-icons prefix">account_circle</i>
				<input id="apellido_p" name="apellido_p" type="text" class="validate" required>
				<label>Apellido paterno</label>
			</div>
			<!-- apellido materno -->
			<div class="input-field col m4">
				<i class="material-icons prefix">account_circle</i>
				<input id="apellido_m" name="apellido_m" type="text" class="validate" required>
				<label>Apellido materno</label>
			</div>
			<!-- curp -->
			<div class="input-field col m4">
				<i class="material-icons prefix">recent_actors</i>
				<input id="CURP" name="curp" maxlength="18" minlength="18" type="text" class="curp validate" required>
				<label>CURP</label>
			</div>
			<!-- genero -->
			<div class="input-field col m4">
				<i class="material-icons prefix">account_circle</i>
				<select class="" name="genero">
					<option value="" disabled selected>Selecciona el genero</option>
					<option value="Femenino">Femenino</option>
					<option value="Masculino">Masculino</option>

				</select>
				<label>Genero</label>
			</div>
			<!-- estado civil -->
			<div class="input-field col m4">
				<i class="material-icons prefix">favorite</i>
				<select class="" name="estado_civil">
					<option value="" disabled selected>Selecciona el estado civil</option>
					<option value="Soltero">Soltero</option>
					<option value="Casado">Casado</option>
					<option value="Union libre">Unión libre</option>
					<option value="Separado">Separado</option>
					<option value="Divorciado">Divorciado</option>
					<option value="Viudo">Viudo</option>

				</select>
				<label>Estado civil</label>
			</div>
			<!-- fecha de nacimiento -->
			<div class="input-field col m4">
				<i class="material-icons prefix">cake</i>
				<input name="fecha_nacimiento" type="text" id="datep" class="validate datepicker">
				<label>Fecha de nacimiento</label>
			</div>
			<!-- ingreso -->
			<div class="input-field col m4">
				<i class="material-icons prefix">attach_money</i>
				<input name="ingreso" type="number" class="validate" required>
				<label>Ingreso</label>
			</div>
			<!-- antiguedad -->
			<div class="input-field col m4">
				<i class="material-icons prefix">hourglass_full</i>
				<input name="antiguedad" type="number" class="validate">
				<label>Antigüedad</label>
			</div>
			<!-- ocupación -->
			<div class="input-field col m4">
				<i class="material-icons prefix">work</i>
				<input name="ocupacion" type="text" class="validate" >
				<label>Ocupación</label>
			</div>
			<!-- teléfono -->
			<div class="input-field col m4">
				<i class="material-icons prefix">phone</i>
				<input name="telefono" maxlength="10" type="text" class="validate" >
				<label>Teléfono</label>
			</div>
			<!-- solución -->
			<div class="input-field col m4">
				<i class="material-icons prefix">attach_money</i>
				<input name="solucion" type="text" class="validate" required>
				<label>Solución</label>
			</div>
			<!-- subsidio -->
			<div class="input-field col m4">
				<i class="material-icons prefix">attach_money</i>
				<input name="subsidio" type="text" class="validate" required>
				<label>Subsidio</label>
			</div>
			<!-- credito -->
			<div class="input-field col m4">
				<i class="material-icons prefix">attach_money</i>
				<input name="credito" type="text" class="validate" required>
				<label>Credito</label>
			</div>
			<!-- enganche en efectivo -->
			<div class="input-field col m4">
				<i class="material-icons prefix">attach_money</i>
				<input name="enganche_efectivo" type="text" class="validate" >
				<label>Enganche en efectivo</label>
			</div>
			<!-- enganche en especie -->
			<div class="input-field col m4">
				<i class="material-icons prefix">list</i>
				<select multiple name="enganche_especie[]">
					<option value="" disabled>Selecciona el tipo de enganche</option>
					<option value="Mano de obra">Mano de obra</option>
					<option value="Material">Material</option>
					<option value="Efectivo">Efectivo</option>
					<option value="Pendiente">Pendiente</option>
				</select>
				<label>Enganche en especie</label>
			</div>
			<!-- otros apoyos -->
			<div class="input-field col m4">
				<i class="material-icons prefix">attach_money</i>
				<input name="otros_apoyos" type="text" class="validate" >
				<label>Otros apoyos en efectivo</label>
			</div>
			<!-- CUV -->
			<div class="input-field col m4">
				<i class="material-icons prefix">assignment_turned_in</i>
				<input name="cuv" type="number" class="validate" >
				<label>CUV</label>
			</div>
			<!-- puntaje -->
			<div class="input-field col m4">
				<i class="material-icons prefix">exposure_plus</i>
				<input name="puntaje" type="number" class="validate" >
				<label>Puntaje</label>
			</div>
			<!-- estado de méxico -->
			<div class="input-field col m4">
				<i class="material-icons prefix">location_city</i>
				<select class="" name="estado">
					<option value="" disabled selected>Selecciona el estado</option>
					<?php $main->catalogoEstado(); ?>
				</select>
				<label>Estado</label>
			</div>
			<!-- municipio -->
			<div class="input-field col m4">
				<i class="material-icons prefix">location_city</i>
				<select class="" name="municipio">
					<option value="" disabled selected>Selecciona el Municipio</option>
					<?php $main->catalogoMunicipio(); ?>
				</select>
				<label>Municipio/Localidad</label>
			</div>
			<!-- código postal -->
			<div class="input-field col m4">
				<i class="material-icons prefix">local_post_office</i>
				<input name="cp" type="text" maxlength="5" minlength="5" class="validate" required>
				<label>Código Postal</label>
			</div>
			<!-- tipo de asentamiento -->
			<div class="input-field col m4">
				<i class="material-icons prefix">domain</i>
				<select class="" name="tipo_asentamiento"></a>>
					<option value="" disabled selected>Selecciona el tipo de asentamiento</option>
					<option value="Pueblo">Pueblo</option>
					<option value="colonia">Colonia</option>
				</select>
				<label>Tipo de asentamiento</label>
			</div>
			<!-- colonia -->
			<div class="input-field col m4">
				<i class="material-icons prefix">location_city</i>
				<input name="colonia" type="text" class="validate" required>
				<label>Colonia</label>
			</div>
			<!-- domicilio del beneficiario -->
			<div class="input-field col m4">
				<i class="material-icons prefix">place</i>
				<input name="domicilio_beneficiario" type="text" class="validate">
				<label>Domicilio del beneficiario</label>
			</div>
			<!-- zona -->
			<div class="input-field col m4">
				<i class="material-icons prefix">domain</i>
				<select class="" name="zona" required="true"></a>
					<option value="" disabled selected>Selecciona la zona</option>
					<option value="Rural">Rural</option>
					<option value="Urbana">Urbano</option>
				</select>
				<label>Zona</label>
			</div>
			<!-- latitud -->
			<div class="input-field col m4">
				<i class="material-icons prefix">map</i>
				<input name="latitud" type="text" maxlength="10" minlength="10" class="validate" required>
				<label>Latitud</label>
			</div>
			<!-- longitud -->
			<div class="input-field col m4">
				<i class="material-icons prefix">map</i>
				<input name="longitud" type="text" maxlength="10" minlength="10" class="validate" required>
				<label>Longitud</label>
			</div>
			<!-- domicilio del terreno -->
			<div class="input-field col m4">
				<i class="material-icons prefix">place</i>
				<input name="domicilio_terreno" type="text" class="validate" required>
				<label>Domicilio del terreno</label>
			</div>
			<!-- PCU -->
			<div class="input-field col m4">
				<i class="material-icons prefix">list</i>
				<select class="" name="pcu" required="true">
					<option value="" disabled selected>Selecciona el Perimetro de Contención Urbana</option>
					<option value="U1">U1</option>
					<option value="U2">U2</option>
					<option value="U3">U3</option>
				</select>
				<label>PCU</label>
			</div>
			<div class="row">
				<div class="col m12">
					<div class="col m8 offset-m1">
						<a class="btn-floating btn-large waves-effect waves-light default-primario-color" href="proyectos.php"><i class="material-icons">arrow_back</i></a>
					</div>
					<div class="col m2 offset-m1">
						<button class="btn waves-effect waves-light btn-floating btn-large waves-effect waves-light green accent-2" type="submit" name="action">
							<i class="material-icons right">done</i>
						</div>
					</button>
				</div>
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
