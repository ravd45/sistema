<?php 
require_once '../modelo/checklist_model.php';
	/**
	 * 
	 */
	class ChecklistController
	{
		
		function obtenerLista($id)
		{
			
			$data = ['id'=>$id];
				

			$result = ChecklistModelo::obtenerLista($data);
			$nombre = ChecklistModelo::nombre($data);
			
			foreach ($nombre as $key => $value) {
				$usuario = $value['nombre_completo'];
			}
			
			echo "
			<div class='row z-depth-4'>
			<div class='col m10 offset-m1'>
			<h5>".$usuario."</h5>";
			echo "<div class='col m2 offset-m10'>	
								<form method='POST' action='../controladores/excel_controller.php'>
								    <input type='number' value='".$id."' style='display: none;' name='check'>
								    <button class='btn-small btn waves-effect waves-light waves-effect waves-light green accent-4' type='submit' name='action'>
								    <i class='material-icons right'>print</i>Exportar
								    </button>
							    </form>
							</div>";
			if ($_SESSION['rol'] != 'invitado') {	
			if (!isset($result[0])) {

			echo" <form action='../modelo/checklist_model.php' method='POST'>
				   <input name='vacio' value='t' style='display:none;'>
				   <input name='id' value='$id' style='display:none;'>";

			  echo "<p>
						<label>
							<input type='checkbox' name='ife' value='1'/>
							<span>Identificación Oficial Vigente (IFE/INE)</span>
						</label>
						<a class='btn-floating blue' onclick='subir(1)'><i class='material-icons'>attach_file</i></a>
					</p>
					<p>
						<label>
							<input type='checkbox' value='1' name='curp'/>
							<span>CURP (Clave Unica de Registro de Población)</span>
						</label>
						<a class='btn-floating blue' onclick='subir(2)'><i class='material-icons'>attach_file</i></a>
					</p>
					<p>
						<label>
							<input type='checkbox' value='1' name='domicilio'/>
							<span>Comprobante de Domicilio (No mayor a 2 meses)</span>
						</label>
						<a class='btn-floating blue' onclick='subir(3)'><i class='material-icons'>attach_file</i></a>
					</p>
					<p>
						<label>
							<input type='checkbox' value='1' name='acta'/>
							<span>Acta de nacimiento</span>
						</label>
						<a class='btn-floating blue' onclick='subir(4)'><i class='material-icons'>attach_file</i></a>
					</p>
					<p>
						<label>
							<input type='checkbox' value='1' name='terreno'/>
							<span>Comprobante de propiedad o posesión del terreno a nombre del beneficiario</span>
						</label>
						<a class='btn-floating blue' onclick='subir(5)'><i class='material-icons'>attach_file</i></a></li>
					</p>";
			}else{
					echo"
					<div class='row z-depth-4'>
			<div class='col m10 offset-m1'>
			
					<div class='col m2 offset-m10'>	
								<form method='POST' action='../controladores/excel_controller.php'>
								    <input type='number' value='".$id."' style='display: none;' name='check'>
								    <button class='btn-small btn waves-effect waves-light waves-effect waves-light green accent-4' type='submit' name='action'>
								    <i class='material-icons right'>print</i>Exportar
								    </button>
							    </form>
							</div>
					<form action='../modelo/checklist_model.php' method='POST'>
						 <input name='existe' value='t' style='display:none;'>
						 <input name='id' value='$id' style='display:none;'>";
				foreach ($result as $row => $value) {
					echo "<h5>".$value['nombre_completo']."</h5>";
					if (($value['ife'])>0) {
					 echo " <p>
								<label>
									<input type='checkbox' checked='checked' value='1' name='ife'/>
									<span>Identificación Oficial Vigente (IFE/INE)</span>
								</label>
								
							</p>";
					}else{
						echo "<p>
						<label>
						<input type='checkbox' name='ife' value='1'/>
						<span>Identificación Oficial Vigente (IFE/INE)</span>
						</label>
						<a class='btn-floating blue' onclick='subir(1)'><i class='material-icons'>attach_file</i></a>
						</p>";
					}

					if (($value['curp'])>0) {
						echo "<p>
						<label>
						<input type='checkbox' checked='checked'  value='1' name='curp'/>
						<span>CURP (Clave Unica de Registro de Población)</span>
						</label>
						
						</p>";
					}else{
						echo "<p>
						<label>
						<input type='checkbox' value='1' name='curp'/>
						<span>CURP (Clave Unica de Registro de Población)</span>
						</label>
						<a class='btn-floating blue' onclick='subir(2)'><i class='material-icons'>attach_file</i></a>
						</p>";
					}

					if (($value['comprobante_domicilio'])>0) {
						echo "<p>
						<label>
						<input type='checkbox' checked='checked'  value='1' name='domicilio'/>
						<span>Comprobante de Domicilio (No mayor a 2 meses)</span>
						</label>
						
						</p>";
					}else{
						echo "<p>
						<label>
						<input type='checkbox'  value='1' name='domicilio'/>
						<span>Comprobante de Domicilio (No mayor a 2 meses)</span>
						</label>
						<a class='btn-floating blue' onclick='subir(3)'><i class='material-icons'>attach_file</i></a>
						</p>";
					}

					if (($value['acta_nacimiento'])>0) {
						echo "<p>
						<label>
						<input type='checkbox' checked='checked'  value='1' name='acta'/>
						<span>Acta de nacimiento</span>
						</label>
						
						</p>";
					}else{
						echo "<p>
						<label>
						<input type='checkbox' value='1' name='acta'/>
						<span>Acta de nacimiento</span>
						</label>
						<a class='btn-floating blue' onclick='subir(4)'><i class='material-icons'>attach_file</i></a>
						</p>";
					}

					if (($value['posesion_terreno'])>0) {
						echo "<p>
						<label>
						<input type='checkbox' checked='checked' value='1'  name='terreno'/>
						<span>Comprobante de propiedad o posesión del terreno a nombre del beneficiario</span>
						</label>
						
						</p>";
					}else{
						echo "<p>
						<label>
						<input type='checkbox' value='1' name='terreno'/>
						<span>Comprobante de propiedad o posesión del terreno a nombre del beneficiario</span>
						</label>
						<a class='btn-floating blue' onclick='subir(5)'><i class='material-icons'>attach_file</i></a>
						</p>";
					}
				}
			}
		}
			$archivos = ChecklistModelo::obtenerDocumentos($data);

			foreach ($archivos as $key => $value) {
				
				if ($value['ife']==1) {
					echo'<li><a href="../libs/'.$value['ruta_ife'].'" target="_blank">IFE / INE</a></li>';
				}
				if ($value['curp']==1) {
					echo'<li><a href="../libs/'.$value['ruta_curp'].'" target="_blank">CURP</a></li>';
				}
				if ($value['comprobante_domicilio']==1) {
					echo'<li><a href="../libs/'.$value['ruta_comprobante'].'" target="_blank">Comprobante de domicilio</a></li>';
				}
				if ($value['posesion_terreno']==1) {
					echo'<li><a href="../libs/'.$value['ruta_posesion'].'" target="_blank">Comprobante de posesión de terreno</a></li>';
				}
				if ($value['acta_nacimiento']==1) {
					echo'<li><a href="../libs/'.$value['ruta_nacimiento'].'" target="_blank">Acta de nacimiento</a></li>';
				}
			}
			echo "		<div class='row'>
							<div class='col m2'>
								<a class='btn-floating btn-large waves-effect waves-light default-primario-color' href='../vistas/proyectos.php'><i class='material-icons'>arrow_back</i></a>
							</div>	
						</div>
					</form>
						
							<input name='numero' value='17' style='display:none'/>
							<a class='btn blue' type='submit' name='action' onclick = 'subir(65)' style='display:none'>Subir Expediente<i class='material-icons'>attach_file</i></a>
								<div class='row'>
								<div class='col m8'>
									<div id='up'>
									</div>
								</div>
								</div>";
						
						echo '<script>
								function subir(a){
									
									document.getElementById("up").innerHTML = \' <br> <form action="../libs/subir2.php" method="post" enctype="multipart/form-data"><table width="445" height="55" border="0" cellpadding="0" cellspacing="0"><tr><input name="archivo" type="file"  id="archivo" size="35" /><input name="alias" type="text" placeholder="Nombre del documento" value=\'+a+\' style="display: none"><input name="enviar" type="submit" class="btn-small grey"  id="enviar" value="subir" /><input name="action" style="display:none;" value="upload" /><input name="usuario" style="display:none;" value="'.$id.'" /> </td></tr></table></form> \';
								}
							</script>';
						
		
				echo"	</div>
					</div>";
		}
	}

?>