<?php
require_once '../modelo/excel_model.php';
/**
 *
 */
class ExcelController
{

  function exportar()
  {
    $data = ['id' => $_POST['folio']];
    $result = ExcelModelo::exportar($data);
  }
}

if(isset($_POST['folio'])){
  $excel = new ExcelController();
  $excel->exportar();
}

?>
