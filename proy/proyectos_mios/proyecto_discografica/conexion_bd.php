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
			WHERE id_formato_fk = id_formato AND id_grabacion = $id_grabaciones";
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

/*Función que me muestre la lista de interpretes*/ 
function titulos_interpretes(){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	//Consulta.
	//Seleccioname el formato de las grabaciones segun el id_grabaciones que haya seleccionado.
	//Formatos está en otra tabla.
	$ins = "SELECT id_interprete, nombre FROM interpretes";
	$resul = $bd->query($ins);	
	if(!$resul){		
		return FALSE;	
	}
	if($resul->rowCount() === 0){
		return FALSE;
	}
	return $resul;
}

/*Función que muestra el nombre del interprete según lo seleccionado*/
function mostrar_nombre_interpretes($id_interprete){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	//Consulta.
	//Seleccionar el nombre del interprete según lo seleccionado.
	$ins = "SELECT nombre FROM interpretes
			WHERE id_interprete = $id_interprete";
	$resul = $bd->query($ins);	
	if(!$resul){		
		return FALSE;	
	}
	if($resul->rowCount() === 0){
		return FALSE;
	}
	return $resul;
}

/*Función que me va a mostrar la descripción del intérprete*/
function mostrar_descripcion_interpretes($id_interprete){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	//Consulta.
	//Seleccioname el formato de las grabaciones segun el id_grabaciones que haya seleccionado.
	//Formatos está en otra tabla.
	$ins = "SELECT descripcion FROM interpretes
			WHERE id_interprete = $id_interprete";
	$resul = $bd->query($ins);	
	if(!$resul){		
		return FALSE;	
	}
	if($resul->rowCount() === 0){
		return FALSE;
	}
	return $resul;
}

/*Función que me va a mostrar el número de grabaciones que tiene*/
function mostrar_numero_grabaciones($id_interprete){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	//Consulta.
	//Seleccionar el número de grabaciones que tiene ese interprete.
	$ins = "SELECT COUNT(titulo) FROM grabaciones, interpretes 
			WHERE id_interprete_fk = id_interprete AND id_interprete = $id_interprete";
	$resul = $bd->query($ins);	
	if(!$resul){		
		return FALSE;	
	}
	if($resul->rowCount() === 0){
		return FALSE;
	}
	return $resul;
}
/*Función que me va a mostrar las grabaciones que ha hecho el intérprete*/
function mostrar_cuantas_grabaciones_tiene_interprete($id_interprete){
	$res = leer_config(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
	$bd = new PDO($res[0], $res[1], $res[2]);
	//Consulta.
	//Seleccionar las grabaciones que tiene ese interprete.
	$ins = "SELECT titulo FROM grabaciones, interpretes 
			WHERE id_interprete_fk = id_interprete AND id_interprete = $id_interprete";
	$resul = $bd->query($ins);	
	if(!$resul){		
		return FALSE;	
	}
	if($resul->rowCount() === 0){
		return FALSE;
	}
	return $resul;
}




