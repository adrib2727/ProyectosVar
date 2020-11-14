<?php

class Persona{
    private $nombre;
    private $veces;


    function __construct($nombre, $veces){
        $this->nombre=$nombre;
        $this->veces=$veces;
    }

    public function setnombre($nombre){
        $this->nombre=$nombre;
    }

    public function setveces($veces){
        $this->veces=$veces;
    }

    public function getveces(){
        return $this->veces;
    }

    public function getnombre(){
        return $this->nombre;
    }

    public function __toString() {
        return "Persona: ".$this->nombre." ".$this->veces; 
    }
}