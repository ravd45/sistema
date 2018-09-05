<?php
require_once '../modelo/main_model.php';
/**
 *
 */
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

  public function catalogoEstado()
  {
    $result = MainModelo::catalogoEstado();

    foreach ($result as $row => $item) {
      $estado = $item['estado'];
      $id = $item['idestado'];

      echo '<option value="'.$id.'">'.$estado.'</option>';
    }
  }

  public function catalogoMunicipio()
  {
    $result = MainModelo::catalogoMunicipio();

    foreach ($result as $row => $item) {
      $municipio = $item['municipio'];
      $id = $item['idmunicipio'];

      echo '<option value="'.$id.'">'.$municipio.'</option>';
    }
  }

  public function agregarLayout()
  {
    echo "adíos";
  }

  public function obtenerBeneficiarios($id)
  {
     date_default_timezone_set('America/Mexico_city');
        $fecha = date('Y-m-d');
       
    // $fecha = include '../libs/fecha.php';
    $data = ['id'=>$id];
    $result = MainModelo::listaProyectos($data);

    echo"
    <div class='row'>
    <div class='col m12'>
    <div class='col m2'>
    <a class=' btn-small btn waves-effect waves-light btn-large waves-effect waves-light blue accent-3' href='../vistas/form_layout.php?w=$id' type='submit' name='action'>
    <i class='material-icons right'>add</i>Agregar</a>
    </div>
    <div>
    <div class='col m2 offset-m10'>  
    <form method='POST' action='../controladores/excel_controller.php'>
    <input type='number' value='".$id."' style='display: none;' name='folio'>
    <button class='btn-small btn waves-effect waves-light waves-effect waves-light green accent-4' type='submit' name='action'>
    <i class='material-icons right'>print</i>Exportar
    </button>
    </form>
    </div>
    </div>
    </div>";

    foreach ($result as $row => $item) {
      echo "
 <table class=''>
      <tbody>
        <tr>
          <td style='width:250px;'>".$item['nombre_completo']."</td>
          <td>
            <div class='row'>
              <div class='col m9 offset-m4'>
                <div class='col m2'>";
                if ($item['estatus']=='EN EJECUCION') {
                  
                  echo" <form method='POST' action='../vistas/ejecucion_check.php?l=".$item['id_layout']."'>";
                }else{
                  echo" <form method='POST' action='../vistas/checklist.php'>";
                   }
                   echo"<input name='id' value='".$item['id_layout']."' style='display:none;'>
                      <button class='btn-small btn waves-effect waves-light  waves-effect waves-light  cyan darken-4' >checklist <i class='material-icons'>playlist_add_check</i>
                      </button>
                    </form>
                
                </div>
                <div class='col m2'>";
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
          </td>
        </tr>
      </tbody>
     </table>
";
    }
  }

  public function listaProyectos()
  {
    $result = MainModelo::obtenerProyectos();
   

    foreach ($result as $row => $item) {
          $id = ['id'=>$item['idproyecto']];
       $total = MainModelo::obtenerTotalCapturados($id);
    foreach ($total as $key => $value) {
      $total = $value['total'];
    }
      echo'<ul class="collapsible">
      <li>
      <div class="collapsible-header"><i class="material-icons">build</i>'.$item["proyecto"].' Capturados: '.$total.'</div>
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
}

if(isset($_POST['motivo'])){
  // $cancelacion = new MainController();
  // $cancelacion->cancelarBeneficiario();

  echo "<script>
  function alerta() {
    alert('Auch');
  }
  </script>";
}

?>
