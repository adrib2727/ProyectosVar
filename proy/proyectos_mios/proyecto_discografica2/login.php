<?php
    require "conexion_bd.php";

    if(!empty($_POST["usuario"]) && !empty($_POST["contrasena"])){
        
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
        <form action="login.php" method="post">
            <label for="usuario">Usuario</label>
            <input name="usuario" type="text" id="usuario" placeholder="Introduce el usuario" 
            value="<?php if(isset($usuario)) echo $usuario;?>"><br><br>
            <label for="contrasena">Contraseña</label>
            <input name="contrasena"type="password" id="contrasena" placeholder="Introduce la contraseña"><br><br>
            <input id="boton" type="submit" name="" value="Acceder">
        </form>
        </div>
    </div>
</body>
</html>