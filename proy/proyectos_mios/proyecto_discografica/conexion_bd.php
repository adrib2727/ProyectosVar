<?php
/*Función que me comprueba el login de la página*/
function comprobar_usuario($usuario_post, $clave_post){
	$conexion = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
    $bd = new PDO($conexion[0], $conexion[1], $conexion[2]);
    $consulta = "SELECT usuario, clave FROM seguridad
                WHERE usuario = $usuario_post AND clave = $clave_post";
	$resul = $bd->query($consulta);	
	if($resul->rowCount() === 1){		
		return $resul->fetch();		
	}else{
		return FALSE;
	}
}
?>