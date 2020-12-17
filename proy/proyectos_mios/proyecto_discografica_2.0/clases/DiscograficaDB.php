<?php
class DiscograficaDB{
    private $conexion = "mysql:dbname=discografica;host=localhost";
    private $usuario = "root";
    private $clave = "Mysql27";
    private $bd; //Lo que guarda la conexión.

    function __construct(){
        try{    
            //This para referirnos a los objetos.
            $this->bd = new PDO($this->conexion, $this->usuario, $this->clave);
        }catch(PDOException $ex){
            echo "No se ha podido conectar: ".$ex->getMessage(); //Mensaje de error específico.
        }
    }
    //Esta función realiza una consulta, le pasamos la cadena sql, devuelve un PDOStatement, que es la sentencia de PDO.
    public function consulta($sql){
        return $this->bd->query($sql);
    }
    //Consulta que accede a la BD y devuelve una lista con los nombres de las tablas.
    public function nombres_tablas(){
        $nombres = array(); //Se crea un array como lista de nombres.
        $sentencias = $this->consulta("SHOW TABLES");

        foreach($sentencias as $elemento){
            $nombres[] = $elemento[0]; //Guarda en el array nombres, el nombre de $elemento, que está en la 1º pos.
        }
        return $nombres;
    }
    //Introducir un registro en una tabla, no devuelve nada.
    //Se necesita la tabla, el campo y el valor.
    public function intro_1registro($tabla, $campo, $valor){
        $this->consulta("INSERT INTO $tabla ($campo) VALUES ('$valor')");
    }
    /* Esta función es la encargada de realizar la consulta a la tabla seguridad para comprobar el que el 
    usuario introducido sea el correcto. */
    public function comprobar_usuario($nombre, $clave){
        $consulta = $this->consulta("SELECT id_seguridad, usuario FROM seguridad WHERE usuario = '$nombre' 
        AND clave = '$clave'");
        return ($consulta->rowCount() == 1);
    }

}