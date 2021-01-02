<?php
require "clases/DiscograficaDB.php";
$discografica = new DiscograficaDB();


$lista_nom = $discografica->nombres_tablas();
print_r($lista_nom);

$discografica->intro_1registro("formatos", "tipo_formato", "FLAP");

echo "<br>";

$lista_tabla = $discografica->mostrar_grabaciones();
print_r($lista_tabla);