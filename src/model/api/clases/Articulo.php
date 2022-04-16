<?php

class Articulo{
    private $id;
    private $titulo;
    private $imagen_url;
    
    public function __construct($id, $titulo, $imagen_url){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->imagen_url = $imagen_url;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getImagenUrl(){
        return $this->imagen_url;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setImagenUrl($imagen_url){
        $this->imagen_url = $imagen_url;
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