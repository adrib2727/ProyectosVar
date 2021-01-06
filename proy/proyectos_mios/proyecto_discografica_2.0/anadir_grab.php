<?php
    require "clases/DiscograficaDB.php";
    require "comprobar_ses.php";
    comprobar_sesion();

    $discografica = new DiscograficaDB(); //Instancia de la clase DiscograficaDB.

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        /*Comprueba si todos los datos necesarios del formulario existen.*/
        if(!empty($_POST["pnombre"]) and !empty($_POST["pestado"]) and !empty($_POST["pcategoria"])
        and !empty($_POST["pformato"]) and !empty($_POST["pinterprete"]) and !empty($_POST["pcompania"])){
            $error = false;
            $nombre1 = $_POST["pnombre"];
            $estado1 = $_POST["pestado"];
            $categoria1 = $_POST["pcategoria"];
            $formato1 = $_POST["pformato"];
            $interprete1 = $_POST["pinterprete"];
            $compania1 = $_POST["pcompania"];
            /*Comprueba si el nombre de la grabación introducido está ya en la base de datos. Si el nombre
            es distinto a la consulta comprobadora, ejecuta la inserción, sino lanza un mensaje de error.*/
            if($nombre1 != $discografica->comprobar_grab($nombre1)){
                $error2 = false;
                /*Se realiza la instancia de la consulta que añade 6 registros en una tabla. Los parámetros
                que se facilitan son en este caso, el nombre de la tabla grabaciones, los campos nombre, estado y
                categoria y finalmente los datos introducidos en el formulario para ser introducidos en sus 
                respectivas columnas*/
                $discografica->intro_6registros("grabaciones", "nombre", "estado", "categoria", "id_formato_fk", 
                "id_interpretes_fk", "id_compania_fk", $nombre1, $estado1, $categoria1, $formato1, 
                $interprete1, $compania1);
            }else{
                $error2 = true;
            }
        }else{
            $error = true;
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
                    Añadir grabaciones
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3">
                <h2 class="subtitulo">Introducir grabación y sus características</h2>
                <div class="form-group">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <label for="nombre"><strong>Introduce el NOMBRE de la grabación</strong></label>
                        <input class="form-control" id="nombre" type="text" name="pnombre">
                        <label for="estado"><strong>Introduce el ESTADO de la grabación</strong></label>
                        <input class="form-control" id="estado" type="text" name="pestado">
                        <label for="categoria"><strong>Introduce la CATEGORIA de la grabación</strong></label>
                        <input class="form-control" id="categoria" type="text" name="pcategoria">
                        <label for="formato"><strong>Introduce el FORMATO de la grabación</strong></label>
                        <select class="form-select mt-2" name="pformato" id="formato" value="">
                            <option value="1">MP3</option>
                            <option value="2">FLAK</option>
                            <option value="3">WAV</option>
                            <option value="4">AVI</option>
                            <option value="5">FLAP</option>
                        </select><br>
                        <label for="interprete"><strong>Introduce el INTÉRPRETE participante</strong></label>
                        <select name="pinterprete" id="interprete" value="">
                            <option value="1">Angus Young</option>
                            <option value="2">Kirk Hammett</option>
                            <option value="3">Malcolm Young</option>
                            <option value="4">Axl Rose</option>
                            <option value="5">Slash</option>
                            <option value="6">Chuck Berry</option>
                            <option value="7">Flea</option>
                            <option value="8">James Hetfield</option>
                            <option value="9">Beethoven</option>
                            <option value="10">David Lee</option>
                            <option value="11">Phil Rudd</option>
                            <option value="12">Pucho</option>
                        </select><br>
                        <label for="compania"><strong>Introduce la COMPAÑÍA productora</strong></label>
                        <select name="pcompania" id="compania" value="">
                            <option value="1">RCA Records</option>
                            <option value="2">Columbia Records</option>
                            <option value="3">MCA Records</option>
                            <option value="5">Epic Records</option>
                            <option value="6">Polygram</option>
                            <option value="8">EXO</option>
                            <option value="9">Island Records</option>
                            <option value="10">WEA</option>
                        </select><br>
                        <input class="btn btn-light mt-2" type="submit" value="Añadir">
                    </form>
                </div>
                <?php
                    /*Bloques que lanzan un error si las variables de error son verdaderas. En el primer caso
                    informa que una grabación ya ha sido introducida y en el segundo caso informa que algun 
                    dato necesario en el formulario no ha sido introducido.*/
                    if(isset($error2) and $error2 == true){
                        echo "<h6 class='subtitulo' style='color:red'><strong>Aviso: Esta grabación ya está registrada.</strong></h6>";
                    }
                    if(isset($error) and $error == true){
                        echo "<h6 class='subtitulo' style='color:red'><strong>Aviso: Algún dato no ha sido introducido.</strong></h6>";
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
