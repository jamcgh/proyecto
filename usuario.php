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
  				<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Nombres</th>
					      <th scope="col">Apellidos</th>
					      <th scope="col">DNI</th>
					      <th scope="col">Sexo</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">1</th>
					      <td>Carlos Augusto</td>
					      <td>Blondet Ríos</td>
					      <td>44008257</td>
					      <td>Masculino</td>
					    </tr>
					    <tr>
					      <th scope="row">2</th>
					      <td>Edu José</td>
					      <td>Villegas Zea</td>
					      <td>70498969</td>
					      <td>Masculino</td>
					    </tr>
					    <tr>
					      <th scope="row">2</th>
					      <td>Lucía Andrea</td>
					      <td>Quinto Ascurra</td>
					      <td>72446512</td>
					      <td>Femenino</td>
					    </tr>
					  </tbody>
				</table>
			</div>
			</div>
			
		</div>
		<?php
			include __DIR__."/resources/views/includes/script.phtml";
		?>
	</body>
</html>
