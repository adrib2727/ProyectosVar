<?php   
session_start();

$_SESSION['indice']=0;
?>
<html>
<head>

    <title>EJ3</title>
</head>
<body>

    <form action="ej33.php" method="post">
    Introducir nombre (Se sale con salir):
    <input type="text" name="nombre">
     <br>
    Introducir edad (Se sale con edad 0):
    <input type="text" name="edad">
    <input type="submit" value="enviar">
    </form>
</body>
</html>
