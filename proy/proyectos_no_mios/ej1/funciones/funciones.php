<?php

function sacarprimo ($arr,$contador){

    $numero=$arr[$contador];
    $resto=0;
    $empezar=1;
    while($empezar<=$numero){
        if($numero%$empezar==0){
            $resto++;
        }
        $empezar++;
    }
    if ($numero==1){
        return "El numero 1 es primo";
    }else{
    if ($resto==2){
        return "El numero ".$numero." es primo";
    }else{
        return "El numero ".$numero." no es primo";
    }
}
}

?>