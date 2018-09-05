<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Enviar valores a una ventana modal usando jQuery</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>
<body>
	<div class="container">
		<div style="height:50px;"></div>
		<div class="well">
			<center><h2>Enviar valores a una ventana modal usando jQuery</h2></center>
			<div style="height:10px;"></div>
			<table width="100%" class="table table-striped table-bordered table-hover">
				<thead>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Dirección</th>
					<th>Acciones</th>
				</thead>
				<tbody>

					<tr>
						<td><span id="firstname1"><?php echo $nombre = 'Rubi'; ?></span></td>
						<td><span id="lastname1"><?php echo $apellido = 'Velazquez'; ?></span></td>
						<td><span id="address1"><?php echo $direcicon = 'Calle 5'; ?></span></td>
						<td><button type="button" class="btn btn-success edit" value="<?php echo $idb = 17; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>
					</tr>	
				</tbody>
			</table>
		</div>
	</div>	
		<!-- Edit Modal-->
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<center><h4 class="modal-title" id="myModalLabel">Editar usuario</h4></center>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="form-group input-group">
								<span class="input-group-addon" style="width:150px;">Nombres:</span>
								<input type="text" style="width:350px;" class="form-control" id="efirstname">
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon" style="width:150px;">Apellidos:</span>
								<input type="text" style="width:350px;" class="form-control" id="elastname">
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon" style="width:150px;">Dirección:</span>
								<input type="text" style="width:350px;" class="form-control" id="eaddress">
							</div>					
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
						<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </i> Actualizar</button>
					</div>
				</div>
			</div>
		</div>
	<!-- /.modal -->

	<script>
		$(document).ready(function(){
			$(document).on('click', '.edit', function(){
				//var id=$(this).val();
				var first=$('#firstname1').text();
				var last=$('#lastname1').text();
				var address=$('#address1').text();
				// var btn=$('#edit').val();

				$('#edit').modal('show');
				$('#efirstname').val(first);
				$('#elastname').val(last);
				$('#eaddress').val(address);
				// $('#valorBoton').val(btn);
			});
		});
	</script>


</body>
</html>