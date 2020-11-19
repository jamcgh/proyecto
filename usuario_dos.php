<?php 
	include __DIR__."/functions/session_helper.php";
	if (isset($_POST)) {
		if (count($_POST) > 0) {
			$usuarioJson = file_get_contents(__DIR__."/resources/assets/js/ajax_data_dos.json");
			$usuariosData = json_decode($usuarioJson, true);
			echo json_encode($usuariosData);
			exit;
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php
			include __DIR__."/resources/views/includes/head.phtml";
		?>
		<title>Usuarios</title>
	</head>
	<body>
		<?php
			include __DIR__."/resources/views/includes/header.phtml";
		?>
		<div class="container">
			<div class="box box-primary content-table">
				<h1>Listado de Usuarios</h1>
				<div class="table-responsive-md">
	  				<table id="table-usuarios" class="table table-striped table-bordered nowrap" style="width:100%">
						<thead>
				            <tr>
				                <th>Name</th>
				                <th>Position</th>
				                <th>Office</th>
				                <th>Extn.</th>
				                <th>Start date</th>
				                <th>Salary</th>
				            </tr>
				        </thead>
				        <tfoot>
				            <tr>
				                <th>Name</th>
				                <th>Position</th>
				                <th>Office</th>
				                <th>Extn.</th>
				                <th>Start date</th>
				                <th>Salary</th>
				            </tr>
				        </tfoot>
					</table>
				</div>
			</div>
			<hr>
			<div class="box box-primary content-table">
				<h1>Listado de Usuarios <div style="width: auto; display: inline-block; float: right;">
					<a href="#" class="btn btn-primary"
						data-toggle="modal"
						data-target="#mdlUsuario">
						<i class="fas fa-plus"></i> Agregar</a>
					</div></h1>
				<div class="table-responsive-md">
	  				<table id="table-usuarios-dos" class="table table-striped table-bordered nowrap" style="width:100%">
						<thead>
				            <tr>
				                <th>First name</th>
				                <th>Last name</th>
				                <th>Position</th>
				                <th>Office</th>
				                <th>Start date</th>
				                <th>Salary</th>
				            </tr>
				        </thead>
				        <tfoot>
				            <tr>
				                <th>First name</th>
				                <th>Last name</th>
				                <th>Position</th>
				                <th>Office</th>
				                <th>Start date</th>
				                <th>Salary</th>
				            </tr>
				        </tfoot>
					</table>
				</div>
			</div>
		</div>
		<?php 
			include __DIR__."/resources/views/modal/mdl_usuario.phtml";
		?>
		<?php
			include __DIR__."/resources/views/includes/script.phtml";
			include __DIR__."/resources/views/includes/loading.phtml";
		?>
		<script type="text/javascript">
			var table = $('#table-usuarios').DataTable({
		        "ajax": 'resources/assets/js/ajax_data.json',
		        responsive: true
		    });

		    var tableDos = $('#table-usuarios-dos').DataTable( {
		        "processing": true,
		        "serverSide": true,
		        "responsive" : true,
		        "ajax": {
		            "url": "usuario_dos.php",
		            "type": "POST"
		        },
		        "columns": [
		            { "data": "first_name" },
		            { "data": "last_name" },
		            { "data": "position" },
		            { "data": "office" },
		            { "data": "start_date" },
		            { "data": "salary" }
		        ]
		    } );
		</script>
	</body>
</html>
