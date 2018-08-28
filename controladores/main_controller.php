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
    $fecha = include '../libs/fecha.php';
    $data = ['id'=>$id];
    $result = MainModelo::listaProyectos($data);

    echo"<a class=' btn-small btn waves-effect waves-light btn-floating btn-large waves-effect waves-light green accent-2' href='../vistas/form_layout.php' type='submit' name='action'>
          <i class='material-icons right'>add</i></a>";

    foreach ($result as $row => $item) {
      echo "
      <table>
        <tbody>
          <tr>
            <td>".$item['nombre_completo']."</a></td>
            <td></td>
            <td>
              <a class='waves-effect waves-light modal-trigger'><i class='material-icons'>check_circle</i></a>
              <a class='waves-effect waves-light modal-trigger' href='#cancelacion'><i class='material-icons'>cancel</i></a>
              <a class='waves-effect waves-light modal-trigger' href='#sustitucion'><i class='material-icons'>compare_arrows</i></a>
            </td>
          </tr>
        </tbody>
      </table>

      <div id='cancelacion' class='modal'>
        <div class='modal-content'>
          <h4>Cancelación</h4>
          <div class='row'>
       <form class='col m12' action='../controladores/actualizar_datos_controller.php' method='POST'>
         <div class='row'>
           <div class='input-field col m12'>
             <textarea id='textarea1' name='motivo' class='materialize-textarea'></textarea>
             <label for='textarea1'>Motivo de cancelación</label>
           </div>
           <div>
            <input name='id' value='".$item['id_layout']."' >
            <input name='fecha' ".$fecha." >
           </div>
         </div>
       </form>
     </div>
        </div>
        <div class='modal-footer'>

    <button class='btn-flat waves-effect waves-light waves-green' type='submit' name='action'>Aceptar
    </button>
        </div>
      </div>";
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