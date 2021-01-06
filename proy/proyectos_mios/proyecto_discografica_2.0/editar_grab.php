<?php
    require "clases/DiscograficaDB.php";
    require "comprobar_ses.php";
    comprobar_sesion();

    $discografica = new DiscograficaDB();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST["pnombre"]) and !empty($_POST["pestado"])){
            $nombre1 = $_POST["pnombre"];
            $estado1 = $_POST["pestado"];
            /*Comprueba si la grabación introducida está o no en la base de datos*/
            if($nombre1 == $discografica->comprobar_grab($nombre1)){
                $error = false;
                $discografica->modificar_1registro("grabaciones", "estado", $estado1, $nombre1);
            }else{
                $error = true;
            }
        }
        if(!empty($_POST["pnombre"]) and !empty($_POST["pcategoria"])){
            $nombre1 = $_POST["pnombre"];
            $categoria1 = $_POST["pcategoria"];
            /*Comprueba si la grabación introducida está o no en la base de datos*/
            if($nombre1 == $discografica->comprobar_grab($nombre1)){
                $error = false;
                $discografica->modificar_1registro("grabaciones", "categoria", $categoria1, $nombre1);
            }else{
                $error = true;
            }
        }
        if(!empty($_POST["pnombre1"]) and !empty($_POST["pnombre2"])){
            $nombre1 = $_POST["pnombre1"];
            $nombre2 = $_POST["pnombre2"];
            /*Comprueba si la grabación introducida está o no en la base de datos*/
            if($nombre1 == $discografica->comprobar_grab($nombre1)){
                $error = false;
                $discografica->modificar_1registro("grabaciones", "nombre", $nombre2, $nombre1);
            }else{
                $error = true;
            }
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
                    Editar grabaciones
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3">
                <h2 class="subtitulo">Edición de grabaciones y sus características</h2>
                <h3 class="subtitulo">Editar NOMBRE de la grabación</h3>
                <div class="form-group">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <label for="nombre1"><strong>Introduce el NOMBRE de la grabación</strong></label>
                        <input class="form-control" id="nombre1" type="text" name="pnombre1">
                        <label for="nombre2"><strong>Introduce el nuevo NOMBRE de la grabación</strong></label>
                        <input class="form-control" id="nombre2" type="text" name="pnombre2">
                        <input class="btn btn-light mt-2" type="submit" value="Editar">
                    </form>
                </div>
                <h3 class="subtitulo">Editar ESTADO de la grabación</h3>
                <div class="form-group">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <label for="nombre"><strong>Introduce el NOMBRE de la grabación</strong></label>
                        <input class="form-control" id="nombre" type="text" name="pnombre">
                        <label for="estado"><strong>Introduce el nuevo ESTADO de la grabación</strong></label>
                        <input class="form-control" id="estado" type="text" name="pestado">
                        <input class="btn btn-light mt-2" type="submit" value="Editar">
                    </form>
                </div>
                <h3 class="subtitulo mt-3">Editar CATEGORÍA de la grabación</h3>
                <div class="form-group">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <label for="nombre"><strong>Introduce el NOMBRE de la grabación</strong></label>
                        <input class="form-control" id="nombre" type="text" name="pnombre">
                        <label for="categoria"><strong>Introduce la nueva CATEGORIA de la grabación</strong></label>
                        <input class="form-control" id="categoria" type="text" name="pcategoria">
                        <input class="btn btn-light mt-2" type="submit" value="Editar">
                    </form>
                </div>
                <?php
                    /*Bloque que lanza un error si la variable es verdadera, en este caso lanza un mensaje 
                    si la grabación introducida no exíste en la base de datos.*/
                    if(isset($error) and $error == true){
                        echo "<h5 class='subtitulo' style='color:red'><strong>Aviso: Esta grabación no exíste.</strong></h5>";
                    }
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
