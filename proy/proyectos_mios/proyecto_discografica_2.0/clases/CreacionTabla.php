<?php
class CreacionTabla{
    public function grabaciones($sentencia){
        $matriz = array(array("Nombre", "Estado", "Categoria", "Formato", "Intérprete", "Compañía productora"));
        foreach($sentencia as $registro){
            $matriz[] = array($registro["nombre"], $registro["estado"], $registro["categoria"], 
            $registro["tipo_formato"], $registro["nombre_interpr"], $registro["nombre_comp"]);
        }
        return $matriz;
    }

    public function interpretes($sentencia){
        $matriz = array(array("Nombre del intérprete", "Descripción"));
        foreach($sentencia as $registro){
            $matriz[] = array($registro["nombre_interpr"], $registro["descripcion"]);
        }
        return $matriz;
    }

    public function companias($sentencia){
        $matriz = array(array("Nombre de la compañía", "Dirección"));
        foreach($sentencia as $registro){
            $matriz[] = array($registro["nombre_comp"], $registro["direccion"]);
        }
        return $matriz;
    }
    
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