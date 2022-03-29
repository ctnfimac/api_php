<?php

class Contacto{
    private $id;
    private $descripcion;
    private $icono;
    
    public function __construct($id, $descripcion, $icono){
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->icono = $icono;
    }

    public function getId(){
        return $this->id;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getIcono(){
        return $this->icono;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setIcono($icono){
        $this->icono = $icono;
    }

}