<?php
header("Content-Type: application/json");

class ServicioModel extends Model{

    function __construct(){
		parent::__construct('Servicio');
	}

    public function guardar($registro){
		$titulo = $registro['titulo'];
		$descripcion = $registro['descripcion'];
		$icono = $registro['icono'];
		//TODO: tengo que verificar que haya un solo registro
		$this->query = "INSERT INTO servicio(titulo, descripcion, icono) VALUES ('$titulo','$descripcion','$icono');";
		$this->set_query();
		return json_encode(['data' => array('titulo' => $titulo, 'descripcion' => $descripcion, 'icono' => $icono)]);
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