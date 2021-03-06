<?php
    require "clases/DiscograficaDB.php";
    require "clases/CreacionTabla.php";
    require "comprobar_ses.php";
    comprobar_sesion();
    $discografica = new DiscograficaDB();
    $creaTablas = new CreacionTabla();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/edicion_estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos/grabaciones_estilo.css">
    <title>Consulta de grabaciones</title>
</head>
<body>
    <?php require "cabecera.php";?> <!-- Llamada a la cabecera -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <?php
                    /*Bloque que ejecuta la visualización de la tabla con los datos registrados en la aplicación.
                    En primer lugar la variable $sentencia tiene almacenada la consulta que se realiza 
                    (mostrar_interpretes), seguidamente se crea la variable $matriz que almacena el método
                    que crea la matríz, tiene como paŕametro la sentencia SQL necesaria para la consulta. 
                    Finalmente se muestra en pantalla el método tabla_de2, método que dibuja la tabla, tiene como
                    parámetro la matríz previamente creada.*/
                    $sentencia = $discografica->mostrar_interpretes();
                    $matriz = $creaTablas->interpretes($sentencia);
                    echo $creaTablas->tabla_de2($matriz);
                ?>
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