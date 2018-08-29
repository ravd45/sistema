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
			echo " <form action='#'>";
			foreach ($result as $row => $value) {

				if (!is_null($value['ife'])) {
					echo " <p>
						     <label>
						       <input type='checkbox' checked='checked' />
						       <span>Identificación Oficial Vigente (IFE/INE)</span>
						     </label>
						    </p>";
				}else{
					echo " <p>
						     <label>
						       <input type='checkbox' />
						       <span>Identificación Oficial Vigente (IFE/INE)</span>
						     </label>
						    </p>";
				}

				if (!is_null($value['curp'])) {
					echo "<p>
					      	<label>
					        	<input type='checkbox' checked='checked' />
					        	<span>CURP (Clave Unica de Registro de Población)</span>
					      	</label>
					    </p>";
				}else{
					echo "<p>
					      	<label>
					        	<input type='checkbox'/>
					        	<span>CURP (Clave Unica de Registro de Población)</span>
					      	</label>
					    </p>";
				}

				if (!is_null($value['comprobante_domicilio'])) {
					echo "<p>
					      	<label>
					        	<input type='checkbox' checked='checked' />
					        	<span>Comprobante de Domicilio (No mayor a 2 meses)</span>
					      	</label>
					    </p>";
				}else{
					echo "<p>
					      	<label>
					        	<input type='checkbox' />
					        	<span>Comprobante de Domicilio (No mayor a 2 meses)</span>
					      	</label>
					    </p>";
				}

				if (!is_null($value['acta_nacimiento'])) {
					echo "<p>
					      	<label>
					        	<input type='checkbox' checked='checked' />
					        	<span>Acta de nacimiento</span>
					      	</label>
					    </p>";
				}else{
					echo "<p>
					      	<label>
					        	<input type='checkbox'/>
					        	<span>Acta de nacimiento</span>
					      	</label>
					    </p>";
				}

				if (!is_null($value['posesion_terreno'])) {
					echo "<p>
					      	<label>
					        	<input type='checkbox' checked='checked' />
					        	<span>Comprobante de propiedad o posesión del terreno a nombre del beneficiario</span>
					      	</label>
					    </p>";
				}else{
					echo "<p>
					      	<label>
					        	<input type='checkbox'/>
					        	<span>Comprobante de propiedad o posesión del terreno a nombre del beneficiario</span>
					      	</label>
					    </p>";
				}
			}
		}
	}
?>