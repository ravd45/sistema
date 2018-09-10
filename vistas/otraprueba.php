<?php 

	/**
	 * 
	 */
	class Ajax 
	{
		
		function prueba()
		{
			
			switch ($_POST['cp']) {
				case 91715:
					$response = '<input type="text" id="colonia" name="" list="colonias" placeholder="">

						<datalist id="colonias">
				<option value="asociacion civil">
				<option value="el vergel">
							
						</datalist>';
					break;
				
				case 72120:
					$response = '<input type="text" id="colonia" name="" list="colonias" placeholder="">

						<datalist id="colonias">
				<option value="Ignacio Romero Vargas">
				<option value="Los Arcos Santa Cruz">
				<option value="La Vega">
				<option value="Villas el Encanto I">
				<option value="Miguel Abed">
				<option value="INFONAVIT Hermenegildo J. Aldana">
				<option value="Centro Cruz del Sur">
				<option value="Villas el Encanto II">
				<option value="Independencia">
				<option value="San José Guadalupe">
							
						</datalist>';
					break;
				default:
				$response = "No hay colonias para ese código postal";
				break;
			}
				
				
			
			
			print_r($response);
		}
	}

	if (isset($_POST['cp'])) {
		$ajax = new Ajax();
		$ajax->prueba();
	}
 ?>