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
	<!-- <section>
		<div class="row verde">
			<div class="col m12">
				<div class="col m4 offset-m1">
					<img src="../img/logo .png" id="logo" style="width: 220px; height: 170px;" alt="Logo DP11">
				</div>
				<div class="col m2 white-text">
					<?php
					session_start();?>
					<h5><?php echo $_SESSION['usuario']; ?></h5>
				</div>
				<div class="col m2 offset-m3 white-text">
					<a href="../index.php">Salir <i style="margin-top: 35px;" class="material-icons">logout</i></a>
				</div>
			</div>
		</div>
	</section> -->
	<section>
		<nav>
    <div class="nav-wrapper verde">
      <img src="../img/logo .png" id="logo" style="width: 110px; height: 80px;" alt="Logo DP11">
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        
        <li><h5><?php echo $_SESSION['usuario']; ?></h5></li>
        <li><a href="../index.php">Salir</a></li>
        <li><a></a></li>
        <li><a></a></li>
      </ul>
    </div>
  </nav>
        
	</section>