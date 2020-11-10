<!DOCTYPE html>
<html>
<head>
	<title>Mi Login</title>
	<style type="text/css">
		h1{
			text-align: center;
    		font-size: 2.5rem;
		}
		.container{
			width: 40%;
		    display: block;
		    margin: 0px auto;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<h1>Acceso al Sistema</h1>
	<div class="container">
		<form action="login.php" method="POST">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Usuario*</label>
					<input type="text" name="" required class="form-control" minlength="3" maxlength="8" />
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Contraseña*</label>
					<input type="password" name="" required class="form-control" minlength="8" maxlength="12">
				</div>
			</div>
			<div  class="col-md-12">
				<button type="submit" class="btn btn-primary">Ingresar</button>
			</div>
		</div>
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>