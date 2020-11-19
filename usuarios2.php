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
			<?php 
				//echo file_get_contents(__DIR__."/resources/assets/js/usuario.json"); exit;
				$usuariosData = json_decode(file_get_contents(__DIR__."/resources/assets/js/usuarios2.json"), true);
			?>
			<div class="box box-primary content-table">
				<h1>Listado de Usuarios</h1>
			<div class="table-responsive-md">
  				<table id="table-usuarios" class="table table-striped table-bordered nowrap" style="width:100%">
					  <thead>
					    <tr>
					      <th>#</th>
					      <th>Nombres y Apellidos</th>
					      <th>Usuario</th>
					      <th>DNI</th>
					      <th>Perfil</th>
					      <th>Sexo</th>
					      <th>[]</th>
					    </tr>
					  </thead>
					  <tbody>
					  		<?php 
					  			//print_r($usuariosData); exit;
					    		foreach ($usuariosData as $key => $value) {
					    	?>
						    <tr>
						      <th><?php echo $key;?></th>
						      <td><?php echo $value["nombres"] . " " . $value["ape_paterno"] . " " . $value["ape_materno"];?></td>
						      <td><?php echo $value["usuario"];?></td>
						      <td><?php echo $value["dni"];?></td>
						      <td><?php echo $value["perfil"];?></td>
						      <td><?php echo $value["sexo"];?></td>
						      <td>
						      	<a href="#" data-toggle="modal" data-target="#mdlUsuario" class="btn btn-primary">
						      		<i class="fas fa-eye"></i>
						      	</a>
						      	<button class="btn btn-danger">
						      		<i class="fas fa-trash"></i>
						      	</button>
						      </td>
						    </tr>
						<?php } ?>
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
