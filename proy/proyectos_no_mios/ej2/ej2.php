<?php   
session_start();

$_SESSION['indice']=0;
?>
<html>
<head>

    <title>Ej2</title>
</head>
<body>

    <form action="ej22.php" method="post">
    Introducir nombre (Se sale con salir):
    <input type="text" name="nombre">
    <input type="submit" value="enviar">
    </form>
</body>
</html>
