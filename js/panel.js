
	$(document).ready(function() {
		$('#opcion1').click(function() {
			$('#usuario').removeClass('show');
			$('#usuario').addClass('hide');
			$('#eliminar').removeClass('show');
			$('#eliminar').addClass('hide');
			$('#cancelados').removeClass('show');
			$('#cancelados').addClass('hide');
			$('#sustituidos').removeClass('show');
			$('#sustituidos').addClass('hide');
			$('#permisos').removeClass('hide');
			$('#permisos').addClass('show');
			$('#opcion1').removeClass('light-green darken-3');
			$('#opcion1').addClass('orange darken-4');
			$('#opcion2').removeClass('orange darken-4');
			$('#opcion2').addClass('light-green darken-3');
			$('#opcion3').removeClass('orange darken-4');
			$('#opcion3').addClass('light-green darken-3');
			$('#opcion4').removeClass('orange darken-4');
			$('#opcion4').addClass('light-green darken-3');
			$('#opcion5').removeClass('orange darken-4');
			$('#opcion5').addClass('light-green darken-3');
		});

		$('#opcion2').click(function() {
			$('#permisos').removeClass('show');
			$('#permisos').addClass('hide');	
			$('#eliminar').removeClass('show');
			$('#eliminar').addClass('hide');
			$('#cancelados').removeClass('show');
			$('#cancelados').addClass('hide');
			$('#sustituidos').removeClass('show');
			$('#sustituidos').addClass('hide');
			$('#usuario').removeClass('hide');
			$('#usuario').addClass('show');
			$('#opcion1').removeClass('orange darken-4');
			$('#opcion1').addClass('light-green darken-3');
			$('#opcion2').removeClass('light-green darken-3');
			$('#opcion2').addClass('orange darken-4');
			$('#opcion3').removeClass('orange darken-4');
			$('#opcion3').addClass('light-green darken-3');
			$('#opcion4').removeClass('orange darken-4');
			$('#opcion4').addClass('light-green darken-3');
			$('#opcion5').removeClass('orange darken-4');
			$('#opcion5').addClass('light-green darken-3');
		});

		$('#opcion3').click(function() {
			$('#usuario').removeClass('show');
			$('#usuario').addClass('hide');	
			$('#permisos').removeClass('show');
			$('#permisos').addClass('hide');	
			$('#cancelados').removeClass('show');
			$('#cancelados').addClass('hide');
			$('#sustituidos').removeClass('show');
			$('#sustituidos').addClass('hide');
			$('#eliminar').removeClass('hide');
			$('#eliminar').addClass('show');
			$('#opcion1').removeClass('orange darken-4');
			$('#opcion1').addClass('light-green darken-3');
			$('#opcion2').removeClass('orange darken-4');
			$('#opcion2').addClass('light-green darken-3');
			$('#opcion3').removeClass('light-green darken-3');
			$('#opcion3').addClass('orange darken-4');
			$('#opcion4').removeClass('orange darken-4');
			$('#opcion4').addClass('light-green darken-3');
			$('#opcion5').removeClass('orange darken-4');
			$('#opcion5').addClass('light-green darken-3');
		});

		$('#opcion4').click(function() {
			$('#usuario').removeClass('show');
			$('#usuario').addClass('hide');	
			$('#permisos').removeClass('show');
			$('#permisos').addClass('hide');	
			$('#eliminar').removeClass('show');
			$('#eliminar').addClass('hide');
			$('#sustituidos').removeClass('show');
			$('#sustituidos').addClass('hide');
			$('#cancelados').removeClass('hide');
			$('#cancelados').addClass('show');
			$('#opcion1').removeClass('orange darken-4');
			$('#opcion1').addClass('light-green darken-3');
			$('#opcion2').removeClass('orange darken-4');
			$('#opcion2').addClass('light-green darken-3');
			$('#opcion3').removeClass('orange darken-4');
			$('#opcion3').addClass('light-green darken-3');
			$('#opcion4').removeClass('light-green darken-3');
			$('#opcion4').addClass('orange darken-4');
			$('#opcion5').removeClass('orange darken-4');
			$('#opcion5').addClass('light-green darken-3');
		});

		$('#opcion5').click(function() {
			$('#usuario').removeClass('show');
			$('#usuario').addClass('hide');	
			$('#permisos').removeClass('show');
			$('#permisos').addClass('hide');	
			$('#eliminar').removeClass('show');
			$('#eliminar').addClass('hide');
			$('#cancelados').removeClass('show');
			$('#cancelados').addClass('hide');
			$('#sustituidos').removeClass('hide');
			$('#sustituidos').addClass('show');
			$('#opcion1').removeClass('orange darken-4');
			$('#opcion1').addClass('light-green darken-3');
			$('#opcion2').removeClass('orange darken-4');
			$('#opcion2').addClass('light-green darken-3');
			$('#opcion3').removeClass('orange darken-4');
			$('#opcion3').addClass('light-green darken-3');
			$('#opcion4').removeClass('orange darken-4');
			$('#opcion4').addClass('light-green darken-3');
			$('#opcion5').removeClass('light-green darken-3');
			$('#opcion5').addClass('orange darken-4');
		});

		$('#eliminarBtn').click(function() {
			var correo = $('#mail').val();
			var pass = $('#contrasenia').val();

			// console.log("el correo es: " + correo + " La contraseña es: " + pass);
			$.ajax({
				url: '../controladores/panel_controller.php',
				type: 'POST',
				data: {correo: correo, contrasenia:pass, consulta:1},
				success: function(response) {
					// console.log(response);
					if (response == 0) {
						swal({
							title: "Eliminando Usuario",
							text: "¿Seguro que desea eliminar al usuario?",
							icon: "error",
							buttons: ['No', 'Aceptar'],
							dangerMode: true,
						})
						.then((willDelete) => {
							if (willDelete) {
								$.ajax({
									url: '../controladores/panel_controller.php',
									type: 'POST',
									data: {correo: correo, contrasenia:pass, elimina:1},
									success: function(response) {
										// console.log(response);
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
			$('#activos').addClass('orange darken-4');
			$('#inactivos').removeClass('orange darken-4');
			$('#inactivos').addClass('red');
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
			$('#activos').removeClass('orange darken-4');
			$('#inactivos').removeClass('red');
			$('#inactivos').addClass('orange darken-4');
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
			
			// console.log(nombre + " - " + correo + " - " + pass + " - " + rol + " - " + confirmacion + " - " + financiera);

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

		$('.activar').click(function() {
			var id = $(this).val();
			// console.log(id);

			$.ajax({
				url: '../controladores/panel_controller.php',
				type: 'POST',
				data: {id:id, reactivar : 0},
				success: function(response) {
					if (response == 1) {
						window.setTimeout(function(){ 
							location.reload();
						} ,1500);
					}
				}
			});
			return false;
		});

		$('#canceladosbtn').click(function() {
			$('#canceladosbtn').removeClass('red');
			$('#canceladosbtn').addClass('orange darken-4');
			$('#reactivadosbtn').removeClass('orange darken-4');

			$.ajax({
				url: '../controladores/panel_controller.php',
				type: 'POST',
				data: {cancelados: 0},
				success: function(response) {
					$('#tituloCancel').html('Lista de beneficiarios <b class="red-text">cancelados</b>')
					$('#tablaCancel').html(response);
				}
			});
			return false;
		});

		$('#reactivadosbtn').click(function() {
			$('#canceladosbtn').addClass('red');
			$('#canceladosbtn').removeClass('orange darken-4');
			$('#reactivadosbtn').addClass('orange darken-4');

			$.ajax({
				url: '../controladores/panel_controller.php',
				type: 'POST',
				data: {cancelados: 1},
				success: function(response) {
					$('#tituloCancel').html('Lista de beneficiarios <b class="blue-text">reactivados</b>')
					$('#tablaCancel').html(response);
				}
			});
			return false;
		});
	});
