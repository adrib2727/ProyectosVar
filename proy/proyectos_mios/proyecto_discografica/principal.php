<?php 
    /*comprueba que el usuario haya abierto sesión o redirige*/
    require_once "conexion_bd.php";
	require "comprobar_ses.php"; //Accede a la página de comprobar_sesion.
	comprobar_sesion(); //Redirige al login.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">  
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@200&display=swap" rel="stylesheet">  
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Xanh+Mono&display=swap" rel="stylesheet">
    <title>Gestor Discográfico</title>
    <style>
        body{
            background-color: lightgrey;
        }
        #titulo{
            background-color: #5F626A;
            border: 1px solid black;
            width: 90%;
            text-align: center;
            margin: 0 auto 0 auto; /*En este caso el auto es un 5%*/
            color: white;
            width: 100%;
            border-radius: 5px;
            box-shadow: 2px 2px 1px 0px;
        }
        #h1primero{
            text-align: center;
            font-family: 'Xanh Mono', monospace;
            font-size: 50px;
        }
        #titulo h2{
            font-family: 'Libre Franklin', sans-serif;
        }
        #cabeceraLa{
            float:left;
            background-color: black;
            padding-bottom: 27%;
            margin-top: 5px;
            border-radius: 5px;
            text-align: center;
        }
        #cabeceraLa a{
            font-family: 'Libre Franklin', sans-serif;
            text-decoration: none;
            font-size: 30px;
            border: 1px solid white;
            border-radius: 5px;
            color: white;
            margin-right: 5px;
        }
        #cabeceraLa ul{
            padding-left: 5px;
        }
        #cabeceraLa li{
            list-style: none;
            margin-bottom: 15px;
            margin-left: 5px;
            margin-right: 8px;
        }
        #cuerpo{
            float: left;
            background-color: #9F4545;
            margin-left: 5.3px;
            margin-top: 5px;
            width: 82.9%;
            border-radius: 5px;
            font-family: 'Libre Franklin', sans-serif;
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>
    <div id="titulo">
        <h1 id="h1primero">GESTOR DISCOGRÁFICO</h1>
        <h2>!Bienvenido! Accede para consultar datos del mundo de la música</h2>
    </div>
    <div id="cabeceraLa">
        <ul type="none">
            <li><a href="grabaciones.php">Grabaciones</a></li>
            <li><a href="interpretes.php">Interpretes</a></li>
            <li><a href="companias.php">Compañías</a></li>
            <li ><a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </div>
    <div id="cuerpo">
            <h2>Descubre todo lo que quieras saber acerca de las grabaciones.</h2>
            <h2>Conoce a nuestros interpretes, ¡Adelante!.</h2>
            <h2>Selecciona si prefieres saber acerca de las principales compañías.</h2>
    </div>
</body>
</html>