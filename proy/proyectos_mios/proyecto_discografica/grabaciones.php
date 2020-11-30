<?php
    require "conexion_bd.php";
    require "comprobar_ses.php";
    comprobar_sesion();
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $estado_grabacion = grabaciones_devolver_estado($_POST["estado"]);

        if($introd_usu === FALSE){
            $error = TRUE;
            $estado = $_POST["estado"];
        }else{
            session_start();
            $_SESSION["estado"] = $estado_grabacion;
            header("Location: mostrar_grabaciones.php");
            return;
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
    <title>Document</title>
    <style>
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <p>
                <div class="col bg-dark text-white text-center rounded mb-2">
                    <p class="display-4">
                        Estado de las grabaciones
                    </p>
                </div>
            </p>
        </div>
        <div class="row justify-content-center">
            <div class="form-group">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <label for="">Escribe el nombre de la grabación que quieras consultar</label>
                    <input type="text" class="form-control" name="estado">
                    <div class="text-right mt-3">
                        <input type="submit" value="Consultar estado">
                    </div>
                </form>
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
