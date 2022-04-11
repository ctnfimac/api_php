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
        $this->descripcion = $descripcion;
    }

    public function setIcono($icono){
        $this->icono = $icono;
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