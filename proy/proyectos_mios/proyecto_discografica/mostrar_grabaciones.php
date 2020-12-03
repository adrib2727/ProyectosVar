<?php
    require "comprobar_ses.php";
    require_once "conexion_bd.php";
    comprobar_sesion();
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
            background-color: lightyellow;
        }
        #fila1{
            font-family: 'Major Mono Display', monospace;
        }
        #fila2{
            font-family: 'Zilla Slab', serif;
        }
        #titulo1{
            font-family: 'Major Mono Display', monospace;
            border: 1px solid black;
        }
        .boton_volver{
            text-decoration: none;
            font-family: 'Zilla Slab', serif;
            font-size: 25px;
            border: 1px solid black;
            border-radius: 5px;
            background-color: white;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col bg-warning text-center rounded" id="titulo1">
                <?php
                    echo "<h2>Grabación ".$_GET["grabacion"]."</h2>";
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
                    //Instancia de la grabación que se ha escogido.
                    $estado = mostrar_estado_grabaciones($_GET["grabacion"]);

                    //Conprobación de si me entra o no en la base de datos.
                    if($estado === false){
                        echo "Error al conectar con la base de datos";
                    }else{
                        foreach($estado as $campo){
                            $est = $campo["estado"];
                            echo "<h2>El estado de la grabación es <strong>".$est."</strong>.</h2>";
                        }
                    }
                ?>
            </div>
            <div class="col-4 text-center">
                <?php
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
                ?>
            </div>
            <div class="col-4 text-center">
                <?php
                    //Instancia de la grabación que se ha escogido.
                    $formato = mostrar_formato_grabaciones($_GET["grabacion"]);

                    //Conprobación de si me entra o no en la base de datos.
                    if($formato === false){
                        echo "Error al conectar con la base de datos";
                    }else{
                        foreach($formato as $campo){
                            $for = $campo["tipo_formato"];
                            echo "<h2>La categoría de la grabación es <strong>".$for.".</strong></h2>";
                        }
                    }
                ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <a class="boton_volver" href="grabaciones.php">Volver a grabaciones</a><br>
                <a class="boton_volver" href="principal.php">Volver a la página principal</a><br>
                <a class="boton_volver" href="logout.php">Cerrar sesión</a>
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