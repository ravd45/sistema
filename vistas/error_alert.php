<?php include '../libs/header.php';

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
     swal("Oops!", "Intenta nuevamente", "error", {
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


