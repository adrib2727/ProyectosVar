<?php
    require "comprobar_ses.php";
    require_once "conexion_bd.php";
    comprobar_sesion();

    //Función que muestra la pequeña descripción de los intérpretes.
    function texto_mostrar(){
        //Instancia de la grabación que se ha escogido.
        $mostrar1 = mostrar_nombre_interpretes($_GET["interprete"]);
        $mostrar2 = mostrar_descripcion_interpretes($_GET["interprete"]);
        $mostrar3 = mostrar_numero_grabaciones($_GET["interprete"]);
        $mostrar4 = mostrar_cuantas_grabaciones_tiene_interprete($_GET["interprete"]);
        $mostrar5 = mostrar_temas($_GET["interprete"]);

        //Conprobación de si me entra o no en la base de datos.
        if($mostrar1 === false or $mostrar2 === false or $mostrar3 === false or $mostrar4 === false){
            echo "Error al conectar con la base de datos";
        }else{
            foreach($mostrar1 as $campo){
                $nombre = $campo["nombre"];
                echo "<h4>El nombre el intérprete es ".$nombre;
            }
            foreach($mostrar2 as $campo){
                $descripcion = $campo["descripcion"];
                echo ", encargado de realizar las ".$descripcion.". ";
            }
            foreach($mostrar3 as $campo){
                $numero_grab = $campo["COUNT(titulo)"];
                //Si devulve solamente un dato, ejecuta esa frase, si no en plural.
                if($numero_grab == 1){
                    echo "Este artísta, ha contribuido a nuestro proyecto dotándonos de ".$numero_grab." grabación, la cual ha   sido: ";
                }else{
                    echo "Este artísta, ha contribuido a nuestro proyecto dotándonos de ".$numero_grab." grabaciones, las cuales han sido: ";
                }
            }
            foreach($mostrar4 as $campo){
                $que_grab = $campo["titulo"];
                echo " ".$que_grab.". ";
            }
            echo "Además, ha contribuido en los temas: ";
            foreach($mostrar5 as $campo){
                $tema = $campo["nombre_tema"];
                echo $tema."</h4>";
            }
        }
    }

    //Función que muestra el nombre del intérprete.
    function mostrar_titulo(){
        $mostrar1 = mostrar_nombre_interpretes($_GET["interprete"]);
        foreach($mostrar1 as $campo){
            $nombre = $campo["nombre"];
            echo "<h1>".$nombre."</h1>";
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
    <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
    <title>Estado de grabación</title>
    <style>
        body{
            background-color: lightgrey;
        }
        #titulo{
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body>
    <?php require "cabecera.php";?>
    <div class="container-fluid">
        <div class="row">
            <div class="col mb-5"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-center bg-dark text-white" id="titulo">
                <?php
                    mostrar_titulo(); //Llamada a la función.
                    texto_mostrar(); //Llamada a la función.
                ?>
            </div>
            
        </div>
        
        <div class="row mt-5">
            <div class="col">
                <a class="btn btn-dark mb-2" href="interpretes.php">Volver a interpretes</a><br>
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