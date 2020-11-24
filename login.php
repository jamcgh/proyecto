<?php 
	session_start();
	if (isset($_POST) && count($_POST) > 0) {
				$json = file_get_contents(__DIR__."/resources/assets/js/login.json");
				$jsonLogin = json_decode(file_get_contents(__DIR__."/resources/assets/js/login.json"), true);
				
				if (isset($jsonLogin["user"]) && isset($jsonLogin["password"])) {
					$userPost = $_POST["user"];
					$passwordPost = $_POST["password"];
					if ($userPost == $jsonLogin["user"] && $passwordPost == $jsonLogin["password"]) {
						$_SESSION["user"] = [1];
						$_SESSION["user"]["name"] = $userPost;
						unset($_POST["user"]);
						unset($_POST["password"]);
						$response = ["rst" => 1, "msj" => "Haz accedido Correctamente"];
						echo json_encode($response); exit;
						//header("Location: home.php");
					} else {
						$response = ["rst" => 2, "msj" => "Tus credenciales son Incorrectas!!!"];
						echo json_encode($response); exit;
					}
				}
			
				
		}
	if (session_status()) {
		if (isset($_SESSION["user"])) {
			header("Location: home.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mi Login</title>
	<style type="text/css">
		h1{
			text-align: center;
    		font-size: 1.75rem !important;
		}
		.container{
			width: 40%;
		    display: block;
		    margin: 0px auto;
		}
		body{
			background-image: url(img/market.jpg);
		    background-repeat: no-repeat;
		    background-size: cover;
		    background-position: center top;
		}
		.content-login{
			position: absolute;
		    top: 10%;
		    left: calc(50% - 350px);
		    background-color: rgb(0, 123, 255, 0.5);
		    padding: 10px 5px;
		    border-radius: 10px;
		    box-shadow: 2px 2px 2px #cacaca;
		    color: #fff;
		}
	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
</head>
<body class="login">
	<div class="content-login">
		<h1>Acceso al Sistema</h1>
		<div class="container">
			<form action="login.php" method="POST" id="form-login">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Usuario*</label>
						<input type="text" name="user" required class="form-control" minlength="3" maxlength="20" />
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Contraseña*</label>
						<input type="password" name="password" required class="form-control" minlength="8" maxlength="20">
					</div>
				</div>
				<div  class="col-md-12">
					<button type="submit" class="btn btn-primary">Ingresar</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/sweetalert2.all.min.js"></script>
	<script type="text/javascript">
		$("#form-login").submit(function() {
			
			$.ajax({
				type : $("#form-login").attr("method"),
				url : $("#form-login").attr("action"),
				data : $("#form-login").serialize(),
				success : function(obj){
					console.log(obj);
					console.log(JSON.parse(obj));
					var obj2 = JSON.parse(obj);
					if (parseInt(obj2.rst) == 1) {
						Swal.fire(
						  'Muy Bien!',
						  obj2.msj,
						  'success'
						);
						setTimeout(function() {
							window.location.href="home.php";
						}, 500);
					} else {
						Swal.fire({
						  icon: 'error',
						  title: 'Oops...',
						  text: obj2.msj,
						  footer: '<a href>Why do I have this issue?</a>'
						});
					}
					/*
					*/
					
				}
			});
			return false;
		});
	</script>
</body>
</html>