<?php 

session_start();
session_destroy();

?>
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
	<script src="js/jquery-3.3.1.js"></script>
	<section>
		<nav>
			<div class="nav-wrapper verde">
				<img src="img/logo .png" id="logo" style="width: 105px; height: 75px; margin-left: 10%;" alt="Logo DP11">
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					  <li><a href="vistas/faq.php"><i class="material-icons">help_outline</i></a></li>
				</ul>
			</div>
		</nav>

	</section>
	<section>
		<div>
			<h3>Bienvenido a Desarrollo11</h3>

			<div class="row div-inicio">
				<div class="input-field col m6 offset-m3">
					<input id="usuario" type="email" class="validate" name="usuario" required>
					<label class='active' for="usuario">Usuario</label>
				</div>
				<div class="input-field col m6 offset-m3">
					<input id="contrasenia" type="password" class="validate" name="contrasenia" required>
					<label class='active' for="contrasenia">Contraseña</label>
				</div>
				<div class="col m2 offset-m8">
					<button class="btn waves-effect waves-light btn-floating btn-large waves-effect waves-light green accent-2" id="login" type="submit" name="action">
						<i class="material-icons right">done</i>
					</button>
				</div>
			</div>
		</div>
	</section>
	
	
	<script src="js/materialize.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		$(document).ready(function(){
			$('.fixed-action-btn').floatingActionButton();
		});

	</script>
	<script>
		$(document).ready(function() {
			$('#login').click(function() {
				var usuario = $('#usuario').val();
				var pass = $('#contrasenia').val();

				$.ajax({
					url: 'controladores/login_controller.php',
					type:'POST',
					data: {usuario: usuario, pass: pass},
					success: function(response) {
						// console.log(response);
						switch (response){
							case "0":
							swal({
								title: "Datos Erroneos",
								text: "Los datos no coinsiden con la base de datos",
								icon: "warning",
								button: true,
							})
							break;
							case "1":
							window.location = 'vistas/vista_general.php';
							break;
							case "2":
							swal({
								title: "Acceso denegado",
								text: "Ya no cuenta con acceso al sistema, contacte al administrador",
								icon: "error",
								button: true,
							})
							break;
							case "3":
							window.location = 'vistas/proyectos.php';
							break;
						}
					}
				})

				return false;
			})
		})
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

	<footer class="page-footer verde">
		<div class="footer-copyright">
			<div class="container">
				© 2018 Copyright 
			</div>
		</div>
	</footer>
</body>
</html>