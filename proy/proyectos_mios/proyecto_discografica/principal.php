<?php 
    /*comprueba que el usuario haya abierto sesión o redirige*/
    require_once "conexion_bd.php";
	require "comprobar_ses.php"; //Accede a la página de comprobar_sesion.
	comprobar_sesion(); //Comprueba la sesión
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Gestor Discográfico</title>
    <style>
        body{
            background-color: lightgrey;
        }
        #titulo{
            font-family: 'Playfair Display', serif;
        }
        #titulo h1{
            font-size: 60px;
        }
        #h12{
            font-family: 'Playfair Display', serif;
            color: black;
        }
    </style>
</head>
<body>
    <?php require "cabecera.php";?>
    <div class="container-fluid">
        <div class="row">
            <div class="col bg-dark text-white text-center rounded mb-1" id="titulo">
                <p class="h1">
                    <h1>GESTOR DISCOGRÁFICO</h1>
                </p>
                <p class="h2" id="h11">
                    ¡Descubre los grandes éxitos de la historia!
                </p>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Accede a cualquiera de las opciones para consultar la información de las grabaciones que disponemos</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-md-8 col-sm-12 bg-secondary text-white text-center rounded border black">
                <p class="h2" id="h12">
                    Consultas disponibles sobre las grabaciones
                </p>
                <p>
                    <a class="btn btn-light mb-2" href="grabaciones.php">Características básicas sobre las grabaciones</a><br>
                    <a class="btn btn-light mb-2" href="interpretes.php">Información sobre los intérpretes</a><br>
                </p>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-10">
                    <div class="row justify-content-around mb-5">
                        <div class="col-md-4">
                            <img class="img-fluid rounded" src="https://wallpapercave.com/wp/HaY10Sc.jpg" alt="">
                        </div>
                        <div class="col-md-4">
                            <img class="img-fluid rounded" src="https://media.gettyimages.com/photos/rock-and-roll-guitarist-chuck-berry-performs-his-duck-walk-as-he-his-picture-id74254318?s=612x612" alt="">
                        </div>
                        <div class="col-md-4">
                            <img class="img-fluid rounded" src="https://img2.goodfon.com/wallpaper/nbig/9/38/metallica-james-hetfield.jpg" alt="">
                        </div>  
                    </div>
                </div>
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