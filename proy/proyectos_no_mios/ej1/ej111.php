<?php
require ("funciones/funciones.php");
session_start();
$a=$_SESSION['indice'];
$a=$a-2;
$j=0;
$sacar=array();
while ($j<=$a){
    $sacar[$j]=$_SESSION['numero_introducido'.$j];
    $j++;
}
$longitud=count($sacar)-1;
$j=0;

while($j<=$longitud){

    $primal=sacarprimo($sacar,$j);
    echo ($primal);
    echo "<br>";
    $j++;

}

session_destroy();
?>