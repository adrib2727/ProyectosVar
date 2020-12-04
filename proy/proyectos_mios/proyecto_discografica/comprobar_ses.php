<?php
    /*Función que me comprueba que el usuario está en el proyecto.*/
    function comprobar_sesion(){
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("Location: login.php?redirigido=true");
        }
    }
?>