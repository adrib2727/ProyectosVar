<?php
require_once 'conexion_bd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
	
	$usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
	if($usu===false){
		$err = true;
		$usuario = $_POST['usuario'];
	}else{
		session_start();
		// $usu tiene campos correo y codRes, correo 
		$_SESSION['usuario'] = $usu;
		header("Location: principal.php");
		return;
	}	
}
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestor Discográfico</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">  
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@200&display=swap" rel="stylesheet">
        <style>
            #titulo{
                text-align: center;
                font-family: 
            }
        </style>
	</head>
	<body>
        <div id="titulo">
            <h1>Acceso al Gestor Discográfico</h1>
        </div>
		<?php if(isset($_GET["redirigido"])){
			echo "<p>Haga login para continuar</p>";
		}?>
		<?php if(isset($err) and $err == true){
			echo "<p> Revise usuario y contraseña</p>";
        }?>
        <div id="formulario">
            <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
                <label for = "usuario">Usuario</label> 
                <input value = "<?php if(isset($usuario))echo $usuario;?>"
                id = "usuario" name = "usuario" type = "text">		
                <label for = "clave">Clave</label> 
                <input id = "clave" name = "clave" type = "password">					
                <input type = "submit">
            </form>
        </div>
		
	</body>
</html>