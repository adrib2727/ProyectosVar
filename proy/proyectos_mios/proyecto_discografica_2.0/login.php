<?php
    session_start();
    require "clases/DiscograficaDB.php";
    $discografica = new DiscograficaDB();

    //Asegura si los datos del formulario han sido traspasados.
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($discografica->comprobar_usuario($_POST["usuario"], $_POST["contrasena"])){
            $_SESSION["usuario"] = $_POST["usuario"];
            header("location: principal.php");
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
    <title>Document</title>
    <style>
        body{
            background-color: lightgray;
        }
        h1{
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4 bg-dark mt-5 pt-2 text-white rounded text-center border">
                <h1>GESTOR DISCOGRÁFICO</h1>
                <div class="form-group">
                    <!-- Los datos del formulario son redirigidos hacia la misma página, en concreto el
                    código PHP definido en el comienzo de la página. -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <label for="">Usuario</label>
                        <input type="text" name="usuario" class="form-control" placeholder="Escribe tu usuario">
                        <label for="">Contraseña</label>
                        <input type="password" name="contrasena" class="form-control" placeholder="Escribe tu contraseña">
                        <?php
                            //Bloque que se ejecuta en el caso de introducir los datos erroneos.
                            if(isset($error) and $error == true){
                                echo "Revise usuario y contraseña";
                            }
                        ?>
                        <?php 
                            /*Código que redirige al login en caso de no haber entrado por él o en caso
                            de que la cookie se haya agotado.*/
                            if(isset($_GET["redirigido"])){
                            echo "<p>Haga login para continuar</p>";
                            }
                        ?>
                        <div class="text-right mt-3">
                            <input type="submit" class="btn btn-secondary" value="Acceder">
                        </div>
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
