<?php
/*Clase principal de la aplicación, será la encargada de realizar la conexión a la base de datos a través de los 
atributos que forman la conexión, el usuario, la clave y por último el término bd, que almacena la conexión realizada.*/
class DiscograficaDB{
    private $conexion = "mysql:dbname=discografica;host=localhost";
    private $usuario = "root";
    private $clave = "Mysql27";
    private $bd; //Lo que guarda la conexión.

    /*Constructor de la clase, en él se realiza la conexión con la clase de php llamada PDO, pasando los atributos 
    que se ha establecido, realizará la conexión a la base de datos.*/
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
    /*Función encargada de introducir un registro en una tabla, no devuelve nada puesto que solamente inserta elementos.
    Para que la función sea efectiva, van a ser necesarios los parámetros para poder introducir el nombre de la
    tabla, el campo al que se va a insertar el dato y finalmente un último parámetro con el propio dato a introducir.*/
    public function intro_1registro($tabla, $campo, $valor){
        $this->consulta("INSERT INTO $tabla ($campo) VALUES ('$valor')");
    }
    /*Función que realiza el mismo procedimiento que la anterior, esta vez, inserta tres elementos en una misma tabla.*/
    public function intro_3registros($tabla, $campo1, $campo2, $campo3, $valor1, $valor2, $valor3){

    }
    /*Función encargada de eliminar un registro en una tabla, no devuelve nada puesto que solamente inserta elementos.
    Para que la función sea efectiva, van a ser necesarios los parámetros para poder introducir el nombre de la
    tabla, el campo al que se va a insertar el dato y finalmente un último parámetro con el propio dato a introducir.*/
    /* public function eliminar_1registro($tabla, $campo, $valor){
        $this->consulta("DELETE FROM $tabla")
    } */
    /*Función encargada de realizar la consulta a la tabla seguridad para comprobar el que el 
    usuario introducido sea el correcto, se le pasan los parámetros usuario y clave, haciendo referencia al usuario
    y la clave que se ha cargado en el formulario y después a través del método POST*/
    public function comprobar_usuario($usuario, $clave){
        $consulta = $this->consulta("SELECT id_seguridad, usuario FROM seguridad WHERE usuario = '$usuario' 
        AND clave = '$clave'");
        return ($consulta->rowCount() == 1);
    }


}