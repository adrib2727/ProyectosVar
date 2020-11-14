<?php

function recorrer($arr,&$arrper){
    $contador=0;
    $longitud=count($arr)-1;
    
    while ($contador<=$longitud){
        $j=0;
        $nombre=$arr[$contador];
        if(empty($arrper)){
            $persona=new Persona ($nombre,1);
            $longitudper=0;
            $arrper[$longitudper]=$persona;
        }else{
            while ($j<=$longitudper && $arrper[$j]->getnombre()!=$nombre){
                $j++;
            }
            if ($j>$longitudper){
                $persona=new Persona ($nombre,1);
                $longitudper++;
                $arrper[$longitudper]=$persona;
            }else{
                $arrper[$j]->setveces($arrper[$j]->getveces()+1);
            }
        }
        $contador++;

    }


}


?>