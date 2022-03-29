<?php

class Servicio{
    private $id;
    private $titulo;
    private $descripcion;
    private $icono;
    
    public function __construct($id, $titulo, $descripcion, $icono){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->icono = $icono;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getIcono(){
        return $this->icono;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setDescripcion($descripcion){
        $this->desc$descripcion = $descripcion;
    }

    public function setIcono($icono){
        $this->icono = $icono;
    }
  
}