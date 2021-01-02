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
    public function intro_1registro($tabla, $columna, $valor){
        $this->consulta("INSERT INTO $tabla ($columna) VALUES ('$valor')");
    }


    /*Función que realiza el mismo procedimiento que la anterior, esta vez, inserta tres elementos en una misma tabla.*/
    public function intro_4registros($tabla, $col1, $col2, $col3, $col4, $v1, $v2, $v3, $v4){
        $this->consulta("INSERT INTO $tabla ($col1, $col2, $col3, $col4)
        VALUES ('$v1', '$v2', '$v3', '$v4')");
    }


    /*Función encargada de eliminar un registro en una tabla, no devuelve nada puesto que solamente elimina elementos.
    Para que la función sea efectiva, van a ser necesarios los parámetros para poder introducir el nombre de la
    tabla, la columna del dato que va a ser eliminado y finalmente un último parámetro con el propio dato a eliminar.*/
    public function eliminar_1fila($tabla, $columna){
        $this->consulta("DELETE FROM $tabla WHERE nombre = '$columna'");
    }


    /*Función encargada de editar un registro en una tabla, no devuelve nada puesto que solamente modifica elementos.
    Para que la función sea efectiva, van a ser necesarios los parámetros para poder introducir el nombre de la
    tabla, la columna del dato que va a ser modificado, otro parámetro con el propio dato a modificar y finalmente
    un último parámetro donde se va a especificar el nombre de la grabación que va a ser modificada.*/
    public function modificar_1registro($tabla, $columna, $valor, $nombre){
        $this->consulta("UPDATE $tabla SET $columna = '$valor' WHERE nombre = '$nombre'");
    }


    /*Función encargada de establecer un índice primario de una tabla a un índice foráneo referenciado en
    otra tabla.
    En esta función vamos a tener que */

    /* public function asignar_1id($tabla1, $campo_foraneo, $ident_foraneo, $tabla2, $campo1, $valor1, $ident2, $campo2, $valor2){
        $this->consulta("UPDATE $tabla1 SET $campo_foraneo = 
        (SELECT $ident_foraneo FROM $tabla2 WHERE $campo1 = '$valor1')
        WHERE $tabla1.$ident2 = 
        (SELECT $ident2 FROM $tabla1 WHERE $campo2 = '$valor2')");
    } */



    /*Función encargada de realizar la consulta a la tabla seguridad para comprobar el que el 
    usuario introducido sea el correcto, se le pasan los parámetros usuario y clave, haciendo referencia al usuario
    y la clave que se ha cargado en el formulario y después a través del método POST*/
    public function comprobar_usuario($usuario, $clave){
        $consulta = $this->consulta("SELECT id_seguridad, usuario FROM seguridad WHERE usuario = '$usuario' 
        AND clave = '$clave'");
        return ($consulta->rowCount() == 1);
    }

    /*Función encargada de mostrar los datos existentes en la tabla grabaciones*/
    public function consultar_3campos($tabla1, $campo1, $campo2, $campo3, $campo4){
        $Campos = array();
        $consulta = $this->consulta("SELECT $campo1, $campo2, $campo3, $campo4 FROM $tabla1");
        
    }

    /*Comentar*/
    public function mostrar_grabaciones(){
        return $this->consulta("SELECT nombre, estado, categoria, tipo_formato 
        FROM grabaciones, formatos WHERE id_formato = id_formato_fk");
    }


}