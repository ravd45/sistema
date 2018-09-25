<?php 
include '../modelo/layout_model.php';
include '../modelo/checklist_model.php';

	/**
	 * 
	 */
	class EjecucionController
	{
		
		function obtenerCP($id)
		{
			$data = ['id'=>$id];

			$response = LayoutModelo::obtenerCP($data);
			foreach ($response as $key => $value) {
				if (($value['cuv']) != "") {
					echo '		<!-- CUV -->
					<div class="input-field col m6">
					<i class="material-icons prefix">assignment_turned_in</i>
					<input name="cuv" type="number" value="'.$value['cuv'].'" class="validate" readonly>
					<label>CUV</label>
					</div>';
				}else{
					echo '		<!-- CUV -->
					<div class="input-field col m6">
					<i class="material-icons prefix">assignment_turned_in</i>
					<input name="cuv" type="number" maxlength="16" minlength="16" class="validate" >
					<label>CUV</label>
					</div>';
				}

				if (($value['puntaje']) != "") {
					echo'
					<!-- puntaje -->
					<div class="input-field col m6">
					<i class="material-icons prefix">exposure_plus</i>
					<input name="puntaje" type="text" value="'.$value['puntaje'].'" class="validate" readonly>
					<label>Puntaje</label>
					</div>';
				}else{
					echo '
					<!-- puntaje -->
					<div class="input-field col m6">
					<i class="material-icons prefix">exposure_plus</i>
					<input name="puntaje" type="text" class="validate" >
					<label>Puntaje</label>
					</div>';
				}

			}
		}

		function ejecucionList($id)
		{
			if ($_SESSION['rol'] != 'invitado') {
				

			$data= ['id'=>$id];
			$nombre = ChecklistModelo::nombre($data);
			
			foreach ($nombre as $key => $value) {
				echo"<h5>".$value['nombre_completo']."</h5>";
			}
			$response = LayoutModelo::ejecucionList($data);

			if (!isset($response[0])) {
				echo"<!-- Licencia de construción -->
					<p>
					<label>
					<input type='checkbox' />
					<span>Licencia de construccion</span>
					</label>
					<a class='btn-floating blue' onclick='subir(1)'><i class='material-icons'>attach_file</i></a>
					</p>";
					echo "
					<!-- contrato financiera -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Contrato de la financiera</span>
					</label>
					<a class='btn-floating blue' onclick='subir(2)'><i class='material-icons'>attach_file</i></a>
					</p>";
					echo "
					<!-- Contrato OEO -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Contrato OEO</span>
					</label>
					</p>";
					echo"<!-- Anexo Técnico -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Anexo Técnico</span>
					</label>
					<a class='btn-floating blue' onclick='subir(4)'><i class='material-icons'>attach_file</i></a>
					</p>";
					echo "<!-- Póliza de garantía -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Póliza de garantía</span>
					</label>
					<a class='btn-floating blue' onclick='subir(5)'><i class='material-icons'>attach_file</i></a>
					</p>";
					echo"<!-- Solicitud de Subsidio -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Solicitud de Subsidio</span>
					</label>
					<a class='btn-floating blue' onclick='subir(6)'><i class='material-icons'>attach_file</i></a>
					</p>";
					echo"<!-- Folio Fonden -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Folio Fonden</span>
					</label>
					<a class='btn-floating blue' onclick='subir(8)'><i class='material-icons'>attach_file</i></a>
					</p>";
					echo"<!-- Foto del Beneficiario con certificado -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Foto del Beneficiario con certificado</span>
					</label>
					<a class='btn-floating blue' onclick='subir(9)'><i class='material-icons'>attach_file</i></a>
					</p>";
					echo"<!-- Acta de entrega -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Acta de entrega</span>
					</label>
					<a class='btn-floating blue' onclick='subir(10)'><i class='material-icons'>attach_file</i></a>
					</p>";
					echo"<!-- certificado de subsidio municipal -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Certificdo de subsidio municipal</span>
					</label>
					<a class='btn-floating blue' onclick='subir(10)'><i class='material-icons'>attach_file</i></a>
					</p>";
					echo"<!-- solicitud de subsidio municipal -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Solicitud de subsidio municipal</span>
					</label>
					<a class='btn-floating blue' onclick='subir(10)'><i class='material-icons'>attach_file</i></a>
					</p>";
					echo"<!-- anexo 4 -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Anexo 4</span>
					</label>
					<a class='btn-floating blue' onclick='subir(10)'><i class='material-icons'>attach_file</i></a>
					</p>";
					echo"<!-- mandato irrevocable -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Carta de Mandato irrevocable</span>
					</label>
					<a class='btn-floating blue' onclick='subir(10)'><i class='material-icons'>attach_file</i></a>
					</p>";
			}

			foreach ($response as $key => $value) { 
				if ($value['licencia_construccion']==1) {
					echo "
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Licencia de construccion</span>
					</label>
					
					</p>";
				}else{
					echo"<!-- Licencia de construción -->
					<p>
					<label>
					<input type='checkbox' />
					<span>Licencia de construccion</span>
					</label>
					<a class='btn-floating blue' onclick='subir(1)'><i class='material-icons'>attach_file</i></a>
					</p>";
				}
				if ($value['contrato_financiera']==1) {
					echo "
					<!-- Expediente financiera -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Contrato de la financiera</span>
					</label>
					
					</p>
					";
				}else{
					echo "
					<!-- Contrato financiera -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Contrato de la financiera</span>
					</label>
					<a class='btn-floating blue' onclick='subir(2)'><i class='material-icons'>attach_file</i></a>
					</p>
					";
				}if ($value['contrato_oeo']==1) {
					
					echo " 
					<!-- Contrato OEO -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Contrato OEO</span>
					</label>
					
					</p>
					";
				}else{
					echo "

					<!-- Contrato OEO -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Contrato OEO</span>
					</label>
					<a class='btn-floating blue' onclick='subir(3)'><i class='material-icons'>attach_file</i></a>
					</p>
					";
				}
				if ($value['anexo_tecnico'] ==1) {
					echo "<!-- Anexo Técnico -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Anexo Técnico</span>
					</label>
					
					</p>";
				}else{
					echo"<!-- Anexo Técnico -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Anexo Técnico</span>
					</label>
					<a class='btn-floating blue' onclick='subir(4)'><i class='material-icons'>attach_file</i></a>
					</p>";
					
				}
				if ($value['poliza_garantia']==1) {
					echo " 
					<!-- Póliza de garantía -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Póliza de garantía</span>
					</label>
					
					</p>
					";
				}else{
					echo "<!-- Póliza de garantía -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Póliza de garantía</span>
					</label>
					<a class='btn-floating blue' onclick='subir(5)'><i class='material-icons'>attach_file</i></a>
					</p>";
				}
				if ($value['solicitud_subsidio']==1) {
					echo"<!-- Solicitud de Subsidio -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Solicitud de Subsidio</span>
					</label>
					
					</p>";
				}else{
					echo"<!-- Solicitud de Subsidio -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Solicitud de Subsidio</span>
					</label>
					<a class='btn-floating blue' onclick='subir(6)'><i class='material-icons'>attach_file</i></a>
					</p>";
				}
				if ($value['certificado_subsidio']==1) {
					echo"<!-- Certificado de Subsidio -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Certificado de Subsidio</span>
					</label>
					
					</p>";
				}else {
					echo"<!-- Certificado de Subsidio -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Certificado de Subsidio</span>
					</label>
					<a class='btn-floating blue' onclick='subir(7)'><i class='material-icons'>attach_file</i></a>
					</p>";
				}
				if ($value['folio_fonden']==1) {
					echo"<!-- Folio Fonden -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Folio Fonden</span>
					</label>
					
					</p>";
				}else{
					echo"<!-- Folio Fonden -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Folio Fonden</span>
					</label>
					<a class='btn-floating blue' onclick='subir(8)'><i class='material-icons'>attach_file</i></a>
					</p>";
				}
				if ($value['foto_beneficiario']==1) {
					echo"<!-- Foto del Beneficiario con certificado -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Foto del Beneficiario con certificado</span>
					</label>
					
					</p>";
				}else{
					echo"<!-- Foto del Beneficiario con certificado -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Foto del Beneficiario con certificado</span>
					</label>
					<a class='btn-floating blue' onclick='subir(9)'><i class='material-icons'>attach_file</i></a>
					</p>";
				}
				if ($value['acta_entrega']==1) {
					echo"<!-- Acta de entrega -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Acta de entrega</span>
					</label>
					
					</p>";
				}else{
					echo"<!-- Acta de entrega -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Acta de entrega</span>
					</label>
					<a class='btn-floating blue' onclick='subir(10)'><i class='material-icons'>attach_file</i></a>
					</p>";
				}
				if ($value['certificado_municipal']) {
					echo"<!--Certificado de subsidio municipal -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Certificado de subsidio municipal</span>
					</label>
					
					</p>";
				}else{
					echo"<!-- Certificado de subsidio municipal -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Certificado de subsidio municipal</span>
					</label>
					<a class='btn-floating blue' onclick='subir(11)'><i class='material-icons'>attach_file</i></a>
					</p>";
				}
				if ($value['subsidio_municipal']) {
					echo"<!--Solicitud de subsidio municipal -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Solicitud de subsidio municipal</span>
					</label>
					
					</p>";
				}else{
					echo"<!-- Solicitud de subsidio municipal -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Solicitud de subsidio municipal</span>
					</label>
					<a class='btn-floating blue' onclick='subir(12)'><i class='material-icons'>attach_file</i></a>
					</p>";
				}
				if ($value['anexo_4']) {
					echo"<!--Anexo 4 -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Anexo 4</span>
					</label>
					
					</p>";
				}else{
					echo"<!-- Anexo 4 -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Anexo 4</span>
					</label>
					<a class='btn-floating blue' onclick='subir(13)'><i class='material-icons'>attach_file</i></a>
					</p>";
				}
				
				if ($value['mandato_irrevocable']) {
					echo"<!--Carta de mandato irrevocable -->
					<p>
					<label>
					<input type='checkbox' checked/>
					<span>Carta de mandato irrevocable</span>
					</label>
					
					</p>";
				}else{
					echo"<!-- Carta de mandato irrevocable -->
					<p>
					<label>
					<input type='checkbox'/>
					<span>Carta de mandato irrevocable</span>
					</label>
					<a class='btn-floating blue' onclick='subir(14)'><i class='material-icons'>attach_file</i></a>
					</p>";
				}			
			}
			}
		}

		function listaArchivos($id)
		{
			$data = ['id'=>$id];
			$archivos = ChecklistModelo::obtenerArchivos($data);

			foreach ($archivos as $key => $value) {
				echo '<ul>';
				if ($value['licencia_construccion']==1) {
					echo'<li><a href="../libs/'.$value['ruta_licencia'].'" target="_blank">Licencia de construcción</a></li>';
				}
				if ($value['contrato_financiera']==1) {
					echo'<li><a href="../libs/'.$value['ruta_financiera'].'" target="_blank">Expediente de la financiera</a></li>';
				}
				if ($value['contrato_oeo']==1) {
					echo'<li><a href="../libs/'.$value['ruta_oeo'].'" target="_blank">Contraro OEO</a></li>';
				}
				if ($value['anexo_tecnico'] ==1) {
					echo'<li><a href="../libs/'.$value['ruta_anexo'].'" target="_blank">Anexo técnico</a></li>';
				}
				if ($value['poliza_garantia']==1) {
					echo'<li><a href="../libs/'.$value['ruta_poliza'].'" target="_blank">Póliza de garantía</a></li>';
				}
				if ($value['solicitud_subsidio']==1) {
					echo'<li><a href="../libs/'.$value['ruta_solicitud'].'" target="_blank">solicitud de subsidio</a></li>';
				}
				if ($value['certificado_subsidio']==1) {
					echo'<li><a href="../libs/'.$value['ruta_certificado'].'" target="_blank">Certificado de subsidio</a></li>';
				}
				if ($value['folio_fonden']==1) {
					echo'<li><a href="../libs/'.$value['ruta_fonden'].'" target="_blank">Folio fonden</a></li>';
				}
				if ($value['foto_beneficiario']==1) {
					echo'<li><a href="../libs/'.$value['ruta_foto'].'" target="_blank">Foto del Beneficiario</a></li>';
				}
				if ($value['acta_entrega']==1) {
					echo'<li><a href="../libs/'.$value['ruta_acta'].'" target="_blank">Acta de entrega</a></li>';
				}
				if ($value['certificado_municipal']==1) {
					echo'<li><a href="../libs/'.$value['ruta_cmunicipal'].'" target="_blank">Certificado de subsidio municipal</a></li>';
				}
				if ($value['subsidio_municipal']==1) {
					echo'<li><a href="../libs/'.$value['ruta_smunicipal'].'" target="_blank">Solicitud de subsidio municipal</a></li>';
				}
				if ($value['anexo_4']==1) {
					echo'<li><a href="../libs/'.$value['ruta_4'].'" target="_blank">Anexo 4</a></li>';
				}
				if ($value['mandato_irrevocable']==1) {
					echo'<li><a href="../libs/'.$value['ruta_mandato'].'" target="_blank">Carta de mandato irrevocable</a></li>';
				}
				echo '</ul>';



			}
		}
	}
	?>