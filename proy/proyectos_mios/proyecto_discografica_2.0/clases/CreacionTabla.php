<?php
/*Clase encargada de representar las tablas para la consulta de información almacenada en la aplicación, 
esta clase no contará con atributos, contendrá los métodos necesarios para la creación de tablas a 
través de matrices.*/
class CreacionTabla{
    /*Métodos encargados de coger los campos necesarios de la base de datos. Para esta función, va a
    ser necesario un parámetro que va a contener la consulta que se realiza a la base de datos ($sentencia)
    , para depués ser mostrada en la tabla. Seguidamente, dentro del método se va a crear una variable 
    que va a contener una matríz de dos columnas, y tantas filas como la tabla sea de extensa, por ello, 
    en primer lugar se va a especificar el nombre de la columna (Nombre, estado...) y después un bucle
    foreach que va a dividir la sentencia en registros con el propio nombre de las columnas de la base de
    datos que se quiere mostrar.
    Finalmente el método va a devolver la matríz que ha sido creada, para ser utilizada en una tabla.*/
    public function grabaciones($sentencia){
        $matriz = array(array("Nombre", "Estado", "Categoria", "Formato", "Intérprete", "Compañía productora"));
        foreach($sentencia as $registro){
            $matriz[] = array($registro["nombre"], $registro["estado"], $registro["categoria"], 
            $registro["tipo_formato"], $registro["nombre_interpr"], $registro["nombre_comp"]);
        }
        return $matriz;
    }
    /*Método que cumple la misma función que el anterior, pero en este caso, para mostrar los intérpretes de la 
    base de datos.*/
    public function interpretes($sentencia){
        $matriz = array(array("Nombre del intérprete", "Descripción"));
        foreach($sentencia as $registro){
            $matriz[] = array($registro["nombre_interpr"], $registro["descripcion"]);
        }
        return $matriz;
    }
    /*Método que cumple la misma función que el anterior, pero en este caso, para mostrar las compañías de la 
    base de datos.*/
    public function companias($sentencia){
        $matriz = array(array("Nombre de la compañía", "Dirección"));
        foreach($sentencia as $registro){
            $matriz[] = array($registro["nombre_comp"], $registro["direccion"]);
        }
        return $matriz;
    }
    /*Método encargado de dibujar la tabla. Para ser efectivo, se le va a especificar
    el parámetro de la matríz que se ha creado con anterioridad, con los datos que ya han sido recogidos 
    en el método anterior (grabaciones). En primer lugar se creará una variable
    llamada $tabla, que contendrá la disposición de la misma. A continuación, mostrará en la cabecera de
    la tabla el título de las columnas. Como se puede observar, ocupa la posición 0 en el eje vertical y
    seguidamente tantas posiciones en el eje horizontal como datos hayan sido especificados en el 
    método anterior, en este caso 6 datos.
    Como la cabecera ocupa la posición 0, se va a inicializar un contador comenzando en
    1, que muestre tantas filas, como datos hayan en la matríz, posible gracias al bucle while que irá
    incrementando el contador.
    Por ello se puede observar que habrán tantas filas como incrementos en el contador se realicen, 
    pero las columnas siempre serán 6.
    Finalmente el método devuelve la variable que contiene la tabla.*/
    public function tabla_de6($matriz){
        $tabla = 
        "<table class='table table-light mt-2 text-center'>
            <tr>
                <th>".$matriz[0][0]."</th>
                <th>".$matriz[0][1]."</th>
                <th>".$matriz[0][2]."</th>
                <th>".$matriz[0][3]."</th>
                <th>".$matriz[0][4]."</th>
                <th>".$matriz[0][5]."</th>
            </tr>";
        $contador = 1;
        while($contador < count($matriz)){
            $tabla = $tabla.
            "<tr>
                <td>".$matriz[$contador][0]."</td>
                <td>".$matriz[$contador][1]."</td>
                <td>".$matriz[$contador][2]."</td>
                <td>".$matriz[$contador][3]."</td>
                <td>".$matriz[$contador][4]."</td>
                <td>".$matriz[$contador][5]."</td>
            </tr>";
            $contador++;
        }
        $tabla = $tabla."</table>";
        
        return $tabla;
    }
    /*Método idéntico al anterior, pero en este caso solo con dos columnas y tantas filas como datos
    hayan en la matríz.*/
    public function tabla_de2($matriz){
        $tabla = 
        "<table class='table table-light mt-2 text-center'>
            <tr>
                <th>".$matriz[0][0]."</th>
                <th>".$matriz[0][1]."</th>
            </tr>";
        $contador = 1;
        while($contador < count($matriz)){
            $tabla = $tabla.
            "<tr>
                <td>".$matriz[$contador][0]."</td>
                <td>".$matriz[$contador][1]."</td>
            </tr>";
            $contador++;
        }
        $tabla = $tabla."</table>";
        
        return $tabla;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>
</html>