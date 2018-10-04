<?php
require_once '../modelo/main_model.php';

class MainController
{

  public function obtenerProyectos($proyectoGET)
  {
    $result = MainModelo::obtenerProyectos();

    foreach ($result as $row => $item) {
      $proyecto = $item['proyecto'];
      $id = $item['idproyecto'];
      if($id == $proyectoGET){
        echo '<option value="'.$id.'" selected>'.$proyecto.'</option>';
      }else{

        echo '<option value="'.$id.'">'.$proyecto.'</option>';
      }
    }
  }

  public function municipioProyecto($proyectoGet)
  {
    $data = ['id' => $proyectoGet];
    $result = MainModelo::ObtenerDatosProyecto($data);
    foreach ($result as $key => $value) {
      echo '<input name="municipio" type="text" class="validate" value="'.$value['localidad'].'" readonly>';
    }
  }

  public function estadoProyecto($proyectoGet)
  {
    $data = ['id' => $proyectoGet];
    $result = MainModelo::ObtenerDatosProyecto($data);
    foreach ($result as $key => $value) {
      echo '<input name="estado" type="text" class="validate" value="'.$value['estado'].'" readonly>';
    }
  }

  public function modalidadProyecto($proyectoGet)
  {
    $data = ['id' => $proyectoGet];
    $result = MainModelo::ObtenerDatosProyecto($data);
    foreach ($result as $key => $value) {
      echo '<input name="modalidad" id="modalidad" type="text" class="validate" value="'.$value['modalidad'].'" readonly>';

      if ($value['modalidad']=='AUTOPRODUCCION' || $value['modalidad']== 'autoproduccion') {
        echo '<script>rangoIngreso();</script>';
      }else{
       echo '<script>subsidio();</script>';
     }
   }
 }

