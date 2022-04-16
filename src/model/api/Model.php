<?php

class Model extends Conexion{
    private $matriz = array();
    private $contador = 0;
	private $campos;
    private $campos_str;
    private $modelo;
    private $tabla;

    function __construct($modelo){
        $this->campos = $modelo::getFields();
		$this->campos_str = implode($this->campos,",");
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

	public function guardar($registro){		
		/*TODO: tengo que verificar que haya un solo registro*/
        // por algun motivo para la clase Contacto $campos_update quedaba como escripcion,icono
        // por eso le tuve que hacer un substr y en el ltrim solo eliminar el id y no id,
        $campos_update = ltrim($this->campos_str, "id");//Elimino el campo id para el update
        $campos_update = substr($campos_update,1);
        $values = "";
		foreach ($registro as $campo) {
			$values = $values . "'$campo'" . ',';
		}
		$values = substr($values,0,-1); // elimino la ultima coma
		$this->query = "INSERT INTO $this->tabla ($campos_update) VALUES ($values);";
		$this->set_query();
		return json_encode(['data' => $registro]);
	}
	

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


    public function modificar($id, $registro){
        $campos_update = ltrim($this->campos_str, 'id,');//Elimino el campo id para el update
		$set_query = "";
		foreach ($registro as $campo => $valor) {
			$set_query = $set_query . "$campo = '$valor'" . ',';
		}
		$set_query = substr($set_query,0,-1);
		$this->query = "UPDATE $this->tabla SET $set_query WHERE id = '$id'";
		$this->set_query();
        return json_encode(['data' => $registro]);
    }

    private function consultaAArrayDeObjetos($tabla){
		while($fila = $tabla->fetch_assoc()){
             switch ($this->modelo) {
                 case 'Servicio':
                    $objeto = new Servicio($fila['id'],$fila['titulo'],$fila['descripcion'],$fila['icono']);
                    break;
                 case 'Banner':
                     $objeto = new Banner($fila['id'],$fila['titulo'],$fila['subtitulo'],$fila['boton_text']);
                    break;
                 case 'Articulo':
                     $objeto = new Articulo($fila['id'],$fila['titulo'],$fila['imagen_url']);
                    break;
                 case 'Portfolio':
                     $objeto = new Portfolio($fila['id'],$fila['titulo'],$fila['descripcion'],$fila['imagen_url'],$fila['web_url']);
                    break;
                 case 'Tecnologia':
                     $objeto = new Tecnologia($fila['id'],$fila['nombre'],$fila['porcentaje']);
                    break;
                 case 'Categoria':
                     $objeto = new Categoria($fila['id'],$fila['titulo'],$fila['precio'],$fila['responsive'],$fila['red_social'],$fila['formulario'],$fila['imagenes'],$fila['secciones']);
                    break;
                 case 'Contacto':
                     $objeto = new Contacto($fila['id'],$fila['descripcion'],$fila['icono']);
                    break;
                 case 'Redsocial':
                     $objeto = new Redsocial($fila['id'],$fila['titulo'],$fila['icono'],$fila['web_url']);
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
                 case 'Articulo':
			        array_push($respuesta['data'],array('id' => $row->getId(), 'titulo'=> $row->getTitulo(),'imagen_url'=> $row->getImagenUrl()));
                    break;
                 case 'Portfolio':
			        array_push($respuesta['data'],array('id' => $row->getId(), 'titulo'=> $row->getTitulo(),'descripcion'=> $row->getDescripcion(),'imagen_url'=> $row->getImagenUrl(),'web_url'=> $row->getWebUrl()));
                    break;
                 case 'Tecnologia':
			        array_push($respuesta['data'],array('id' => $row->getId(), 'nombre'=> $row->getNombre(),'porcentaje'=> $row->getPorcentaje()));
                    break;
                 case 'Categoria':
			        array_push($respuesta['data'],array('id' => $row->getId(), 'titulo'=> $row->getTitulo(),
                        'precio'=> $row->getPrecio(),'responsive'=> $row->getResponsive(),'red_social'=> $row->getRedSocial(),
                        'formulario'=> $row->getFormulario(),'imagenes'=> $row->getImagenes(),'secciones'=> $row->getSecciones(),
                    ));
                    break;
                 case 'Contacto':
			        array_push($respuesta['data'],array('id' => $row->getId(), 'descripcion'=> $row->getDescripcion(),'icono'=> $row->getIcono()));
                    break;
                 case 'Redsocial':
			        array_push($respuesta['data'],array('id' => $row->getId(), 'titulo'=> $row->getTitulo(),'icono'=> $row->getIcono(),'web_url'=> $row->getWebUrl()));
                    break;
                 default:
                    echo 'Error al convertir en Json';
                    break;
             }
		}
		return json_encode($respuesta);
	}
}