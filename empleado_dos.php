<?php 
	include __DIR__."/functions/session_helper.php";
	if (isset($_POST)) {
		if (count($_POST) > 0) {
			$empleadoJson = file_get_contents(__DIR__."/resources/assets/js/ajax_empleado_dos.json");
			$empleadosData = json_decode($empleadoJson, true);
			echo json_encode($empleadosData);
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
		<title>Empleados</title>
	</head>
	<body>
		<?php
			include __DIR__."/resources/views/includes/header.phtml";
		?>
		<div class="container">
			<div class="box box-primary content-table">
				<h1>Listado de Empleados <div style="width: auto; display: inline-block; float: right;">
					<a href="#" class="btn btn-primary"
						data-toggle="modal"
						data-target="#mdEmpleado
						">
						<i class="fas fa-plus"></i> Agregar</a>
					</div></h1>
				<div class="table-responsive-md">
	  				<table id="table-empleados-dos" class="table table-striped table-bordered nowrap" style="width:100%">
						<thead>
				            <tr>
				                <th>Nombre</th>
				                <th>Apellido</th>
				                <th>Cargo</th>
				                <th>Sede</th>
				                <th>Inicio</th>
				                <th>Sueldo</th>
				            </tr>
				        </thead>
				        <tfoot>
				            <tr>
								<th>Nombre</th>
				                <th>Apellido</th>
				                <th>Cargo</th>
				                <th>Sede</th>
				                <th>Inicio</th>
				                <th>Sueldo</th>
				            </tr>
				        </tfoot>
					</table>
				</div>
			</div>
		</div>
		<?php 
			include __DIR__."/resources/views/modal/mdl_empleado.phtml";
		?>
		<?php
			include __DIR__."/resources/views/includes/script.phtml";
			include __DIR__."/resources/views/includes/loading.phtml";
		?>
		<script type="text/javascript">
			var table = $('#table-empleados').DataTable({
		        "ajax": 'resources/assets/js/ajax_empleado.json',
		        responsive: true
		    });

		    var tableDos = $('#table-empleados-dos').DataTable( {
		        "processing": true,
		        "serverSide": true,
		        "responsive" : true,
		        "ajax": {
		            "url": "empleado_dos.php",
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
