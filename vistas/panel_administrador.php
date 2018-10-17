<?php include '../libs/header.php';
include '../controladores/panel_controller.php'; ?>
<h3>Panel de administrador</h3>

<section id="opciones" class="show">
	<div class="row">
		<div class="col m8 offset-m3">
			<a class='btn-small light-green darken-3' id="opcion1" >Lista de usuarios</a>
			<a class='btn-small light-green darken-3' id="opcion2" >Crear usuarios</a>
			<a class='btn-small light-green darken-3' id="opcion3" >Eliminar</a>
			<a class='btn-small light-green darken-3' id="opcion4" >Beneficiarios Cancelados</a>
			<a class='btn-small light-green darken-3' id="opcion5" >Beneficiarios Sustituidos</a>
		</div>
	</div>
</section>

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

<section id="cancelados" class='hide'>
	<div class="row">
		<div class="col m8 offset-m2">
			<div class="card white darken-1">
				<div class="card-content black-text">
					<span class="card-title center" id="tituloCancel">Lista de beneficiarios cancelados</span>
					<div class="center">
						<button id="canceladosbtn" class="btn-small red">Cancelados</button>
						<button id="reactivadosbtn" class="btn-small ">Reactivados</button>
					</div>
					<div class="row">
						<div class="col m12">
							<div class="col m10 offset-m1">	
								<table class="striped centered">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Motivo</th>
											<th>Fecha</th>
											<th>Usuario</th>
											<th></th>
										</tr>
									</thead>

									<tbody id="tablaCancel">
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

<section id="sustituidos" class='hide'>
	<div class="row">
		<div class="col m8 offset-m2">
			<div class="card white darken-1">
				<div class="card-content black-text">
					<span class="card-title center" id="tituloCancel">Lista de beneficiarios sustituidos</span>
					<div class="row">
						<div class="col m12">
							<div class="col m10 offset-m1">	
								<table class="striped centered">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Motivo</th>
											<th>Fecha</th>
											<th>Sustituto</th>
											<th>Usuario</th>
										</tr>
									</thead>

									<tbody id="tablaCancel">
										<?php $panel = new PanelController();
										$panel->listaSustituidos(); ?>
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

<section id="regresar" class="show">
	<div class="row">
		<div class="col m12">
			<div class="col m8 offset-m1">
				<a class="btn-floating btn-large waves-effect waves-light default-primario-color" href="vista_general.php"><i class="material-icons">arrow_back</i></a>
			</div>
		</div>
	</div>
</section>

<div id="panel"></div>
<script src="../js/sweetalert.min.js"></script>

<script src="../js/panel.js"></script>
<?php include '../libs/footer.php'; ?>