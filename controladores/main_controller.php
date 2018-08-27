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
    $data = ['id'=>$id];
    $result = MainModelo::listaProyectos($data);

    foreach ($result as $row => $item) {
      echo "
      <div class='col m2 offset-m10'>
      <button class='btn waves-effect waves-light btn-floating btn-large waves-effect waves-light green accent-2' href='../vistas/form_layout.php' type='submit' name='action'>
        <i class='material-icons right'>add</i>
      </div>
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
      </table>";
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
}


?>
