<?php
require_once '../modelo/main_model.php';
/**
 *
 */
class MainController
{

  public function obtenerProyectos()
  {
    $result = MainModelo::obtenerProyectos();

    foreach ($result as $row => $item) {
      $proyecto = $item['proyecto'];
      $id = $item['idproyecto'];
      echo '<option value="'.$id.'">'.$proyecto.'</option>';
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

  public function obtenesBeneficiarios($id)
  {
    // $fecha = include '../libs/fecha.php';
    $data = ['id'=>$id];
    $result = MainModelo::listaProyectos($data);

    echo"
    <div class='row'>
    <div class='col m12'>
    <div class='col m2'>
    <a class=' btn-small btn waves-effect waves-light btn-large waves-effect waves-light blue accent-3' href='../vistas/form_layout.php' type='submit' name='action'>
    <i class='material-icons right'>add</i>Agregar</a>
    </div>
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
              <div class='col m10 offset-m6'>
                <div class='col m2'>";
                if($item['estatus']=='Solicitante'){
                 echo" <form method='POST' action='../controladores/layout_controller.php'>
                    <input type='number' value='ejecuta' style='display: none;' name='ejecuta'>
                    <input type='number' value='".$item['id_layout']."' style='display: none;' name='layout'>
                    <button class='btn-small btn waves-effect waves-light  waves-effect waves-light teal accent-4' type='submit' name='action'>Ejecución 
                      <i class='material-icons'>done</i>
                    </button>
                  </form>";
                } else {
                  if ($item['estatus']=='EN EJECUCION') {
                  echo " <form method='POST' action='../controladores/layout_controller.php'>
                    <input type='text' value='aparta' style='display: none;' name='aparta'>
                    <!-- fecha de apartado -->
                    <div class='input-field'>
                      <i class='material-icons prefix'>cake</i>
                      <input name='fecha_apartado' type='text' class='validate datepicker' required>
                      <label>Fecha de apartado</label>
                    </div>
                    <input type='number' value='".$item['id_layout']."' style='display: none;' name='layout'>
                    <button class='btn-small btn waves-effect waves-light  waves-effect waves-light blue accent-4' type='submit' name='action'>Apartado 
                      <i class='material-icons'>done</i>
                    </button>
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
      echo'<ul class="collapsible">
      <li>
      <div class="collapsible-header"><i class="material-icons">build</i>'.$item["proyecto"].'</div>
      <div class="collapsible-body">
      <span>';
      $this->obtenesBeneficiarios($item['idproyecto']);
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
