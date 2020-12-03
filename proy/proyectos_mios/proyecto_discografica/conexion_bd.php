<?php
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
function comprobar_usuario($nombre, $clave){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	$ins = "SELECT id_seguridad, usuario FROM seguridad WHERE usuario = '$nombre' 
			AND clave = '$clave'";
	$resul = $bd->query($ins);	
	if($resul->rowCount() === 1){		
		return $resul->fetch();		
	}else{
		return FALSE;
	}
}

/*---------------------------------------------------------------------------------------------------------*/

/*Función que muestra las diferentes opciones que puede elegir*/
function titulos_grabaciones(){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	//Consulta
	$ins = "SELECT id_grabacion, titulo FROM grabaciones";
	$resul = $bd->query($ins);	
	if(!$resul){		
		return FALSE;	
	}
	if($resul->rowCount() === 0){
		return FALSE;
	}
	return $resul;
}

/*Función que me muestre la opción del estado de las grabaciones*/
function mostrar_estado_grabaciones($id_grabaciones){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	//Consulta.
	//Seleccioname el estado de las grabaciones segun el id_grabaciones que haya seleccionado.
	$ins = "SELECT estado FROM grabaciones
			WHERE id_grabacion = $id_grabaciones";
	$resul = $bd->query($ins);	
	if(!$resul){		
		return FALSE;	
	}
	if($resul->rowCount() === 0){
		return FALSE;
	}
	return $resul;
}

/*Función que me muestre el tipo de categoría que tiene la grabación*/
function mostrar_categoria_grabaciones($id_grabaciones){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	//Consulta.
	//Seleccioname la categoría de las grabaciones segun el id_grabaciones que haya seleccionado.
	$ins = "SELECT categoria FROM grabaciones
			WHERE id_grabacion = $id_grabaciones";
	$resul = $bd->query($ins);	
	if(!$resul){		
		return FALSE;	
	}
	if($resul->rowCount() === 0){
		return FALSE;
	}
	return $resul;
}

/*Función que me muestre el tipo de formato en el que está la grabación*/
function mostrar_formato_grabaciones($id_grabaciones){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	//Consulta.
	//Seleccioname el formato de las grabaciones segun el id_grabaciones que haya seleccionado.
	//Formatos está en otra tabla.
	$ins = "SELECT tipo_formato FROM grabaciones, formatos
			WHERE id_formato = id_formatos AND id_grabacion = $id_grabaciones";
	$resul = $bd->query($ins);	
	if(!$resul){		
		return FALSE;	
	}
	if($resul->rowCount() === 0){
		return FALSE;
	}
	return $resul;
}

/*-------------------------------------------------------------------------------------------------------*/





