<?php
require "clases/DiscograficaDB.php";
$discografica = new DiscograficaDB();


$lista_nom = $discografica->nombres_tablas();
print_r($lista_nom);

$discografica->intro_1registro("formatos", "tipo_formato", "FLAP");