<?php
session_start();
$a=$_SESSION['indice'];
if(!empty($_POST['nombre']) && $_POST['nombre']!="salir"){
    $_SESSION['nombre'.$a]=$_POST['nombre'];
    $a++;
    $_SESSION['indice']=$a;

}
//Salimos con "salir"
if ($_POST['nombre']=="salir"){
    header("Location:ej222.php");
}
?>
<html>
<head>

    <title>EJ2</title>
</head>
<body>

    <form action="ej22.php" method="post">
    (Estamos en la segunda página) Introducir persona (Se sale con salir):
    <input type="text" name="nombre">
    <input type="submit" value="enviar">
    </form>

</body>
</html>