<?php
    require "conexion_bd.php";
    require "comprobar_ses.php";
    comprobar_sesion();

    function mostrar_grabaciones(){
        $lista_grabaciones = titulos_grabaciones();
        if($lista_grabaciones === false){
            echo "No se ha podido conectar con la BD";
        }else{
            echo "<ul type='none'>"; //Abre la lista de las opciones.
            //Bucle que recore los campos de la base de datos.
            foreach($lista_grabaciones as $lista){
                //Redirige hacia mostrar_grabaciones según la grabación escogida.
                $numero_grab = "mostrar_grabaciones.php?grabacion=".$lista["id_grabacion"];
                echo "<li><a class='btn btn-light mb-2' href='$numero_grab'>"."<strong>".$lista["titulo"]."</strong>"."</a></li>";
            }
            echo "</ul>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Grabaciones</title>
    <style>
        body{
            background-color: lightgray;
            font-family: 'Playfair Display', serif;
        }
        
    </style>
</head>
<body>
    <?php require "cabecera.php";?>
    <div class="container-fluid">
        <div class="row">
            <div class="col bg-dark text-white text-center rounded mb-2" id="titulo">
                <p class="display-4">
                    Características básicas de las grabaciones
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 text-center" id="subtitulo">
                <h2>Listado de las grabaciones que puedes consultar</h2>
                <!-- Código PHP que muestra los títulos de las grabaciones. -->
                <?php
                    mostrar_grabaciones(); //Llamada a la función.
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-dark mb-2" href="principal.php">Página principal</a>        
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
