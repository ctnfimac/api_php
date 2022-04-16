<?php

class Portfolio{
    private $id;
    private $titulo;
    private $descripcion;
    private $imagen_url;
    private $web_url;
    
    public function __construct($id, $titulo, $descripcion, $imagen_url, $web_url){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->imagen_url = $imagen_url;
        $this->web_url = $web_url;
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

    public function getImagenUrl(){
        return $this->imagen_url;
    }

    public function getWebUrl(){
        return $this->web_url;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setImagenUrl($imagen_url){
        $this->imagen_url = $imagen_url;
    }

    public function setWebUrl($web_url){
        $this->web_url = $web_url;
    }

    public static function getFields(){
        return self::_getFields(__CLASS__);
    }
  
    final protected static function _getFields($className){
        $rtn = array();
        $vars_clase = array_keys(get_class_vars($className)) ;
		foreach ($vars_clase as $valor) {
            $rtn[] =  $valor; 
		}
        return $rtn;
    }
  
}