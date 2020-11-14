<?php
require ("clase/clase.php");
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
$arrper;
recorrer($sacar,$arrper);
$glongitud=count($arrper)-1;
$indice=0;
while ($indice<=$glongitud){
    echo $arrper[$indice]."<br>";
    $indice++;
}
session_destroy();
?>