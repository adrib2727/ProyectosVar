<?php
session_start();
$_SESSION['indice']=0;
?>
<html>
<head>

    <title>Ej1</title>
</head>
<body>

    <form action="ej11.php" method="post">
    Introducir número (Se sale con numero negativo):
    <input type="text" name="numero_introducido">
    <input type="submit" value="enviar">
    </form>
</body>
</html>
