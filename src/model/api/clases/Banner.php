<?php

class Banner{
    private $id;
    private $titulo;
    private $subtitulo;
    private $boton_text;
    
    public function __construct($id, $titulo, $subtitulo, $boton_text){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->boton_text = $boton_text;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getSubTitulo(){
        return $this->subtitulo;
    }

    public function getBotonText(){
        return $this->boton_text;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setSubTitulo($subtitulo){
        $this->subtitulo = $subtitulo;
    }

    public function setBotonText($boton_text){
        $this->boton_text = $boton_text;
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