<?php include '../libs/header.php'; 
include '../controladores/main_controller.php';
$main = new MainController();
?>

<h3>Crear nuevo proyecto</h3>

<form action="../controladores/proyecto_controller.php" method="POST">
	<div class="row">
		<div class="col m10 offset-m1 div-inicio">
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">home</i>
				<input id="proyecto" name="proyecto" type="text" class="validate" required>
				<label>Proyecto</label>
			</div>
			<!-- modalidad -->
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">list</i>
				<select id="modalidad" name="modalidad" onchange="rangoIngreso()" required="true">
					<option value="" disabled selected>Selecciona la modalidad</option>
					<option value="AUTOPRODUCCION">Autoproducción</option>
					<option value="MEJORAMIENTO">Mejoramiento</option>
					<option value="AMPLIACION">Ampliación</option>
					<option value="RECONSTRUCCION">Reconstrucción</option>
				</select>
				<label>Modalidad</label>
			</div>
			<!-- estado de méxico -->
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">location_city</i>
				<!-- <select class="" name="estado">
					<option value="" disabled selected>Selecciona el estado</option> -->
					<?php $main->catalogoEstado(); ?>
				<!-- </select> -->
				<label>Estado</label>
			</div>
			<!-- municipio -->
			<div class="input-field col m5 offset-m1" id="mun">
				
				
				
			</div>
			
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">calendar_today</i>
				<input id="ejercicio" name="ejercicio" type="text" value="" class="validate" required>
				<label>Ejercicio fiscal</label>
			</div>
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">build</i>
				<select id="oeo" name="oeo" onchange="rangoIngreso()" required="true">
					<option value="" disabled selected>Selecciona la OEO</option>
					<option value="ROCA A.C.">ROCA A.C.</option>
					<option value="DP11">DP11</option>
					
				</select>
				<label>OEO</label>
			</div>
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">attach_money</i>
				<input id="credito" name="credito" type="text" value="" class="validate" required>
				<label>Credito</label>
			</div>
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">attach_money</i>
				<input id="solucion" name="solucion" type="text" value="" class="validate" required>
				<label>Solucion</label>
			</div>
			<div class="input-field col m5 offset-m1">
				<i class="material-icons prefix">description</i>
				<select id="modalidad" name="programa" required="true">
					<option value="" disabled selected>Selecciona el programa</option>
					<option value="CONAVI">CONAVI</option>
					<option value="FONDEN">FONDEN</option>

				</select>
				<label>Programa</label>
			</div>
			<div class="input-field col m5 offset-m1">
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
<script>
	$(function () {
		$('#estado').change(function() {
			estado = $('#estado').val();
			$.ajax({
				url: "../controladores/main_controller.php",
				type: "POST",
				data: {estado:estado},
				success: function(response) {
					$('#mun').html(response);
				}
			});
			return false;
		});
	});
</script>
<?php include '../libs/footer.php' ?>
