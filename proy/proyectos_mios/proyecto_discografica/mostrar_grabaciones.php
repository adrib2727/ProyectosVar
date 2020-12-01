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
    <title>Estado de grabación</title>
</head>
<body>
    <?php
        $muestra_estado = grabaciones_devolver_estado($_GET["estado"]); //Este GET se refiere a lo que devuelve la función.

        if($muestra_estado === FALSE){ //Si el parámetro de la función nno da nada, se ejecuta lo de dentro.
            echo "<p class='error'>Error al conectar con la base de datos</p>";
            exit;
        }

0
    ?>
</body>
</html>