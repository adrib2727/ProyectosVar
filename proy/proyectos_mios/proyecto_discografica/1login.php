<?php
    require "base_datos.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $introd_usu = comprobar_usuario($_POST["usuario"], $_POST["contrasena"]);

        if($introd_usu === FALSE){
            $error = TRUE;
            $usuario = $_POST["usuario"];
        }else{
            session_start();
            $_SESSION["usuario"] = $introd_usu;
            header("Location: 2cabecera.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor Discográfico</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">  
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@200&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="1login.css">
</head>
<body>
    <div class="titulo">
        <h1>Gestor Discográfico</h1>
    </div>
    <div class="pestana_login">
        <h3>Acceso corporativo</h3>
        <div id="formulario">
        <form action="">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" placeholder="Introduce el usuario"><br><br>
            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" placeholder="Introduce la contraseña"><br><br>
            <input id="boton" type="submit" name="" value="Acceder">
        </form>
        </div>
    </div>
</body>
</html>