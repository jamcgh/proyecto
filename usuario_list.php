<?php 
	include __DIR__."/functions/session_helper.php";
	if (isset($_GET)) {
		if (count($_GET) > 0) {
			if (isset($_GET["action"])) {
				switch ($_GET["action"]) {
					case 'delete':
						$usuarioJson = file_get_contents(__DIR__."/resources/assets/js/usuario.json");
						$usuariosData = json_decode($usuarioJson, true);
						$tmpId = $_GET["id"];
						$usuariosData[$tmpId]["deleted_at"] = date("Y-m-d H:i:s");
						$usuarioJson = json_encode($usuariosData, JSON_UNESCAPED_UNICODE);
						echo $usuarioJson; exit;
						file_put_contents(__DIR__."/resources/assets/js/usuario.json", $usuarioJson);
						$response = ["rst" => 1, "msj"=>"Usuario Eliminado"];
						echo json_encode($response);
						exit;
						break;
					
					default:
						# code...
						break;
				}
			} elseif (isset($_GET["id"])) {
				$usuarioJson = file_get_contents(__DIR__."/resources/assets/js/usuario.json");
				$usuariosData = json_decode($usuarioJson, true);
				$tmpId = $_GET["id"];
				if (isset($usuariosData[$tmpId])) {
					$usuariosData[$tmpId]["id"] = $tmpId;
					echo json_encode($usuariosData[$tmpId]);
					exit;
				}

			}
		}
	}
	if (isset($_POST)) {
		if (count($_POST) > 0) {
			$usuarioJson = file_get_contents(__DIR__."/resources/assets/js/usuario.json");
			$usuariosData = json_decode($usuarioJson, true);
			if (isset($_POST["id"]) && $_POST["id"] !="") {
				$tmpId = $_POST["id"];
				$tmpItem = $usuariosData[$tmpId];
				//print_r($tmpItem);
				$usuariosData[$tmpId]["nombres"] = $_POST["nombres"];
				$usuariosData[$tmpId]["ape_paterno"] = $_POST["ape_paterno"];
				$usuariosData[$tmpId]["ape_materno"] = $_POST["ape_materno"];
				$usuariosData[$tmpId]["sexo"] = $_POST["sexo"];
				$usuariosData[$tmpId]["carrera"] = $_POST["carrera"];
				$usuariosData[$tmpId]["grado"] = $_POST["grado"];
				$usuariosData[$tmpId]["universidad"] = $_POST["universidad"];
				$usuariosData[$tmpId]["anio_egreso"] = (int)$_POST["anio_egreso"];

				$usuariosData[$tmpId]["updated_at"] = date("Y-m-d H:i:s");
				//print_r($tmpItem); exit;
				$usuarioJson = json_encode($usuariosData, JSON_UNESCAPED_UNICODE);
				file_put_contents(__DIR__."/resources/assets/js/usuario.json", $usuarioJson);
				$response = ["rst" => 1, "msj"=>"Usuario Actualizado"];
				echo json_encode($response);
				exit;
			} else {
				$tmpItem = [];
				$tmpItem["nombres"] = $_POST["nombres"];
				$tmpItem["ape_paterno"] = $_POST["ape_paterno"];
				$tmpItem["ape_materno"] = $_POST["ape_materno"];
				$tmpItem["sexo"] = $_POST["sexo"];
				$tmpItem["carrera"] = $_POST["carrera"];
				$tmpItem["grado"] = $_POST["grado"];
				$tmpItem["universidad"] = $_POST["universidad"];
				$tmpItem["anio_egreso"] = (int)$_POST["anio_egreso"];

				$tmpItem["created_at"] = date("Y-m-d H:i:s");
				$tmpItem["updated_at"] = "";
				$tmpItem["deleted_at"] = "";

				$size = count($usuariosData);
				$size = $size +1;
				$usuariosData[$size] = $tmpItem;
				$usuarioJson = json_encode($usuariosData, JSON_UNESCAPED_UNICODE);
				file_put_contents(__DIR__."/resources/assets/js/usuario.json", $usuarioJson);
				$response = ["rst" => 1, "msj"=>"Usuario Creado"];
				echo json_encode($response);
				exit;
			}
			$response = ["rst" => 2, "msj"=>"Error"];
			echo json_encode($response);
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
			<?php 
				//echo file_get_contents(__DIR__."/resources/assets/js/usuario.json"); exit;
				$usuarioJson = file_get_contents(__DIR__."/resources/assets/js/usuario.json");
				$usuariosData = json_decode($usuarioJson, true);
			?>
			<div class="box box-primary content-table">
				<h1>Listado de Usuarios <div style="width: auto; display: inline-block; float: right;">
					<a href="#" class="btn btn-primary"
						data-toggle="modal"
						data-target="#mdlUsuario">
						<i class="fas fa-plus"></i> Agregar</a>
					</div></h1>
			<div class="table-responsive-md">
  				<table id="table-usuarios" class="table table-striped table-bordered nowrap" style="width:100%">
						<thead>
						    <tr>
						      <th>#</th>
						      <th>Nombres</th>
						      <th>Ape Paterno</th>
						      <th>Ape Materno</th>
						      <th>Sexo</th>
						      <th>U.Act.</th>
						      <th>[]</th>
						    </tr>
						</thead>
						<tbody>
						  	<?php /*
						  			//print_r($usuariosData); exit;
						    		foreach ($usuariosData as $key => $value) {
						    			$tmpIndex = (int)$key;
						    			if ($value["deleted_at"] == "") {
						    	?>
							    <tr>
							      <th><?php echo $tmpIndex;?></th>
							      <td><?php echo $value["nombres"];?></td>
							      <td><?php echo $value["ape_paterno"];?></td>
							      <td><?php echo $value["ape_materno"];?></td>
							      <td><?php echo $value["sexo"];?></td>
							      <td><?php echo $value["updated_at"];?></td>
							      <td>
							      	<a href="#"
							      		data-toggle="modal"
							      		data-target="#mdlUsuario"
							      		class="btn btn-primary"
							      		data-id="<?php echo $key;?>">
							      		<i class="fas fa-pencil-alt"></i>
							      	</a>
							      	<a class="btn btn-danger btn-delete" data-id="<?php echo $key;?>">
							      		<i class="fas fa-trash"></i>
							      	</a>
							      </td>
							    </tr>
							<?php }
							} */?>
						</tbody>
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
			   	"language": {
			        "url": "/Spanish.json"
			    },
			    responsive: true
			});
		</script>
		<script type="text/javascript" src="js/web/usuario_list.js"></script>
	</body>
</html>
