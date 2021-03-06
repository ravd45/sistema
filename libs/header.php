<?php
    /* Empezamos la sesión */
    session_start();
    /* Creamos la sesión */
    /* Si no hay una sesión creada, redireccionar al index. */
    if(!isset($_SESSION['usuario'])) { // Recuerda usar corchetes.
    echo "<script language='javascript'>window.location='../index.php';</script>";
    } // Recuerda usar corchetes
 
?>

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
        
        <li><h5><?php echo $_SESSION['usuario']; ?></h5></li>
        <li><a href="../vistas/faq.php"><i class="material-icons">help_outline</i></a></li>
        <li><a href="../index.php">Salir</a></li>
        <li><a></a></li>
        <li><a></a></li>
        
      </ul>
    </div>
  </nav>
        
	</section>