<?php
header("Content-Type: application/json");

class BannerModel extends Conexion{
	private $matriz = array();
	private $contador = 0;

    public function listarTodo(){
		$ati = Banner::getFields();
		$campos = implode($ati,",");
		// $counter = 0;
		$this->query = "SELECT $campos FROM banner";
		$tabla = $this->get_query();
		return($this->consultaAArrayDeObjetos($tabla));
    }

	public function obtenerRegistro($id){
		$ati = Banner::getFields();
		$campos = implode($ati,",");
		$this->query = "SELECT $campos FROM banner WHERE id = {$id}";
		$tabla = $this->get_query();
		return($this->consultaAArrayDeObjetos($tabla));
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

	public function borrar($id){
		$dato_a_borrar = $this->obtenerRegistro($id);
		$dato_a_borrar = $this->convertirAJson($dato_a_borrar);
		if($this->contador){
			$this->query = "DELETE FROM banner WHERE id = {$id}";
			$this->set_query();
			return $dato_a_borrar;
		}else{

		}
		return json_encode(array('Error' => "No existe el Registro con id {$id}"));
    }

	public function modificar($id, $registro){
		$titulo = $registro['titulo'];
		$subtitulo = $registro['subtitulo'];
		$boton_text = $registro['boton_text']; // TODO: problemas con el boton_text
		$this->query = "UPDATE banner SET titulo = '$titulo', subtitulo = '$subtitulo', boton_text = '$boton_text' WHERE id = '$id'";
		$this->set_query();
		return json_encode(['data' => array('titulo' => $titulo, 'subtitulo' => $subtitulo, 'boton_text' => $boton_text)]);
    }

	private function consultaAArrayDeObjetos($tabla){
		while($fila = $tabla->fetch_assoc()){
			 $menu = new Banner($fila['id'],$fila['titulo'],$fila['subtitulo'],$fila['boton_text']);
			 $this->matriz[$this->contador] = $menu;
			 $this->contador++;
		}
		return $this->matriz;
	}

	
	public function convertirAJson($tabla){
		$respuesta = ['data' =>[]];
		// armo el array para poder convertirlo a json
		foreach($tabla as $banner){
			array_push($respuesta['data'],array('id' => $banner->getId(), 'titulo'=> $banner->getTitulo(),'subtitulo'=> $banner->getSubtitulo(),'boton_text'=> $banner->getBotonText()));
		}
		return json_encode($respuesta);
	}

}