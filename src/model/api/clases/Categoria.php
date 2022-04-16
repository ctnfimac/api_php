<?php

class Categoria{
    private $id;
    private $titulo;
    private $precio;
    private $responsive;
    private $red_social;
    private $formulario;
    private $imagenes;
    private $secciones;
    
    public function __construct($id, $titulo, $precio, $responsive, 
                                $red_social, $formulario, $imagenes, $secciones){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->precio = $precio;
        $this->responsive = $responsive;
        $this->red_social = $red_social;
        $this->formulario = $formulario;
        $this->imagenes = $imagenes;
        $this->secciones = $secciones;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getResponsive(){
        return $this->responsive;
    }

    public function getRedSocial(){
        return $this->red_social;
    }

    public function getFormulario(){
        return $this->formulario;
    }

    public function getImagenes(){
        return $this->imagenes;
    }

    public function getSecciones(){
        return $this->secciones;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function setResponsive($responsive){
        $this->responsive = $responsive;
    }

    public function setRedSocial($red_social){
        $this->red_social = $red_social;
    }

    public function setFormulario($formulario){
        $this->formulario = $formulario;
    }

    public function setImagenes($imagenes){
        $this->imagenes = $imagenes;
    }

    public function setSecciones($secciones){
        $this->secciones = $secciones;
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