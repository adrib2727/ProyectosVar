<?php
    require "conexion_bd.php";
    require "comprobar_ses.php";
    comprobar_sesion();

    function mostrar_nombres(){
        $lista_interpretes = titulos_interpretes();
        if($lista_interpretes === false){
            echo "No se ha podido conectar con la BD";
        }else{
            echo "<ul type='none'>"; //Abre la lista de las opciones.
            foreach($lista_interpretes as $lista){
                //Redirige hacia mostrar_interpretes según el intérprete escogido.
                $numero_inter = "mostrar_interpretes.php?interprete=".$lista["id_interprete"];
                echo "<li><a class='btn btn-light mb-2' href='$numero_inter'>"."<strong>".$lista["nombre"]."</strong>"."</a></li>";
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
    <title>Intérpretes</title>
    <style>
        body{
            background-color: lightgrey;
            font-family: 'Playfair Display', serif;
        }
    </style>
    <style>
        
    </style>
</head>
<body>
    <?php require "cabecera.php";?>
    <div class="container-fluid">
        <div class="row">
            <p>
                <div class="col bg-dark text-white text-center rounded mb-2">
                    <p class="display-4" id="titulo">
                        Intérpretes
                    </p>
                </div>
            </p>
        </div>
        <div class="row">
        <div class="col-1"></div>
            <div class="col-10 text-center">
                <h2 id="subtitulo">Artistas registrados en nuestro sistema: </h2>
                <!-- Código PHP que muestra los títulos de las grabaciones. -->
                <?php
                    mostrar_nombres(); //Llamada a la función.
                ?>
            </div>
            <div class="row">
                <div class="col">
                    <a class="btn btn-dark mb-2 ml-2" href="principal.php">Página principal</a><br>
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
