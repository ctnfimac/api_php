<?php

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

	public function obtenerRegistro(){

	}

    public function guardar(){

    }

	public function borrar(){

    }

	public function modificar(){

    }
}