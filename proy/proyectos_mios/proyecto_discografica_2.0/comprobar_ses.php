<?php
    /*Función que comprueba que el usuario sea el correcto, presente en todas las páginas hasta 
    que se realiza logout.*/
    function comprobar_sesion(){
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("Location: login.php?redirigido=true");
        }
    }
?>