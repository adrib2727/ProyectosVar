<?php
    require "conexion_bd.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $introd_usu = comprobar_usuario($_POST["usuario"], $_POST["contrasena"]);

        if($introd_usu === FALSE){
            $error = TRUE;
            $usuario = $_POST["usuario"];
        }else{
            session_start();
            $_SESSION["usuario"] = $introd_usu;
            header("Location: principal.php");
            return;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor Discográfico</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">  
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@200&display=swap" rel="stylesheet">    
    <style>
        body{
            background-color: #5F626A;
        }
        .titulo{
            color: white;
            text-align: center;
            margin-top: 10%;
            font-family:'Cabin', sans-serif;
            font-size: x-large;
        }
        .pestana_login{
            border-radius: 10px;
            background-color: white;
            border: 1px solid black;
            font-family: 'Libre Franklin', sans-serif;
            margin-right: 25%;
            margin-left: 25%;
            box-shadow: 3px 2px 2px 0px;
        }
        .pestana_login h3{
            text-align: center;
            color: black;
        }
        #formulario{
            margin-left: 5%;
            font-size: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
        #formulario input{
            height: 30px;
            border-radius: 5px;
        }
        #usuario{
            width: 40%;
        }
        #contrasena{
            width: 40%;
        }
        #boton{
            font-size: 20px;
            font-family: 'Libre Franklin', sans-serif;
            background-color: #325BBF;
            color: white;
        }
        
    </style>
</head>
<body>
    <div class="titulo">
        <h1>Gestor Discográfico</h1>
    </div>
    <div class="pestana_login">
        <h3>Acceso corporativo</h3>
        <div id="formulario">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> "method="POST">
            <label for="usuario">Usuario</label>
            <input name="usuario" type="text" id="usuario" placeholder="Introduce el usuario" 
            value="<?php if(isset($usuario)) echo $usuario;?>"><br><br>
            <label for="contrasena">Contraseña</label>
            <input name="contrasena"type="password" id="contrasena" placeholder="Introduce la contraseña"><br><br>
            <input id="boton" type="submit" name="" value="Acceder">
        </form>
        </div>
        <div>
            <?php if(isset($_GET["redirigido"])){
                echo "<p>Haz login para continuar</p>";
            }
            ?>
        </div>
        <div>
            <?php
                if(isset($error) and $error == true){
                    echo "<h4>Revise usuario y contraseña</h4>";
                }
            ?>
        </div>
    </div>
</body>
</html>