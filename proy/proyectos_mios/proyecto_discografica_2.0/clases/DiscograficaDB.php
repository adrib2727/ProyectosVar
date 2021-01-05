<?php
/*Clase principal de la aplicación, será la encargada de realizar la conexión a la base de datos a través de los 
atributos que forman la conexión, el usuario, la clave y por último el término bd, que almacena la conexión realizada.*/
class DiscograficaDB{
    private $conexion = "mysql:dbname=discografica;host=localhost";
    private $usuario = "root";
    private $clave = "Mysql27";
    private $bd; //Lo que guarda la conexión.

    /*Constructor de la clase, en él se realiza la conexión con la clase de php llamada PDO, pasando los atributos 
    que se ha establecido, realizará la conexión a la base de datos. En caso de no poder conectar a la base de datos,
    lanzará una excepción indicando que no ha sido posible la conexión.*/
    function __construct(){
        try{    
            //This para referirnos a los objetos.
            $this->bd = new PDO($this->conexion, $this->usuario, $this->clave);
        }catch(PDOException $ex){
            echo "No se ha podido conectar: ".$ex->getMessage(); //Mensaje de error específico.
        }
    }
    /*Esta función realiza una consulta, le pasamos la cadena sql, devuelve un PDOStatement, que es la sentencia de PDO.
    Este método será instanciado en cada uno de los siguientes métodos para poder realizar la consulta con éxito.*/
    public function consulta($sql){
        return $this->bd->query($sql);
    }
    /*Función encargada de introducir un registro en una tabla, no devuelve nada puesto que solamente inserta elementos.
    Para que la función sea efectiva, van a ser necesarios los parámetros para poder introducir el nombre de la
    tabla, el campo al que se va a insertar el dato y finalmente un último parámetro con el propio dato a introducir.*/
    public function intro_1registro($tabla, $columna, $valor){
        $this->consulta("INSERT INTO $tabla ($columna) VALUES ('$valor')");
    }
    /*Función que realiza el mismo procedimiento que la anterior, esta vez, inserta seis elementos en 
    una misma tabla. Para ello, será necesario el nombre de la tabla, el nombre de todas las columnas 
    de la tabla de la base de datos y los valores que van a ser introducidos en ella.*/
    public function intro_6registros($tabla, $col1, $col2, $col3, $col4, $col5, $col6, $v1, $v2, $v3, $v4, $v5, $v6){
        $this->consulta("INSERT INTO $tabla ($col1, $col2, $col3, $col4, $col5, $col6)
        VALUES ('$v1', '$v2', '$v3', '$v4', '$v5', '$v6')");
    }
    /*Función encargada de eliminar un registro en una tabla, no devuelve nada puesto que solamente 
    elimina elementos. Para que la función sea efectiva, van a ser necesarios los parámetros tales 
    como el nombre de la tabla, la columna del dato que va a ser eliminado y finalmente un último 
    parámetro con la columna que va a ser eliminada.*/
    public function eliminar_1fila($tabla, $columna){
        $this->consulta("DELETE FROM $tabla WHERE nombre = '$columna'");
    }
    /*Función encargada de editar un registro en una tabla, no devuelve nada puesto que solamente modifica elementos.
    Para que la función sea efectiva, van a ser necesarios los parámetros para poder introducir el nombre de la
    tabla, la columna del dato que va a ser modificado, otro parámetro con el propio dato a modificar y finalmente
    un último parámetro donde se va a especificar el nombre de la grabación que va a ser modificada. ($valor2)*/
    public function modificar_1registro($tabla, $columna, $valor1, $valor2){
        $this->consulta("UPDATE $tabla SET $columna = '$valor1' WHERE nombre = '$valor2'");
    }
    /*Función encargada de realizar la consulta a la tabla seguridad para comprobar el que el 
    usuario introducido sea el correcto, se le pasan los parámetros usuario y clave, haciendo 
    referencia al usuario y la clave que se ha ingrasado en el formulario.
    Este método finalmente devuelve que la fila con los datos equivale a 1, haciendo referencia a un valor 
    booleano como que el dato ha sido consultado exitosamente.*/
    public function comprobar_usuario($usuario, $clave){
        $consulta = $this->consulta("SELECT id_seguridad, usuario FROM seguridad WHERE usuario = '$usuario' 
        AND clave = '$clave'");
        return ($consulta->rowCount() == 1);
    }
    /*Función encargada de seleccionar los datos de las diferentes tablas para después ser mostradas (En la
    página mostrar_grabaciones.php). En ella se seleccionan las características de la tabla grabaciones, 
    el formato procedente de la tabla formatos, el nombre del intérprete procedente de la tabla intérpretes  
    y finalmente el nombre de la compañia, procedente de la tabla companias.
    El método devuelve la misma consulta, no es necesario pasar parámetros puesto que selecciona datos ya
    existentes.*/
    public function mostrar_grabaciones(){
        return $this->consulta("SELECT nombre, estado, categoria, tipo_formato, nombre_interpr, nombre_comp
        FROM grabaciones, formatos, interpretes, companias 
        WHERE id_formato = id_formato_fk AND id_interprete = id_interpretes_fk AND 
        id_compania = id_compania_fk");
    }
    /*Función encargada de seleccionar el nombre y la descripción de los intérpretes, procedente de la tabla 
    intérpretes, para después ser mostrada (mostrar_interpretes.php).
    El método devuelve la misma consulta, no es necesario pasar parámetros puesto que selecciona datos ya
    existentes.*/
    public function mostrar_interpretes(){
        return $this->consulta("SELECT nombre_interpr, descripcion FROM interpretes");
    }
    /*Función encargada de seleccionar el nombre y la dirección de las compañías, procedente de la tabla
    companias, para después ser mostrada (mostrar_companias.php).
    El método devuelve la misma consulta, no es necesario pasar parámetros puesto que selecciona datos ya
    existentes.*/
    public function mostrar_companias(){
        return $this->consulta("SELECT nombre_comp, direccion FROM companias");
    }
    /*Función encargada de comprobar que no se inserte una grabación que ya está registrada en la base de 
    datos. Selecciona el identificador (Campo primario y único), y el nombre que va a ser introducido por 
    el usuario.
    La función devuleve verdadero un valor booleano.*/
    public function comprobar_grab($nombre){
        $consulta = $this->consulta("SELECT id_grabacion, nombre FROM grabaciones
        WHERE nombre = '$nombre'");
        return ($consulta->rowCount() == 1);
    }


}