<?php
header("Content-Type: application/json");

class ServicioModel extends Conexion{
	private $matriz = array();
	private $contador = 0;

    public function listarTodo(){
		$ati = Servicio::getFields();
		$campos = implode($ati,",");
		// $counter = 0;
		$this->query = "SELECT $campos FROM servicio";
		$tabla = $this->get_query();
		return($this->consultaAArrayDeObjetos($tabla));
    }

	public function obtenerRegistro($id){
		$ati = Servicio::getFields();
		$campos = implode($ati,",");
		$this->query = "SELECT $campos FROM servicio WHERE id = {$id}";
		$tabla = $this->get_query();
		return($this->consultaAArrayDeObjetos($tabla));
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

	public function borrar($id){
		$dato_a_borrar = $this->obtenerRegistro($id);
		$dato_a_borrar = $this->convertirAJson($dato_a_borrar);
		if($this->contador){
			$this->query = "DELETE FROM servicio WHERE id = {$id}";
			$this->set_query();
			return $dato_a_borrar;
		}else{

		}
		return json_encode(array('Error' => "No existe el Registro con id {$id}"));
    }

	public function modificar($id, $registro){
		$titulo = $registro['titulo'];
		$descripcion = $registro['descripcion'];
		$icono = $registro['icono']; 
		$this->query = "UPDATE servicio SET titulo = '$titulo', descripcion = '$descripcion', icono = '$icono' WHERE id = '$id'";
		$this->set_query();
		return json_encode(['data' => array('titulo' => $titulo, 'descripcion' => $descripcion, 'icono' => $icono)]);
    }

	private function consultaAArrayDeObjetos($tabla){
		while($fila = $tabla->fetch_assoc()){
			 $menu = new Servicio($fila['id'],$fila['titulo'],$fila['descripcion'],$fila['icono']);
			 $this->matriz[$this->contador] = $menu;
			 $this->contador++;
		}
		return $this->matriz;
	}

	
	public function convertirAJson($tabla){
		$respuesta = ['data' =>[]];
		// armo el array para poder convertirlo a json
		foreach($tabla as $servicio){
			array_push($respuesta['data'],array('id' => $servicio->getId(), 'titulo'=> $servicio->getTitulo(),'descripcion'=> $servicio->getDescripcion(),'icono'=> $servicio->getIcono()));
		}
		return json_encode($respuesta);
	}

}