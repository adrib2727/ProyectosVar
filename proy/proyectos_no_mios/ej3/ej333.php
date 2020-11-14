<?php
require ("clase/persona.php");
require ("funciones/funciones.php");
session_start();
$a=$_SESSION['indice'];
$a=$a-1;
$j=0;
$sacar=array();
while ($j<=$a){
    $sacar[$j]=$_SESSION['nombre'.$j];
    $j++;
}

sacamos($sacar);


session_destroy();
?>