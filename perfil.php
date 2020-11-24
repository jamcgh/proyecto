<?php 
	include __DIR__."/functions/session_helper.php";
	if (isset($_GET)) {
		if (count($_GET) > 0) {
			if (isset($_GET["action"])) {
				switch ($_GET["action"]) {
					case 'delete':
						$perfilJson = file_get_contents(__DIR__."/resources/assets/js/perfil.json");
						$perfilsData = json_decode($perfilJson, true);
						$tmpId = $_GET["id"];
						$perfilsData[$tmpId]["deleted_at"] = date("Y-m-d H:i:s");
						$perfilJson = json_encode($perfilsData, JSON_UNESCAPED_UNICODE);
						file_put_contents(__DIR__."/resources/assets/js/perfil.json", $perfilJson);
						$response = ["rst" => 1, "msj"=>"perfil Eliminado"];
						echo json_encode($response);
						exit;
						break;
					
					default:
						# code...
						break;
				}
			}
			if (isset($_GET["id"])) {
				$perfilJson = file_get_contents(__DIR__."/resources/assets/js/perfil.json");
				$perfilsData = json_decode($perfilJson, true);
				$tmpId = $_GET["id"];
				if (isset($perfilsData[$tmpId])) {
					$perfilsData[$tmpId]["id"] = $tmpId;
					echo json_encode($perfilsData[$tmpId]);
					exit;
				}

			}
		}
	}
	if (isset($_POST)) {
		if (count($_POST) > 0) {
			$perfilJson = file_get_contents(__DIR__."/resources/assets/js/perfil.json");
			$perfilsData = json_decode($perfilJson, true);
			if (isset($_POST["id"]) && $_POST["id"] !="") {
				$tmpId = $_POST["id"];
				$tmpItem = $perfilsData[$tmpId];
				//print_r($tmpItem);
				$perfilsData[$tmpId]["nombre"] = $_POST["nombre"];
				$perfilsData[$tmpId]["codigo"] = $_POST["codigo"];
				$perfilsData[$tmpId]["updated_at"] = date("Y-m-d H:i:s");
				//print_r($tmpItem); exit;
				$perfilJson = json_encode($perfilsData, JSON_UNESCAPED_UNICODE);
				file_put_contents(__DIR__."/resources/assets/js/perfil.json", $perfilJson);
				$response = ["rst" => 1, "msj"=>"perfil Actualizado"];
				echo json_encode($response);
				exit;
			} else {
				$tmpItem = [];
				$tmpItem["nombre"] = $_POST["nombre"];
				$tmpItem["codigo"] = $_POST["codigo"];				
				$tmpItem["created_at"] = date("Y-m-d H:i:s");
				$tmpItem["updated_at"] = "";
				$tmpItem["deleted_at"] = "";

				$size = count($perfilsData);
				$size = $size +1;
				$perfilsData[$size] = $tmpItem;
				$perfilJson = json_encode($perfilsData, JSON_UNESCAPED_UNICODE);
				file_put_contents(__DIR__."/resources/assets/js/perfil.json", $perfilJson);
				$response = ["rst" => 1, "msj"=>"perfil Creado"];
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
		<title>perfiles</title>
	</head>
	<body>
		<?php
			include __DIR__."/resources/views/includes/header.phtml";
		?>
		<div class="container">
			<?php 
				//echo file_get_contents(__DIR__."/resources/assets/js/perfil.json"); exit;
				$perfilJson = file_get_contents(__DIR__."/resources/assets/js/perfil.json");
				$perfilsData = json_decode($perfilJson, true);
			?>
			<div class="box box-primary content-table">
				<h1>Listado de perfiles <div style="width: auto; display: inline-block; float: right;">
					<a href="#" class="btn btn-primary"
						data-toggle="modal"
						data-target="#mdlPerfil">
						<i class="fas fa-plus"></i> Agregar</a>
					</div></h1>
			<div class="table-responsive-md">
  				<table id="table-perfils" class="table table-striped table-bordered nowrap" style="width:100%">
						<thead>
						    <tr>
						      <th>#</th>
						      <th>Nombre</th>
						      <th>Codigo</th>
						      <th>U.Act.</th>
						      <th>[]</th>
						    </tr>
						</thead>
						<tbody>
						  		<?php 
						  			//print_r($perfilsData); exit;
						    		foreach ($perfilsData as $key => $value) {
						    			$tmpIndex = (int)$key;
						    			if ($value["deleted_at"] == "") {
						    	?>
							    <tr>
							      <th><?php echo $tmpIndex;?></th>
							      <td><?php echo $value["nombre"];?></td>
							      <td><?php echo $value["codigo"];?></td>
							      <td><?php echo $value["updated_at"];?></td>
							      <td>
							      	<a href="#"
							      		data-toggle="modal"
							      		data-target="#mdlPerfil"
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
							} ?>
						</tbody>
				</table>
			</div>
			</div>
			
		</div>
		<?php 
			include __DIR__."/resources/views/modal/mdl_perfil.phtml";
		?>
		<?php
			include __DIR__."/resources/views/includes/script.phtml";
			include __DIR__."/resources/views/includes/loading.phtml";
		?>
		<script type="text/javascript">
			var table = $('#table-perfils').DataTable({
			   	"language": {
			        "url": "/Spanish.json"
			    },
			    responsive: true
			});
			$(document).ready(function() {
			    
			 
			    //new $.fn.dataTable.FixedHeader( table );
			} );
		</script>
		<script type="text/javascript" src="js/web/perfil.js"></script>
	</body>
</html>
