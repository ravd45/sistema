<?php include '../libs/header.php';
include '../controladores/main_controller.php';
?>
<script type="text/javascript">
	function rangoIngreso() {
		$(document).ready(function(){
			$('#rango').append("El rango en esta modalidad es de $6,900 a $11,000.");
			$('#subsidio').append('<i class="material-icons prefix">attach_money</i><input name="subsidio" id="subsidio" type="number" step=".01" class="validate" required value="71056.96" readonly><label class="active">Subsidio*</label>');
		});
	}
	function subsidio() {
		$(document).ready(function() {
			$('#subsidio').append('<i class="material-icons prefix">attach_money</i><input name="subsidio" id="subsidio" type="number" step=".01" class="validate" required value="29402.88" readonly><label class="active">Subsidio*</label>');
		});
	}	
</script>
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
				<?php $main->modalidadProyecto($_GET['w']); ?>
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
			<!-- ingreso -->
			<div class="input-field col m4">
				<i class="material-icons prefix">attach_money</i>
				<input name="ingreso" type="number" class="validate" required>
				<label>Ingreso</label>
				<div class="red-text" id="rango" >
				</div>
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
				<input name="telefono" maxlength="10" minlength="7" type="text" class="validate" >
				<label>Teléfono</label>
			</div>
			<!-- solución -->
			<div class="input-field col m4" style="display:none">
				<i class="material-icons prefix">attach_money</i>
				<input name="solucion" type="text" class="validate">
				<?php $main->solucionProyecto($_GET['w']); ?>
				<label>Solución</label>
			</div>
			<!-- subsidio -->
			<div class="input-field col m4" id="subsidio">
			</div>
			<!-- credito -->
			<div class="input-field col m4">
				<i class="material-icons prefix">attach_money</i>
				<?php $main->creditoProyecto($_GET['w']); ?>
				<label>Credito</label>
			</div>
			<!-- enganche en efectivo -->
			<div class="input-field col m4">
				<i class="material-icons prefix">attach_money</i>
				<input name="enganche_efectivo" type="number" step=".01" class="validate" >
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
				<input name="otros_apoyos" type="number" step=".01" class="validate" >
				<label>Otros apoyos en efectivo</label>
			</div>
			<!-- CUV -->
			<div class="input-field col m4">
				<i class="material-icons prefix">assignment_turned_in</i>
				<input name="cuv" maxlength="16" minlength="16" type="text" class="validate" >
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
					<?php $main->estadoProyecto($_GET['w']); ?>
					<label>Estado</label>
				</div>
				<!-- municipio -->
				<div class="input-field col m4">
					<i class="material-icons prefix">location_city</i>
					<?php $main->municipioProyecto($_GET['w']); ?>
					<label>Municipio</label>
				</div>
				<!-- localidad -->
				<div class="input-field col m4">
					<i class="material-icons prefix">location_city</i>
					<input type="text" id="localidad" name="localidad" list="loc">
						<datalist id="loc">
					<?php $main->obtenerLocalidad($_GET['w']); ?>
					</datalist>
					<label>Localidad</label>
				</div>
				<!-- código postal -->
				<div class="input-field col m4">
					<i class="material-icons prefix">local_post_office</i>
						<input type="text" id="codPost" name="codigo_postal" list="cp">
						<datalist id="cp">
							<?php $main->obtenerCP($proyecto); ?>
							<option value="S/N">Sin Código postal</option>
						</datalist>
					<label>Código Postal</label>
				</div>
				<!-- colonia -->
				<div class="input-field col m4" id="coloniaF">		
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
					<input name="longitud" type="text" maxlength="11" minlength="11" class="validate" required>
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
					<select name="pcu" required="true">
						<option value="" disabled selected>Selecciona el Perimetro de Contención Urbana</option>
						<option value="U1">U1</option>
						<option value="U2">U2</option>
						<option value="U3">U3</option>
						<option value="S/P">Sin perimetro</option>
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
		$(function() {
			$('#codPost').change(function() {
				var cp = $('#codPost').val();
				$.ajax({
					url: "../controladores/main_controller.php",
					type: "POST",
					data: {cp: cp},
					success: function(response) {
						$('#coloniaF').html(response);
										}
				});
				return false;
			});
		});
	</script>
	<script>
		function alerta() {
			alert("¿Estás seguro que deseas cambiar de proyecto?");

		}
	</script>
	<?php include '../libs/footer.php'; ?>
