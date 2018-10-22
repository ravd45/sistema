<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema</title>
	<link rel="stylesheet" href="../css/materialize.css">
	<link rel="stylesheet" href="../css/estilo.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 	
	<link href="https://fonts.googleapis.com/css?family=Cairo|Cantarell|Hammersmith+One|Handlee|Indie+Flower|Kanit|Marck+Script|Satisfy|Ubuntu+Condensed|Varela+Round" rel="stylesheet"> 
</head>
<body>
	<script src="../js/jquery-3.3.1.js"></script>
	<script src="../js/materialize.js"></script>

	<section>
		<nav>
			<div class="nav-wrapper verde">
				<img src="../img/logo .png" id="logo" style="width: 105px; height: 75px; margin-left: 10%;" alt="Logo DP11">

				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<?php if (!isset( $_SESSION['usuario'])) { ?>

						<li><a href="../vistas/faq.php"><i class="material-icons">help_outline</i></a></li>
						<li><a href="../index.php">Iniciar sesión</a></li>
					<?php } else { ?>
						<li><h5><?php echo $_SESSION['usuario']; ?></h5></li>
						<li><a href="../vistas/faq.php"><i class="material-icons">help_outline</i></a></li>
						<li><a href="../index.php">Salir</a></li>
						<li><a></a></li>
						<li><a></a></li>
					<?php } ?>
				</ul>
			</div>
		</nav>

	</section>
	
	<h3>Preguntas Frecuentes</h3>
	<div class="row z-depth-4">
		<div class="col m10 offset-m1">
			<ol>
				<li>
					<b>¿Es necesario contar con un usuario y contraseña para acceder a la plataforma?</b>
					<blockquote>
						Sí, ya que no es posible entrar al sistema si usted no cuenta con un usuario y contraseña válidos.
					</blockquote>
				</li>

				<li>
					<b>¿Qué puedo hacer si mi usuario dice "Acceso denegado"?</b>
					<blockquote>
						Lo ideal es ponerse en contacto con el administrador para aclarar por qué su usuario no cuenta con permisos para accerder al sistema.
					</blockquote>
				</li>

				<li>
					<b>¿Cómo puedo cambiar mi contraseña?</b>
					<blockquote>
						Usted no tiene permitido cambiar la contraseña, si es necesario puede ponerse en contacto con el administrador de la plataforma y solicitar así el cambio de este dato.
					</blockquote>
				</li>
				
				<?php if (isset($_SESSION['usuario']) && $_SESSION['rol'] != 'invitado') {
					
					?>

					<li>
						<b>¿Cuál es el peso máximo pasra subir un documento?</b>
						<blockquote>
							El peso máximo por archivo es de 5MB, para evitar que se corte la conexión al tratar de cargar el archivo.
						</blockquote>
					</li>

					<li>	
						<b>¿Qué tipo de archivo se puede subir a la plataforma?</b>
						<blockquote>	
							Es posible cargar archivos de tipo: PDF, DOCX, JPEG, PNG.
						</blockquote>
					</li>

				<?php } ?>

				<li>
					<b>¿Puedo descargar archivos en otro formato a parte de excel?</b>
					<blockquote>
						Los "layouts" y los "checklist" unicamente se pueden descargar en formato .xls, en cambio es posible descargar la documentación del beneficiario en pdf, dependiendo de como se haya almacenado esa información.
					</blockquote>
				</li>
			</ol>
		</div>
	</div>

	<?php include '../libs/footer.php'; ?>
