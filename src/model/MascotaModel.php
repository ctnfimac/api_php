<?php
header("Content-Type: application/json");

// require_once('clases/Mascota.php');

class MascotaModel extends Conexion{

    public function listarTodo(){
        $matriz = array();
		$contador = 0;
		$this->query = "SELECT id, nombre FROM mascota";
		$tabla = $this->get_query();
		while($fila = $tabla->fetch_assoc()){
			 $menu = new Mascota($fila['id'],$fila['nombre']);
			 $matriz[$contador] = $menu;
			 $contador++;
		}
		return $matriz;
    }

	public function obtenerRegistro($id){

	}

    public function guardar($registro){

    }

	public function borrar($id){

    }

	public function modificar($id, $registro){

    }

	public function convertirJson($tabla){
		$respuesta = ['data' =>[]];
		// armo el array para poder convertirlo a json
		foreach($tabla as $mascota){
			array_push($respuesta['data'],array('id' => $mascota->getId(), 'nombre'=> $mascota->getNombre()));
		}
		return json_encode($respuesta);
	}
}