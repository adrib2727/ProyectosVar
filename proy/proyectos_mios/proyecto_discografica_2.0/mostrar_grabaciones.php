<?php
    require "comprobar_ses.php";
    require_once "conexion_bd.php";
    comprobar_sesion();

    function mostrar_estado(){
        //Instancia de la grabación que se ha escogido.
        $estado = mostrar_estado_grabaciones($_GET["grabacion"]);
        //Conprobación de si me entra o no en la base de datos.
        if($estado === false){
            echo "Error al conectar con la base de datos";
        }else{
            foreach($estado as $campo){
                $est = $campo["estado"];
                //Muestra los campos de la BD.
                echo "<h2>El estado de la grabación es <strong>".$est."</strong>.</h2>";
            }
        }
    }

    function mostrar_categoria(){
        //Instancia de la grabación que se ha escogido.
        $categoria = mostrar_categoria_grabaciones($_GET["grabacion"]);

        //Conprobación de si me entra o no en la base de datos.
        if($categoria === false){
            echo "Error al conectar con la base de datos";
        }else{
            foreach($categoria as $campo){
                $cat = $campo["categoria"];
                echo "<h2>La categoría de la grabación es <strong>".$cat."</strong>.</h2>";
            }
        }
    }

    function mostrar_formato(){
        //Instancia de la grabación que se ha escogido.
        $formato = mostrar_formato_grabaciones($_GET["grabacion"]);

        //Conprobación de si me entra o no en la base de datos.
        if($formato === false){
            echo "Error al conectar con la base de datos";
        }else{
            foreach($formato as $campo){
                $for = $campo["tipo_formato"];
                echo "<h2>El formato de la grabación es <strong>".$for.".</strong></h2>";
            }
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
        }
        #fila1{
            font-family: 'Playfair Display', serif;
        }
        #fila2{
            font-family: 'Playfair Display', serif;
        }
        #titulo1{
            font-family: 'Playfair Display', serif;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php require "cabecera.php";?>
    <div class="container-fluid">
        <div class="row">
            <div class="col bg-light text-center rounded" id="titulo1">
                <?php
                    echo "<h1>Grabación ".$_GET["grabacion"]."</h1>";
                ?>
            </div>
        </div>
        <div class="row" id="fila1">
            <div class="col-4 bg-dark text-danger text-center border rounded">
                <h1>Estado</h1>
            </div>
            <div class="col-4 bg-secondary text-white text-center border rounded">
                <h1>Categoría</h1>
            </div>
            <div class="col-4 bg-dark text-danger text-center border rounded">
                <h1>Formato</h1>
            </div>
        </div>
        <div class="row" id="fila2">
            <div class="col-4 text-center">
                <?php
                    mostrar_estado(); //Llamada a la función.
                ?>
            </div>
            <div class="col-4 text-center">
                <?php
                    mostrar_categoria(); //Llamada a la función.
                ?>
            </div>
            <div class="col-4 text-center">
                <?php
                    mostrar_formato(); //Llamada a la función.
                ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <a class="btn btn-dark mb-2" href="grabaciones.php">Volver a grabaciones</a><br>
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