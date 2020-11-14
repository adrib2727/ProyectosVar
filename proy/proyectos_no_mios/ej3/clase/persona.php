<?php

class Persona{
    private $nombre;
    private $edad;


    function __construct($nombre, $edad){
        $this->nombre=$nombre;
        $this->edad=$edad;
    }

    public function setnombre($nombre){
        $this->nombre=$nombre;
    }

    public function setedad($edad){
        $this->edad=$edad;
    }

    public function getedad(){
        return $this->edad;
    }

    public function getnombre(){
        return $this->nombre;
    }

    public function __toString() {
        return "Persona: ".$this->nombre." ".$this->edad; 
    }
}