<?php

class Redsocial{
    private $id;
    private $titulo;
    private $icono;
    private $web_url;
    
    public function __construct($id, $titulo, $icono, $web_url){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->icono = $icono;
        $this->web_url = $web_url;
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

    public function getWebUrl(){
        return $this->web_url;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setIcono($icono){
        $this->icono = $icono;
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