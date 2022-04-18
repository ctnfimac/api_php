<?php
header("Content-Type: application/json");
// header('Content-type: application/json; charset=utf8');


class ApiController{
	private $route = 'api';
    private $respuesta;

	public function __construct($route){

		$modelo = new Model(ucwords($_GET['model']));

		switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				$registros = isset($_GET['id']) ? $modelo->obtenerRegistro($_GET['id']) : $modelo->listarTodo();
				$this->respuesta = $modelo->convertirAJson($registros);
				break;

			case 'POST':
				$info = json_decode(file_get_contents('php://input'), true);
				$this->respuesta = $modelo->guardar($info);
				break;

			case 'DELETE':
				if(isset($_GET['id'])) 
					$this->respuesta = $modelo->borrar($_GET['id']);
				break;
			
			case 'PUT':
				if(isset($_GET['id'])){
					$info = json_decode(file_get_contents('php://input'), true);
					$this->respuesta = $modelo->modificar($_GET['id'], $info);
				}
				break;

			break;
		}
		
        echo $this->respuesta;
	}
	

}