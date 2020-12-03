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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            background-color: lightblue;
        }
        .enlaces{
            text-decoration: none;
            font-size: 20px;
            color: white;
            border: 2px solid black;
            border-radius: 5px;
            background-color: white;
            color: black;
            decoration: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col bg-dark text-white text-center rounded mb-2">
                <p class="h1">
                    Consultor discográfico
                </p>
                <p class="h2">
                    ¡Bienvenido!
                </p>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Accede a cualquiera de las opciones para consultar la información de una grabaciones</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 bg-secondary text-white text-center rounded border black">
                <p class="h2">
                    Consultas disponibles sobre las grabaciones
                </p>
                <p>
                    <a class="enlaces" href="grabaciones.php">Realizar consulta sobre el estado de las grabaciones</a><br>
                    <a class="enlaces" href="interpretes.php">Realizar consulta sobre el intérprete participante en la grabación</a><br>
                    <a class="enlaces" href="temas.php">Realizar consluta sobre el tema asignado a la grabación</a><br>
                </p>
            </div>
            <div class="col-2"></div>
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