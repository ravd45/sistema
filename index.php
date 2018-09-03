<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Sistema</title>
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/estilo.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cairo|Cantarell|Hammersmith+One|Handlee|Indie+Flower|Kanit|Marck+Script|Satisfy|Ubuntu+Condensed|Varela+Round" rel="stylesheet"> 
</head>
<body>
	<section>
		<img src="../sistema/img/logo .png" style="width: 220px; height: 170px;" id="logo" alt="Logo DP11">
	</section>
	<section>
		<div>
			<h3>Bienvenido a Desarrollo11</h3>
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
					<div class="col m2 offset-m8">
						<button class="btn waves-effect waves-light btn-floating btn-large waves-effect waves-light green accent-2" type="submit" name="action">
							<i class="material-icons right">done</i>
						</button>
					</div>
				</div>
			</form>
		</div>
		<div id="error">
			
		</div>
	</section>
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/script.js"></script>
	<script src="js/materialize.js"></script>
	<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>

	<script>
		$(document).ready(function(){
			$('.fixed-action-btn').floatingActionButton();
		});

	</script>

	<script type="text/javascript">
		window.onload=function(){
			<?php
			$i=$_GET['i'];
			if(isset($i)){
				if($i==1){
					echo"M.toast({html:'Bienvenido', classes: 'rounded'});";
				}
				if($i==0){
					echo"M.toast({html:'Datos erroenos', classes: 'rounded red'});";
				}if($e==5){
					echo"Materialize.toast('Archivo cargado correctamente', 3000, 'rounded purple');";
				}
			}
			?>
		}
	</script>
	


	</body>
	</html>