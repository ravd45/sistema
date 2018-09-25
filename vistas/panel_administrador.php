<?php include '../libs/header.php'; ?>
<h3>Panel de administrador</h3>
<ol>
	<li><a id="opcion1" >Lista de usuarios</a></li>
	<li><a id="opcion2" >Crear usuarios</a></li>
	<li><a id="opcion3" >Eliminar</a></li>
</ol>

<section id="usuario" class='hide'>
	<div class="row">
		<div class="col m8 offset-m2">
			<div class="card white darken-1">
				<div class="card-content black-text">
					<span class="card-title center">Crear usuarios</span>
					<div class="row">
						<div class="col m12">
							<div class="col m6 input-field">
								<i class="material-icons prefix">email</i>
								<input id="correo" type="email" class="validate" required>
								<label>Correo</label>
							</div>
							<div class="col m6 input-field">
								<i class="material-icons prefix">lock</i>
								<input id="pass" type="password" class="" required>
								<label>Contraseña</label>
							</div>
							<div class="col m6 input-field hide" id="confirmContra">
								<i class="material-icons prefix">lock</i>
								<input id="confirmpass" type="password" class="" required>
								<label>Confirma la contraseña</label>
							</div>
							<div class="col m6 input-field">
								<i class="material-icons prefix">account_circle</i>
								<input id="nombre" type="text" class="validate" required>
								<label>Nombre</label>
							</div>
							<div class="col m6 input-field">
								<i class="material-icons prefix">perm_identity</i>
								<select name="" id="rol" class="validate" required>
									<option id="rol" value="administrador">Administrador</option>
									<option id="rol" value="operador">Operador</option>
									<option id="rol" value="invitado">Invitado</option>
								</select>
								<label>Tipo</label>
							</div>
							<div class="col m6 input-field hide" id="ee">
								<i class="material-icons prefix">perm_identity</i>
								<select name="" id="financiera" class="validate" required>
									<option id="rol" class="enable" value="N/F">N/F</option>
									<option id="rol" value="ASP">ASP</option>
									<option id="rol" value="LI Financiera">LI Financiera</option>
									<option id="rol" value="Profinamex">Profinamex</option>
								</select>
								<label>Entidad Ejecutora</label>
							</div>
							<div class="col m6 ">
								<button id="crearBtn" class="btn-small">Crear</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>	

<section id="permisos" class='show'>
	<div class="row">
		<div class="col m8 offset-m2">
			<div class="card white darken-1">
				<div class="card-content black-text">
					<span class="card-title center" id="tituloLista">Lista de usuarios</span>
					<div class="center">
						<button id="activos" class="btn-small ">Activos</button>
						<button id="inactivos" class="btn-small red">inactivos</button>
					</div>
					<div class="row">
						<div class="col m12">
							<div class="col m10 offset-m1">	
								<table class="striped centered">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Correo</th>
											<th>Contraseña</th>
											<th>Rol</th>
										</tr>
									</thead>

									<tbody id="tabla">
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>	

<section id="eliminar" class='hide'>
	<div class="row">
		<div class="col m8 offset-m2">
			<div class="card white darken-1">
				<div class="card-content black-text">
					<span class="card-title center">Elimina Usuario</span>
					<div class="row">
						<div class="col m12">
							<form id="formEliminar">
								<div class="col m6 input-field">
									<i class="material-icons prefix">email</i>
									<input type="text" id="mail">
									<label for="">Correo</label>
								</div>
								<div class="col m6 input-field">
									<i class="material-icons prefix">lock</i>
									<input type="password" id="contrasenia">
									<label for="">Contraseña</label>
								</div>
								<div class="col m2 offset-m11">
									<button class="btn-small" id="eliminarBtn">Eliminar</button>
								</div>
							</form>
						</div>
					</div>
					<span class="red-text center">Una vez eliminado el usuario no se podrá recuperar.</span>
				</div>
			</div>
		</div>
	</div>
</section>	

