<?php

class Model extends Conexion{
    private $matriz = array();
    private $contador = 0;
    private $campos_str;
    private $modelo;
    private $tabla;

    function __construct($modelo){
        $campos = $modelo::getFields();
		$this->campos_str = implode($campos,",");
        $this->tabla = strtolower($modelo);
        $this->modelo = $modelo;
    }

    public function listarTodo(){
		$this->query = "SELECT $this->campos_str FROM $this->tabla";
		$tabla = $this->get_query();
		return($this->consultaAArrayDeObjetos($tabla));
    }

    public function obtenerRegistro($id){
		$this->query = "SELECT $this->campos_str FROM $this->tabla WHERE id = {$id}";
		$tabla = $this->get_query();
		return($this->consultaAArrayDeObjetos($tabla));
	}

	public function guardar($registro){}
	

    public function borrar($id){
		$dato_a_borrar = $this->obtenerRegistro($id);
		$dato_a_borrar = $this->convertirAJson($dato_a_borrar);
		if($this->contador){
			$this->query = "DELETE FROM $this->tabla WHERE id = {$id}";
			$this->set_query();
			return $dato_a_borrar;
		}
		return json_encode(array('Error' => "No existe el Registro con id {$id}"));
    }


	public function modificar($id,$registro){}

    private function consultaAArrayDeObjetos($tabla){
		while($fila = $tabla->fetch_assoc()){
             switch ($this->modelo) {
                 case 'Servicio':
                    $objeto = new Servicio($fila['id'],$fila['titulo'],$fila['descripcion'],$fila['icono']);
                    break;
                 case 'Banner':
                     $objeto = new Banner($fila['id'],$fila['titulo'],$fila['subtitulo'],$fila['boton_text']);
                    break;
                 default:
                    echo 'Modelo inexistente';
                    break;
             }
			 $this->matriz[$this->contador] = $objeto;
			 $this->contador++;
		}
		return $this->matriz;
	}

    public function convertirAJson($tabla){
		$respuesta = ['data' =>[]];
		// armo el array para poder convertirlo a json
		foreach($tabla as $row){
            switch ($this->modelo) {
                 case 'Servicio':
			        array_push($respuesta['data'],array('id' => $row->getId(), 'titulo'=> $row->getTitulo(),'descripcion'=> $row->getDescripcion(),'icono'=> $row->getIcono()));
                    break;
                 case 'Banner':
			        array_push($respuesta['data'],array('id' => $row->getId(), 'titulo'=> $row->getTitulo(),'subtitulo'=> $row->getSubtitulo(),'boton_text'=> $row->getBotonText()));
                    break;
                 default:
                    echo 'Error al convertir en Json';
                    break;
             }
		}
		return json_encode($respuesta);
	}
}