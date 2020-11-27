<?php
    require "conexion_bd.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'cabecera.php';?>
    <h1>Interpretes</h1>
    <h3>Selecciona lo que desees realizar sobre los interpretes: </h3>
    <div id="contenedor_opciones">
        <ul type="none">
            <li>Formato de las grabaciones.</li>
                <ul type="none">
                    <li><a href="">Grabaciones que tienen el formato CD</a></li>
                    <li><a href="">Grabaciones que tienen el formato MP3</a></li>
                    <li><a href="">Grabaciones que tienen el formato WAV</a></li>
                </ul>
            <li>Estado de las grabaciones</li>
                <ul type="none">
                    <li><a href="">Grabaciones en estado BUENO</a></li>
                    <li><a href="">Grabaciones en estado REGULAR</a></li>
                    <li><a href="">Grabaciones es estado MALO</a></li>
                </ul>
            <li>Categoría de las grabaciones</li>
            <ul type="none">
                    <li><a href="">Grabaciones estilo Blues</a></li>
                    <li><a href="">Grabaciones estilo Rock</a></li>
                    <li><a href="">Grabaciones estilo Indie</a></li>
                    <li><a href="">Grabaciones estilo Thrash</a></li>
                    <li><a href="">Grabaciones estilo Heavy</a></li>
                    <li><a href="">Grabaciones estilo Clasica</a></li>
                    <li><a href="">Grabaciones estilo Piano</a></li>
                </ul>
        </ul>
    </div>
    <div id="mostrador_info">

    </div>
    
</body>
</html>