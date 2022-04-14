<?php
header("Content-Type: application/json");

class ServicioModel extends Model{

    function __construct(){
		parent::__construct('Servicio');
	}

	public function modificar($id, $registro){
		$titulo = $registro['titulo'];
		$descripcion = $registro['descripcion'];
		$icono = $registro['icono']; 
		$this->query = "UPDATE servicio SET titulo = '$titulo', descripcion = '$descripcion', icono = '$icono' WHERE id = '$id'";
		$this->set_query();
		return json_encode(['data' => array('titulo' => $titulo, 'descripcion' => $descripcion, 'icono' => $icono)]);
    }

}