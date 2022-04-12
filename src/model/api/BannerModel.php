<?php
header("Content-Type: application/json");

class BannerModel extends Model{

	function __construct(){
		parent::__construct('Banner');
	}

    public function guardar($registro){
		$titulo = $registro['titulo'];
		$subtitulo = $registro['subtitulo'];
		$boton_text = $registro['boton_text'];
		//TODO: tengo que verificar que haya un solo registro
		$this->query = "INSERT INTO banner(titulo, subtitulo, boton_text) VALUES ('$titulo','$subtitulo','$boton_text');";
		$this->set_query();
		return json_encode(['data' => array('titulo' => $titulo, 'subtitulo' => $subtitulo, 'boton_text' => $boton_text)]);
    }

	public function modificar($id, $registro){
		$titulo = $registro['titulo'];
		$subtitulo = $registro['subtitulo'];
		$boton_text = $registro['boton_text']; // TODO: problemas con el boton_text
		$this->query = "UPDATE banner SET titulo = '$titulo', subtitulo = '$subtitulo', boton_text = '$boton_text' WHERE id = '$id'";
		$this->set_query();
		return json_encode(['data' => array('titulo' => $titulo, 'subtitulo' => $subtitulo, 'boton_text' => $boton_text)]);
    }

}