<?php
    require "clases/DiscograficaDB.php";
    require "comprobar_ses.php";
    comprobar_sesion();

    $discografica = new DiscograficaDB();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST["pnombre"])){
            $nombre1 = $_POST["pnombre"];
            //Se añaden los datos procedentes del POST.
            $discografica->eliminar_1fila("grabaciones", "$nombre1");
        }
    }
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
    <title>Grabaciones</title>
</head>
<body>
    <?php require "cabecera.php";?> <!-- Llamada a la cabecera -->
    <div class="container-fluid">
        <div class="row justify-content-center mt-3">
            <div id="borde1" class="col-md-4 text-center mt-2 rounded bg-white">
                <div class="h1">
                    Eliminar grabaciones
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3">
                <h2 class="subtitulo">Eliminación de grabaciones y sus características</h2>
                <div class="form-group">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <label for="nombre"><strong>Introduce el NOMBRE de la grabación a eliminar</strong></label>
                        <input class="form-control" id="nombre" type="text" name="pnombre">
                        <input class="btn btn-light mt-2" type="submit" value="Eliminar">
                    </form>
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
