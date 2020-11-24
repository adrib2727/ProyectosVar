<?php
    function comprobar_sesion(){
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("Location: 1login.php?redirigido=true");
        }
    }
?>