<div id="panel"></div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$(document).ready(function() {
		$('#opcion1').click(function() {
			$('#usuario').removeClass('show');
			$('#usuario').addClass('hide');
			$('#eliminar').removeClass('show');
			$('#eliminar').addClass('hide');
			$('#permisos').removeClass('hide');
			$('#permisos').addClass('show');
		});

		$('#opcion2').click(function() {
			$('#permisos').removeClass('show');
			$('#permisos').addClass('hide');	
			$('#eliminar').removeClass('show');
			$('#eliminar').addClass('hide');	
			$('#usuario').removeClass('hide');
			$('#usuario').addClass('show');
		});

		$('#opcion3').click(function() {
			$('#usuario').removeClass('show');
			$('#usuario').addClass('hide');	
			$('#permisos').removeClass('show');
			$('#permisos').addClass('hide');	
			$('#eliminar').removeClass('hide');
			$('#eliminar').addClass('show');
		});

		$('#eliminarBtn').click(function() {
			var correo = $('#mail').val();
			var pass = $('#contrasenia').val();

			console.log("el correo es: " + correo + " La contraseña es: " + pass);
			$.ajax({
				url: '../controladores/panel_controller.php',
				type: 'POST',
				data: {correo: correo, contrasenia:pass, consulta:1},
				success: function(response) {
					console.log(response);
					if (response == 0) {
						swal({
							title: "Eliminando Usuario",
							text: "¿Seguro que desea eliminar al usuario?",
							icon: "error",
							buttons: true,
							dangerMode: true,
						})
						.then((willDelete) => {
							if (willDelete) {
								$.ajax({
									url: '../controladores/panel_controller.php',
									type: 'POST',
									data: {correo: correo, contrasenia:pass, elimina:1},
									success: function(response) {
										console.log(response);
										swal("D: Eliminaste al usuario", {
											icon: "success",
										});
										window.setTimeout(function(){ 
											location.reload();
										} ,1500)
									}
								});
								
							} else {
								swal("Uff, lo salvaste de un destino terrible :3");
							}
						});
					} else{
						swal({
							title: "Datos Erroneos",
							text: "Los datos no coinsiden con la base de datos",
							icon: "warning",
							button: true,
						})
					}	
				}
			})
			return false;
		});

		$('#activos').click(function() {
			var estado = 'activo';
			$.ajax({
				url: '../controladores/panel_controller.php',
				type: 'POST',
				data: {estado: estado},
				success: function(response) {
					$('#tabla').html(response);
					$('#tituloLista').html('Lista de usuarios (<b class="blue-text">Activos</b>)');

				}
			})
			return false;
		});		

		$('#inactivos').click(function() {
			var estado = 'inactivo';
			$.ajax({
				url: '../controladores/panel_controller.php',
				type: 'POST',
				data: {estado: estado},
				success: function(response) {
					$('#tabla').html(response);
					$('#tituloLista').html('Lista de usuarios (<b class="red-text">Inactivos</b>)');

				}
			})
			return false;
		});

		$('#pass').change(function() {
			$('#confirmContra').removeClass('hide');
			$('#confirmContra').addClass('show');

			var pass = $('#pass').val();
			var confirmacion = $('#confirmpass').val();

			if (pass != confirmacion) {
				$('#pass').removeClass('validate');
				$('#confirmpass').removeClass('validate');
				$('#pass').addClass('invalid');
				$('#confirmpass').addClass('invalid');
					swal("Las contraseñas no coinciden", {
						icon: "error",
					});				

			} else {
				$('#pass').removeClass('invalid');
				$('#confirmpass').removeClass('invalid');
				$('#pass').addClass('validate');
				$('#confirmpass').addClass('validate');
			}
		});

		$('#confirmpass').change(function() {
			var pass = $('#pass').val();
			var confirmacion = $('#confirmpass').val();

			if (pass != confirmacion) {
				$('#pass').removeClass('validate');
				$('#confirmpass').removeClass('validate');
				$('#pass').addClass('invalid');
				$('#confirmpass').addClass('invalid');
					swal("Las contraseñas no coinciden", {
						icon: "error",
					});

			}
			else {
				$('#pass').removeClass('invalid');
				$('#confirmpass').removeClass('invalid');
				$('#pass').addClass('validate');
				$('#confirmpass').addClass('validate');
			}
		});

		$('#correo').change(function() {
			var correo = $('#correo').val();
			
			$.ajax({
				url: '../controladores/panel_controller.php',
				type: 'POST',
				data: {correo : correo, ccorreo : 1},
				success: function(response) {
					if (response == 1) {
					swal("El correo ya está en uso", {
						icon: "error",
					});
					$('#correo').removeClass('validate');
					$('#correo').addClass('invalid');
					}else{
					$('#correo').removeClass('invalid');
					$('#correo').addClass('validate');
					}

				}
			})
		});

		$('#rol').change(function() {
			var rol = $('#rol').val();	
			if (rol == 'invitado') {
				$('#ee').removeClass('hide');
				$('#ee').addClass('show');
			}else{
				$('#ee').removeClass('show');
				$('#ee').addClass('hide');
			}
		});

		$('#crearBtn').click(function() {
			var nombre = $('#nombre').val();
			var correo = $('#correo').val();
			var pass = $('#pass').val();
			var rol = $('#rol').val();		
			var confirmacion = $('#confirmpass').val();
			var financiera = $('#financiera').val();
			
			console.log(nombre + " - " + correo + " - " + pass + " - " + rol + " - " + confirmacion + " - " + financiera);

			$.ajax({
				url: '../controladores/panel_controller.php',
				type: 'POST',
				data: {nombre : nombre, correo : correo, pass : pass, rol : rol, crear : 1, ee : financiera},
				success: function(response) {
					swal("Usuario creado correctamente", {
						icon: "success",
					});
					window.setTimeout(function(){ 
						location.reload();
					} ,1500);
				}
			})
			return false;
		});
	});
</script>
<?php include '../libs/footer.php'; ?>