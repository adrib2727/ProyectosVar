<?php
session_start();
$a=$_SESSION['indice'];
if(is_numeric($_POST['numero_introducido'])){
    $_SESSION['numero_introducido'.$a]=$_POST['numero_introducido'];
    $a++;
    $_SESSION['indice']=$a;

}
if ($_POST['numero_introducido']<0){
    header("Location:ej111.php");
}
?>
<html>
<head>

    <title>Ej1</title>
</head>
<body>

    <form action="ej11.php" method="post">
    (Estamos en la segunda página) Introducir número (Se sale con numero negativo):
    <input type="text" name="numero_introducido">
    <input type="submit" value="enviar">
    </form>
    

</body>
</html>