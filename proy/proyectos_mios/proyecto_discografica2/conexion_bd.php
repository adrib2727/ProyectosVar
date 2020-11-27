<?php
    $servidor = "localhost";
    $usuario = "root";
    $base_datos = "discografica";
    $clave = "Mysql27";

    try{
        $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos;", $usuario, $clave);
    }catch(PDOException $error){
        die("Connected fail: ".$error->getMessage());
    }
?>