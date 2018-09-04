<?php 
	include '../modelo/layout_model.php';

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
				if (!is_null($value['cuv'])) {
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
				<input name="cuv" type="number" class="validate" >
				<label>CUV</label>
			</div>';
				}

				if (!is_null($value['puntaje'])) {
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
	}
?>