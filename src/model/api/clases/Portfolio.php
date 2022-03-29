<?php

class Portfolio{
    private $id;
    private $titulo;
    private $descripcion;
    private $imagen;
    private $url_web;
    
    public function __construct($id, $titulo, $descripcion, $imagen, $url_web){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->url_web = $url_web;
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

    public function getImagen(){
        return $this->imagen;
    }

    public function getUrlWeb(){
        return $this->url_web;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    public function setUrlWeb($url_web){
        $this->url_web = $url_web;
    }
  
}