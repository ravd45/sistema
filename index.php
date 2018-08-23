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
			<form id="FormInicio" method="POST" action="controladores/login_controller.php">
				<div class="row div-inicio">
					<div class="input-field col m6 offset-m3">
						<input id="usuario" type="text" class="validate" name="usuario" required>
						<label for="usuario">Usuario</label>
					</div>
					<div class="input-field col m6 offset-m3">
						<input id="contrasenia" type="password" class="validate" name="contrasenia" required>
						<label for="contrasenia">Contraseña</label>
					</div>
					 <div class="col m12 offset-m8">
                        <button class="btn waves-effect waves-light btn-floating btn-large waves-effect waves-light green accent-2" type="submit" name="action">
                            <i class="material-icons right">done</i>
                        </button>
                    </div>
				</div>
			</form>
		</div>
	</section>
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/script.js"></script>
	<script src="js/materialize.js"></script>
</body>
</html>