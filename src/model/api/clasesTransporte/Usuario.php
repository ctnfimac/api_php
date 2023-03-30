<?php

class Usuario{
    private $id;
    private $nombre;
    private $direccion;
    private $latitud;
    private $longitud;
    private $barrio;
    private $comuna;
    
    public function __construct($id, $nombre, $direccion, $latitud, $longitud, $barrio, $comuna){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
        $this->barrio = $barrio;
        $this->comuna = $comuna;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getLatitud(){
        return $this->latitud;
    }

    public function getLongitud(){
        return $this->longitud;
    }

    public function getBarrio(){
        return $this->barrio;
    }

    public function getComuna(){
        return $this->comuna;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function setLatitud($latitud){
        $this->latitud = $latitud;
    }

    public function setLongitud($longitud){
        $this->longitud = $longitud;
    }

    public function setBarrio($bario){
        $this->bario = $bario;
    }

    public function setComuna($comuna){
        $this->comuna = $comuna;
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