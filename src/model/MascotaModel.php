<?php
header("Content-Type: application/json");

class MascotaModel extends Conexion{

	private $matriz = array();
	private $contador = 0;

    public function listarTodo(){
		$counter = 0;
		$this->query = "SELECT id, nombre FROM mascota";
		$tabla = $this->get_query();
		return($this->consultaAArrayDeObjetos($tabla));
    }

	public function obtenerRegistro($id){
		$this->query = "SELECT id, nombre FROM mascota WHERE id = {$id}";
		$tabla = $this->get_query();
		return($this->consultaAArrayDeObjetos($tabla));
	}

    public function guardar($registro){
		$nombre = $registro['nombre'];
		$this->query = "INSERT INTO mascota(nombre) VALUES ('$nombre');";
		$this->set_query();
		return json_encode(['data' => array('nombre' => $nombre)]);
    }

	public function borrar($id){
		// echo $id;
		$mascota_a_borrar = $this->obtenerRegistro($id);
		$mascota_a_borrar = $this->convertirAJson($mascota_a_borrar);
		if($this->contador){
			$this->query = "DELETE FROM mascota WHERE id = {$id}";
			$this->set_query();
			return $mascota_a_borrar;
		}else{

		}
		return json_encode(array('Error' => "No existe la mascota con id {$id}"));
    }

	public function modificar($id, $registro){

    }

	public function convertirAJson($tabla){
		$respuesta = ['data' =>[]];
		// armo el array para poder convertirlo a json
		foreach($tabla as $mascota){
			array_push($respuesta['data'],array('id' => $mascota->getId(), 'nombre'=> $mascota->getNombre()));
		}
		return json_encode($respuesta);
	}

	private function consultaAArrayDeObjetos($tabla){
		while($fila = $tabla->fetch_assoc()){
			 $menu = new Mascota($fila['id'],$fila['nombre']);
			 $this->matriz[$this->contador] = $menu;
			 $this->contador++;
		}
		return $this->matriz;
	}
}