<?php
require_once '../modelo/proyecto_model.php';
require_once '../modelo/beneficiario_model.php';
/**
 *
 */
class ActualizarController
{
  public function obtenerDatos($id)
  {

    $data = ['id'=>$id];
    $result = ProyectoModelo::obtenerDatos($data);

      foreach ($result as $row => $item) {
        echo"  <form action='../controladores/layout_controller.php' method='POST'>
          <input value='actualizacion' name='actualizacion' style='display:none;'>
          	<div class='row'>
          		<div class='col m12'>
              <!-- layout -->
              <div class='input-field col m12'>
                  <input style='display:none;' id='layout' name='layout' type='text' class='validate' value='".$item['id_layout']."' readonly required>
              </div>
              <!-- motivo -->
                <div class='input-field col m6'>
                  <i class='material-icons prefix'>compare_arrows</i>
                   <select onchange='otros()' id='motivo' name='motivo'>
                      <option value='' disabled>Seleccion el motivo</option>
                      <option value='Terreno no valido'>Terreno no valido</option>
                      <option value='Subsidio previo'>Subsidio previo</option>
                      <option value='Otro'>Otro</option>
                   </select>
                  <label>Motivo de sustitución</label>
                </div>
                <div class='input-field col m6' id='observacion'>
                </div>
          			<!-- proyecto -->
          			<div class='input-field col m12'>
          				<i class='material-icons prefix'>build</i>
          					<input id='proyecto' name='proyecto' type='text' class='validate' value='".$item['proyecto']."' readonly required>
          				<label>Proyecto</label>
          			</div>
          			<!-- nombre -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>account_circle</i>
          				<input id='nombre' name='nombre' type='text' class='validate' value='".$item['nombre']."' required>
          				<label>Nombre</label>
          			</div>
          			<!-- apellido paterno -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>account_circle</i>
          				<input id='apellido_p' name='apellido_p' type='text' class='validate' value='".$item['apellido_paterno']."' required>
          				<label>Apellido paterno</label>
          			</div>
          			<!-- apellido materno -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>account_circle</i>
          				<input id='apellido_m' name='apellido_m' type='text' class='validate'value='".$item['apellido_materno']."' required>
          				<label>Apellido materno</label>
          			</div>
          			<!-- curp -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>recent_actors</i>
          				<input id='CURP' name='curp' data-length='18' maxlength='18' type='text'value='".$item['curp']."' class='validate' required>
          				<label>CURP</label>
          			</div>
          			<!-- estado civil -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>favorite</i>
          				<input name='estado_civil' type='text' value='".$item['estado_civil']."'  required>
          				<label>Estado civil</label>
          			</div>
          			<!-- ingreso -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>attach_money</i>
          				<input name='ingreso' type='text' value='".$item['ingreso']."' class='validate' required>
          				<label>Ingreso</label>
          			</div>
          			<!-- antiguedad -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>hourglass_full</i>
          				<input name='antiguedad' type='number' value='".$item['antiguedad']."' class='validate' readonly>
          				<label>Antigüedad</label>
          			</div>
          			<!-- ocupación -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>work</i>
          				<input name='ocupacion' type='text' value='".$item['ocupacion']."' class='validate' required>
          				<label>Ocupación</label>
          			</div>
          			<!-- teléfono -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>phone</i>
          				<input name='telefono' maxlength='10' type='number' value='".$item['telefono']."' class='validate' required>
          				<label>Teléfono</label>
          			</div>
          			<!-- solución -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>attach_money</i>
          				<input name='solucion' type='text' value='".$item['solucion']."' class='validate' readonly required>
          				<label>Solución</label>
          			</div>
          			<!-- subsidio -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>attach_money</i>
          				<input name='subsidio' type='text' value='".$item['subsidio']."' class='validate' readonly required>
          				<label>Subsidio</label>
          			</div>
          			<!-- credito -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>attach_money</i>
          				<input name='credito' type='text' value='".$item['credito']."' class='validate' readonly required>
          				<label>Credito</label>
          			</div>
          			<!-- enganche en efectivo -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>attach_money</i>
          				<input name='enganche_efectivo' type='text' value='".$item['enganche_efectivo']."' class='validate' readonly required>
          				<label>Enganche en efectivo</label>
          			</div>
          			<!-- enganche en especie -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>list</i>
          				<select multiple name='enganche_especie[]'readonly>
          					<option value='".$item['enganche_especie']."' selected>".$item['enganche_especie']."</option>
          					<option value='Mano de obra'>Mano de obra</option>
          					<option value='Material'>Material</option>
          					<option value='Efectivo'>Efectivo</option>
          					<option value='Pendiente'>Pendiente</option>
          				</select>
          				<label>Enganche en especie</label>
          			</div>
          			<!-- otros apoyos -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>attach_money</i>
          				<input name='otros_apoyos' type='text' value='".$item['otros_apoyos']."' class='validate' readonly required>
          				<label>Otros apoyos</label>
          			</div>
          			<!-- modalidad -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>list</i>
          			  <input name='modalidad' type='text' value='".$item['modalidad']."' class='validate' required readonly >
          				<label>Modalidad</label>
          			</div>
          			<!-- CUV -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>assignment_turned_in</i>
          				<input name='cuv' type='text' value='".$item['cuv']."' class='validate' required readonly >
          				<label>CUV</label>
          			</div>
          			<!-- puntaje -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>exposure_plus</i>
          				<input name='puntaje' type='number' value='".$item['puntaje']."' class='validate' readonly required>
          				<label>Puntaje</label>
          			</div>
          			<!-- estado de méxico -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>location_city</i>
          				<input name='estado' type='text' value='".$item['estado']."' class='validate' readonly required>
          				<label>Estado</label>
          			</div>
          			<!-- municipio -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>location_city</i>
          				<input name='municipio' type='text' value='".$item['municipio']."' class='validate' readonly required>
          				<label>Municipio/Localidad</label>
          			</div>
          			<!-- código postal -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>local_post_office</i>
          				<input name='cp' type='number' value='".$item['codigo_postal']."' maxlength='5' class='validate' readonly required>
          				<label>Código Postal</label>
          			</div>
          			<!-- colonia -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>location_city</i>
          				<input name='colonia' type='text' value='".$item['colonia']."' class='validate' readonly required>
          				<label>Colonia</label>
          			</div>
          			<!-- domicilio del beneficiario -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>place</i>
          				<input name='domicilio_beneficiario' type='text' value='".$item['domicilio_beneficiario']."' class='validate' readonly>
          				<label>Domicilio del beneficiario</label>
          			</div>
          			<!-- tipo_asentamiento -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>domain</i>
          				<input name='tipo_asentamiento' type='text' value='".$item['tipo_asentamiento']."' class='validate' readonly required>
          				<label>Tipo de asentamiento</label>
          			</div>
                <!-- zona -->
                <div class='input-field col m4'>
                  <i class='material-icons prefix'>domain</i>
                  <input name='zona' type='text' value='".$item['zona']."' class='validate' readonly required>
                  <label>Zona</label>
                </div>
          			<!-- latitud -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>map</i>
          				<input name='latitud' type='text' value='".$item['latitud']."' class='validate'  required readonly>
          				<label>Latitud</label>
          			</div>
          			<!-- longitud -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>map</i>
          				<input name='longitud' type='text' value='".$item['longitud']."' class='validate' required readonly>
          				<label>Longitud</label>
          			</div>
          			<!-- domicilio del terreno -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>place</i>
          				<input name='domicilio_terreno' type='text' value='".$item['domicilio_terreno']."' class='validate' required readonly>
          				<label>Domicilio del terreno</label>
          			</div>
          			<!-- PCU -->
          			<div class='input-field col m4'>
          				<i class='material-icons prefix'>list</i>
                  <input name='pcu' type='text' value='".$item['pcu']."' class='validate' readonly required readonly>
          				<label>PCU</label>
          			</div>
                <div class='row'>
                	<div class='col m12'>
                		<div class='col m8 offset-m1'>
                        <a class='btn-floating btn-large waves-effect waves-light default-primario-color' href='proyectos.php'><i class='material-icons'>arrow_back</i></a>
                		</div>
                		<div class='col m2 offset-m1'>
                      <button class='btn waves-effect waves-light btn-floating btn-large waves-effect waves-light green accent-2' type='submit' name='action'>
                        <i class='material-icons right'>update</i>
                		</div>
                  </button>
                	</div>
                </div>
          		</div>
          	</div>
          </form>";
      }
  }

}
?>

