<?php

function sacamos($arr){

    $contador=0;
    $longitud=count($arr)-1;
    
    while($contador<=$longitud){

        if(($arr[$contador]->getedad())>17){

            $persona=$arr[$contador]->getnombre();
             echo "$persona es mayor de edad";
             echo "<br>";

        }   
        $contador++;
    }

}

?>