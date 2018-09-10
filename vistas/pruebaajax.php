<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>prueba Ajax</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>


	
	<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
	<div id="modal1" class="modal">
		<div class="modal-content">
			<h4>Modal Header</h4>
			<form id="formPrueba">
				<label for="default">codigos</label>
				<input type="text" id="nombre" name='cp' list="languages" placeholder="">

				<datalist id="languages" name='cp'>
					<option value="91715">
						<option value="92856">
							<option value="72120">
								<option value="74558">
								</datalist>


							</form>
							<div id="result">
								<p>Aquí hay algo</p>

							</div>
						</div>
						<div class="modal-footer">
							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
						</div>
					</div>	



					<script src="../js/jquery-3.3.1.js"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
					<script>
						$(function (){
							$('#nombre').change(function () {	

								$.ajax({
									url: "otraprueba.php",
									type: "POST",
									data: $('#formPrueba').serialize(),
									success: function(response){
										$('#result').html(response);
									}
								});
								return false;
							});
						});

					</script>
					<script>
						$(document).ready(function(){
							$('.modal').modal();
						});
					</script>

				</body>
				</html>