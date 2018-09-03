<?php include '../libs/header.php';
 

if (!isset($_GET['q'])) {
 if (!isset($_GET['w'])) {
  $_GET['w'] = 0;
}
echo '
<script src="../js/jquery-3.3.1.js"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script> 
   function alertIngreso(id){
     swal("Ingreso inválido", "Debe ser entre 6,900 y 11,000", "error", {
  buttons: {
    Ok: true,
  },
})
.then((value) => {
  switch (value) {
 
    case "Ok":
      if(id == 1){
      window.location="../vistas/proyectos.php";
      }else{ 
      window.location="../vistas/form_layout.php?w='.$_GET['w'].'";
      }
      break;
 
    default:
     window.location="../index.php";
  }
});
   }

</script>';
}else{
echo '
<script src="../js/jquery-3.3.1.js"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script> 
   function alertExcel(id){
     swal("No hay Datos para exportar", "Intenta nuevamente", "warning", {
  buttons: {
    Ok: true,
  },
})
.then((value) => {
  switch (value) {
 
    case "Ok":
      if(id == 1){
      window.location="../vistas/proyectos.php";
      }else{
        var i = id;
      window.location="../vistas/checklist.php?q='.$_GET['q'].'";
      }
      break;
 
    default:
     window.location="../index.php";
  }
});
   }

</script>';

echo '
<script src="../js/jquery-3.3.1.js"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script> 
   function alertLogin(){
     swal("Datos Inválidos", "Intenta nuevamente", "error", {
  buttons: {
    Ok: true,
  },
})
.then((value) => {
  switch (value) {
 
    case "Ok":
      window.location="../index.php";
      break;
 
    default:
     window.location="../index.php";
  }
});
   }

</script>';
}

if (isset($_GET['w'])) {
  $x = $_GET['w'];
  echo"<script>alertIngreso($x);</script>";
}else{
 

if (isset($_GET['q'])) {

$id = $_GET['q'];

switch ($_GET['q']) {
  case '1':
     echo"<script>alertExcel(1);</script>";
    break;
  
  case '2':
    echo"<script>alertLogin();</script>";
    break;

  default:
    echo"<script>alertExcel($id);</script>";
    break;
}
}
}

