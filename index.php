<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema</title>
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/estilo.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<section>
		<div>
			<h3>Bienvenido al sistema</h3>
			<form id="FormInicio">
				<div class="row div-inicio">
					<div class="input-field col m6 offset-m3">
						<input id="usuario" type="text" class="validate" required>
						<label for="usuario">Usuario</label>
					</div>
					<div class="input-field col m6 offset-m3">
						<input id="contrasenia" type="password" class="validate" required>
						<label for="contrasenia">Contraseña</label>
					</div>
					<div class="col m12 offset-m8">
						<a class="btn-floating btn-large waves-effect waves-light green accent-2" href="vistas/vista_general.php"><i class="material-icons">done</i></a>
					</div>
				</div>
			</form>
		</div>
	</section>
	<script src="js/script.js"></script>
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/materialize.js"></script>
</body>
</html>