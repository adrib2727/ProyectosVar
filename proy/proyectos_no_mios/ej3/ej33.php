<?php
session_start();
require ("clase/persona.php");
$a=$_SESSION['indice'];
if(!empty($_POST['nombre']) && $_POST['nombre']!="salir" && $_POST['edad']!="0"){
    $per=new Persona (($_POST['nombre']), ($_POST['edad']));
    $_SESSION['nombre'.$a]=$per
    ;
    $a++;
    $_SESSION['indice']=$a;

}else{
    header("Location:ej333.php");
}

?>
<html>
<head>

    <title>EJ3</title>
</head>
<body>

    <form action="ej33.php" method="post">
    (Segunda página)<br>
    Introducir nombre (Se sale con salir):
    <input type="text" name="nombre">
     <br>
    Introducir edad (Se sale con edad 0):
    <input type="text" name="edad">
    <input type="submit" value="enviar">
    </form>
</body>
</html>