 public function catalogoEstado()
 {
  $result = MainModelo::catalogoEstado();

  echo'
  <form id="formEstado">
  <input type="text" name="estado" id="estado" list="estados">

  <datalist id="estados">';
  foreach ($result as $row => $item) {
    $estado = $item['estado'];
    $id = $item['id'];

    echo'<option value="'.$estado.'">'.$estado.'</option>';
  }
  echo'</datalist>
  </form>';
}

public function catalogoMunicipio()
{
  $data = ['estado'=>$_POST['estado']];

  $result = MainModelo::catalogoMunicipio($data);

  echo'
  <i class="material-icons prefix">location_city</i><input type="text" id="default" name="municipio" list="municipios">

  <datalist id="municipios">';
  foreach ($result as $row => $item) {
    $municipio = $item['municipio'];
    $id = $item['id'];

    echo '<option value="'.$municipio.'">'.$municipio.'</option>';
  }
  echo'</datalist><label>Municipio</label>';
}

public function obtenerBeneficiarios($id)
{
    // session_start();
 date_default_timezone_set('America/Mexico_city');
 $fecha = date('Y-m-d');

        // $fecha = include '../libs/fecha.php';
 $data = ['id'=>$id];
 $result = MainModelo::listaProyectos($data);

 echo"
 <div class='row'>
 <div class='col m12'>";
 if ($_SESSION['rol'] != 'invitado') {

  echo" <div class='col m2'>
  <a class=' btn-small btn waves-effect waves-light btn-large waves-effect waves-light blue accent-3' href='../vistas/form_layout.php?w=$id' type='submit' name='action'>
  <i class='material-icons right'>add</i>Agregar</a>
  </div>";
}
echo "
<div class=row>
<div class='col m12'>
<div class='col m2 offset-m8'>  
<form method='POST' action='../controladores/excel_controller.php'>
<input type='number' value='".$id."' style='display: none;' name='folio'>
<button class='btn-small btn waves-effect waves-light waves-effect waves-light green accent-4' type='submit' name='action'>
<i class='material-icons right'>print</i>Exportar
</button>
</form>
</div>";
if ($_SESSION['rol'] == 'administrador') {  
  echo "<div class='col m2'>  
  <form method='POST' action='../controladores/eliminar_controller.php'>
  <input type='number' value='".$id."' style='display: none;' name='proyecto'>
  <button class='btn-small btn waves-effect waves-light waves-effect waves-light red accent-4' type='submit' name='action'>
  <i class='material-icons right'>delete</i>Eliminar
  </button>
  </form>
  </div>";
}
echo"</div>
</div>";

foreach ($result as $row => $item) {
  echo "
  <table class=''>
  <tbody>
  <tr>
  <td style='width:250px;'>".$item['nombre_completo']."</td>";
  
    echo "  <td>

    <div class='row'>";
if ($_SESSION['rol'] != 'invitado') {
   echo " <div class='col m9 offset-m4'>
    <div class='col m2'>
    <form method='POST' action='../vistas/actualiza_beneficiario.php'>
    <input type='text' value='actualiza' style='display: none;' name='actualiza'>
    <input type='number' value='".$item['id_layout']."' style='display: none;' name='layout'>
    <input type='text' value='".$item['nombre_completo']."' style='display: none;' name='nombre'>
    <button class='btn-small btn waves-effect waves-light  waves-effect waves-light cyan darken-3' type='submit' name='action'>Actualizar 
    <i class='material-icons'>rate_review</i>
    </button>
    </form>
    </div>";
  }
    echo "<div class='col m2'>";
     // if ($item['estatus']=='EN EJECUCION') {

      echo" <form method='POST' action='../vistas/ejecucion_check.php?l=".$item['id_layout']."'>";

      /**cuando ya se hayan subido todas las licencias volver a eliminar esta parte*/
      echo"<input name='id' value='".$item['id_layout']."' style='display:none;'>
    <button class='btn-small btn waves-effect waves-light  waves-effect waves-light  cyan darken-4' >Licencia <i class='material-icons'>playlist_add_check</i>
    </button>
    </form></div>";
    /**hasta acá*/
     // }else{
    /**y acá*/  
     echo "<div class='col m2'>";
      echo" <form method='POST' action='../vistas/checklist.php'>";
     // }
    
    echo"<input name='id' value='".$item['id_layout']."' style='display:none;'>
    <button class='btn-small btn waves-effect waves-light  waves-effect waves-light  cyan darken-4' >checklist <i class='material-icons'>playlist_add_check</i>
    </button>
    </form>

    </div>";
    if ($_SESSION['rol'] != 'invitado') {
    echo "<div class='col m2'>";
    if($item['estatus']=='Solicitante'){
     echo" <form method='POST' action='../vistas/ejecucion_form.php'>
     <input type='number' value='ejecuta' style='display: none;' name='ejecuta'>
     <input type='number' value='".$item['id_layout']."' style='display: none;' name='layout'>
     <input type='text' value='".$item['nombre_completo']."' style='display: none;' name='nombre'>
     <button class='btn-small btn waves-effect waves-light  waves-effect waves-light teal darken-4' type='submit' name='action'>Ejecución 
     <i class='material-icons'>done</i>
     </button>
     </form>";
   } else {
    if ($item['estatus']=='EN EJECUCION') {
      echo " <form method='POST' action='../controladores/layout_controller.php'>
      <input type='text' value='aparta' style='display: none;' name='aparta'>
      <!-- fecha de apartado -->
      <button class='btn-small btn waves-effect waves-light  waves-effect waves-light teal darken-2' type='submit' name='action'>Apartado 
      <i class='material-icons'>done</i>
      </button>
      <div class = 'row'>                    
      <div class = 'col m12'>                      
      <div class=''>
      <i class='material-icons prefix'>schedule</i>
      <input type='date' name='fecha_apartado' max='".$fecha."' placeholder='Fecha de apartado' required>

      </div>
      </div>
      </div>
      <input type='number' value='".$item['id_layout']."' style='display: none;' name='layout'>
      </form>";
    }else{
      echo "APARTADO: ".$item['fecha_apartado'];
    }
  }
  echo "</div>
  <div class='col m2'>
  <form method='POST' action='../vistas/cancela_beneficiario.php'>
  <input name='id' value='".$item['id_layout']."' style='display:none;'>
  <button class='btn-small btn waves-effect waves-light waves-effect waves-light green darken-4 ' onclick='cancelacion()' type='submit' name='action'>Cancelar <i class='material-icons'>cancel</i></button>
  </form>
  </div>
  <div class='col m2'>
  <form method='POST' action='../vistas/actualiza_datos.php'>
  <input value='actualizacion' name='actualizacion' style='display:none;'>
  <input name='id' value='".$item['id_layout']."' style='display:none;'>
  <button class='btn-small btn waves-effect waves-light  waves-effect waves-light light-green darken-4' >Sustituir <i class='material-icons'>update</i>
  </button>
  </form>
  </div>
  </div>
  </div>
  </td>";
}
echo "  </tr>
</tbody>
</table>
";
}
}

public function listaProyectos()
{
  if ($_SESSION['ee'] != 'N/F') {
    $data = ['ee' => $_SESSION['ee']];
    $result = MainModelo::proyectosFinanciera($data);
  }else{
    $result = MainModelo::obtenerProyectos();
  }

  foreach ($result as $row => $item) {
    $id = ['id'=>$item['idproyecto']];
    $total = MainModelo::obtenerTotalCapturados($id);
    foreach ($total as $key => $value) {
      $total = $value['total'];
    }
    echo'<ul class="collapsible">
    <li>
    <div class="collapsible-header" style="text-transform: uppercase;"><i class="material-icons">build</i>'.$item["proyecto"].' Capturados: <a class="green-text">'.$total.'</a></div>
    <div class="collapsible-body">
    <span>';
    $this->obtenerBeneficiarios($item['idproyecto']);
    echo'</span>
    </div>
    </li>
    </ul>';
  }
}

public function cancelarBeneficiario()
{
  $data = ['motivo'=>$_POST['motivo'],
  'id'=>$_POST['id'],
  'fecha'=>$_POST['fecha']];
  $result = MainModelo::cancelarBeneficiario($data);

  if ($result==1) {
    echo "<script>window.location='../vistas/proyectos.php';</script>";
  }else{
    echo "Error";
  }  
}

public function creditoProyecto($proyectoGet)
{
  $data = ['id' => $proyectoGet];
  $result = MainModelo::ObtenerDatosProyecto($data);
  foreach ($result as $key => $value) {
    echo '<input name="credito" id="credito" type="number" step=".01" class="validate" value="'.$value['credito'].'" readonly>';
  }
}

public function solucionProyecto($proyectoGet)
{
  $data = ['id' => $proyectoGet];
  $result = MainModelo::ObtenerDatosProyecto($data);
  foreach ($result as $key => $value) {
    echo '<input name="solucion" id="solucion" type="text" class="validate" value="'.$value['solucion'].'" readonly>';
  }
}

public function obtenerCP($proyectoGet)
{

  $data = ['id'=>$proyectoGet];

  $municipio = MainModelo::obtenMunicipio($data);

  foreach ($municipio as $key => $value) {
   $mun = ['municipio'=>$value['localidad']];
 }

 $result = MainModelo::obtenerCP($mun);
 if ($result[0]==NULL) {
   echo '<option value="">No se han cargado los Codigos postales del municipio</option>';
 }else{
  foreach ($result as $key => $value) {
    echo '<option value="'.$value['codigo_postal'].'">'.$value['codigo_postal'].'</option>';
  }
}
}

public function obtenerLocalidad($proyecto)
{
  $data = ['id'=> $proyecto];
  $municipio = MainModelo::obtenMunicipio($data);

  foreach ($municipio as $key => $value) {
   $mun = ['municipio'=>$value['localidad']];
 }

 $result = MainModelo::obtenerLocalidad($mun);

 if ($result[0]==NULL) {
   echo '<option value="">No se han cargado las localidades de este municipio </option>';
 }else{
  foreach ($result as $key => $value) {
    echo '<option value="'.$value['localidad'].'">'.$value['localidad'].'</option>';
  }
}


}

public function colonias()
{
  $data = ['cp' => $_POST['cp']];
  $result = MainModelo::obtenerColonias($data);
      // var_dump($result);
  echo ' <i class="material-icons prefix">location_city</i>
  <input name="colonia" id="colonia" type="text" list="colonias" class="validate" required>
  <datalist id="colonias">';
  foreach ($result as $key => $value) {
    $colonia = $value['colonia'];


    echo '<option value="'.$colonia.'">'.$colonia.'</option>';

  }
  echo'   </datalist>
  <label>Colonia</label>';    
}

}

if(isset($_POST['motivo'])){

  echo "<script>
  function alerta() {
    alert('Auch');
  }
  </script>";
}

if (isset($_POST['estado'])) {

  $cat = new MainController();
  $cat->catalogoMunicipio();
}

if (isset($_POST['cp'])) {
  $cp = new MainController();
  $cp->colonias();
}
// if (isset($_POST['colonia'])) {
//   $col = new MainController();
//   $col->asentamiento();
// }
?>
