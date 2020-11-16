<?php 
	include __DIR__."/functions/session_helper.php";
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
					      <th>#</th>
					      <th>Nombres</th>
					      <th>Apellidos</th>
					      <th>DNI</th>
					      <th>Sexo</th>
					      <th>[]</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th>1</th>
					      <td>Carlos Augusto</td>
					      <td>Blondet Ríos</td>
					      <td>44008257</td>
					      <td>Masculino</td>
					      <td>
					      	<a href="#" data-toogle="modal" data-target="#mdlUsuario" class="btn btn-primary">
					      		<i class="fas fa-eye"></i>
					      	</a>
					      	<button class="btn btn-danger">
					      		<i class="fas fa-trash"></i>
					      	</button>
					      </td>
					    </tr>
					    <tr>
					      <th>2</th>
					      <td>Edu José</td>
					      <td>Villegas Zea</td>
					      <td>70498969</td>
					      <td>Masculino</td>
					      <td>
					      	<a href="#" data-toogle="modal" data-target="#mdlUsuario" class="btn btn-primary"><i class="fas fa-eye"></i>
					      	</a>
					      	<button class="btn btn-danger">
					      		<i class="fas fa-trash"></i>
					      	</button>
					      </td>
					    </tr>
					    <tr>
					      <th>3</th>
					      <td>Lucía Andrea</td>
					      <td>Quinto Ascurra</td>
					      <td>72446512</td>
					      <td>Femenino</td>
					      <td><a href="#" data-toogle="modal" data-target="#mdlUsuario" class="btn btn-primary"><i class="fas fa-eye"></i></a>
					      	<button class="btn btn-danger">
					      		<i class="fas fa-trash"></i>
					      	</button>
					      </td>
					    </tr>
					  </tbody>
				</table>
			</div>
			</div>
			
		</div>
		<?php
			include __DIR__."/resources/views/includes/script.phtml";
		?>
		<script type="text/javascript">
			var table = $('#table-usuarios').DataTable({
			   	"language": {
			        "url": "/Spanish.json"
			    },
			    responsive: true
			});
			$(document).ready(function() {
			    
			 
			    //new $.fn.dataTable.FixedHeader( table );
			} );
		</script>
	</body>
</html>
