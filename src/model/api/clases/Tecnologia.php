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