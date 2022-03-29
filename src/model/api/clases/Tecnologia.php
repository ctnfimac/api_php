<?php

class Tecnologia{
    private $id;
    private $nombre;
    private $porcentaje;
    
    public function __construct($id, $nombre, $porcentaje){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->porcentaje = $porcentaje;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPorcentaje(){
        return $this->porcentaje;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setPorcentaje($porcentaje){
        $this->porcentaje = $porcentaje;
    }
  
}