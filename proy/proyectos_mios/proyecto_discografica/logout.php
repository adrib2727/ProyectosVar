<?php
	require "comprobar_ses.php";	
	comprobar_sesion();
	$_SESSION = array();
	session_destroy();
	setcookie(session_name(), 123, time() - 1000);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    	integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.gstatic.com">
    	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">	
		<title>Sesión cerrada</title>
		<style>
			body{
				background-color: lightgrey;
			}
			h1{
				font-family: 'Playfair Display', serif;
        	}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-sm-6 col-md-4 bg-dark mt-5 pt-2 text-white rounded text-center border">
					<p>
						<h1>La sesión se cerró correctamente, hasta la próxima.</h1>
					</p>
					<p>
						<a class="btn btn-light" href = "login.php">Volver al Login</a>
					</p>	
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
			integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
			integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
		</script>

	</body>
</html>