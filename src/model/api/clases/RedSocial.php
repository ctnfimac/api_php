<?php

class Portfolio{
    private $id;
    private $titulo;
    private $icono;
    private $url;
    
    public function __construct($id, $titulo, $icono, $url){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->icono = $icono;
        $this->url = $url;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getIcono(){
        return $this->icono;
    }

    public function getUrl(){
        return $this->url;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setIcono($icono){
        $this->icono = $icono;
    }

    public function setUrl($url){
        $this->url = $url;
    }
  
}