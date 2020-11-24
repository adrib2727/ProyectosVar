<?php
session_start();
/*Función para la llamada en conexion de la función de abajo*/
function leer_config($nombre, $esquema){
	$config = new DOMDocument();
	$config->load($nombre);
	$res = $config->schemaValidate($esquema);
	if ($res===FALSE){ 
	   throw new InvalidArgumentException("Revise fichero de configuración");
	} 		
	$datos = simplexml_load_file($nombre);	
	$ip = $datos->xpath("//ip");
	$nombre = $datos->xpath("//nombre");
	$usu = $datos->xpath("//usuario");
	$clave = $datos->xpath("//clave");	
	$cad = sprintf("mysql:dbname=%s;host=%s", $nombre[0], $ip[0]);
	$resul = [];
	$resul[] = $cad;
	$resul[] = $usu[0];
	$resul[] = $clave[0];
	return $resul;
}
/*Función que me comprueba el login de la página*/
function comprobar_usuario($usuario_post, $clave_post){
	$conexion = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($conexion[0], $conexion[1], $conexion[2]);
    $consulta = "SELECT usuario, clave FROM seguridad
                WHERE usuario = $usuario_post AND clave = $clave_post";
	$resul = $bd->query($consulta);	
	if($resul->rowCount() === 1){		
		return $resul->fetch();	
		echo "Conexión a la base de datos realizada";	
	}else{
		return FALSE;
	}
}
?>