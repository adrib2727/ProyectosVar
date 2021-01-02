<?php
class CreacionTabla{
    public function grabaciones($sentencia){
        $matriz = array(array("Nombres", "Estado", "Categoria", "Formato"));
        foreach($sentencia as $registro){
            $matriz[] = array($registro["nombre"], $registro["estado"], $registro["categoria"], 
            $registro["tipo_formato"]);
        }
        return $matriz;
    }
    
    public function tabla_de4($matriz){
        $tabla = 
        "<table>
            <tr>
                <th>".$matriz[0][0]."</th>
                <th>".$matriz[0][1]."</th>
                <th>".$matriz[0][2]."</th>
                <th>".$matriz[0][3]."</th>
            </tr>";
        $contador = 1;
        while($contador < count($matriz)){
            $tabla = $tabla.
            "<tr>
                <td>".$matriz[$contador][0]."</td>
                <td>".$matriz[$contador][1]."</td>
                <td>".$matriz[$contador][2]."</td>
                <td>".$matriz[$contador][3]."</td>
            </tr>";
            $contador++;
        }
        $tabla = $tabla."</table>";
        
        return $tabla;
    }
}