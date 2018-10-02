<?php include '../libs/header.php'; ?>


<div class="row">
	<div class="col m12">
		<div class="col m12">
			<h3>Manuales</h3>
		</div>

		<div class="col m4 offset-m2" style="padding-top:10%">
			<a href="../documentacion/Sistema_MU.docx">
				<img src="../img/pdf-icon-blue.png" id="MU" alt="">
				<br>
				<i style="padding-left: 10%; padding-bottom: 33%" class="material-icons prefix">picture_as_pdf</i> Manual Usuario</a>
		</div>
	<?php if ($_SESSION['rol'] == 'administrador') {?>
		
		<div class="col m4 offset-m2" style="padding-top:10%">
			<a href="../documentacion/Sistema_MT.docx">
				<img src="../img/pdf-icon-blue.png" id="MT" alt="">
				<br>
				<i style="padding-left: 10%; padding-bottom: 33%" class="material-icons prefix">picture_as_pdf</i> Manual Técnico</a>
		</div>
	<?php } ?>
	</div>
</div>

<div class="row">
    <div class="col m12">
      <div class="col m8 offset-m1">
          <a class="btn-floating btn-large waves-effect waves-light default-primario-color" href="vista_general.php"><i class="material-icons">arrow_back</i></a>
      </div>
    </div>
  </div>
		<?php include '../libs/footer.php'; ?>