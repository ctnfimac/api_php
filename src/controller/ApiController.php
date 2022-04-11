<?php
header("Content-Type: application/json");

class ApiController{
	private $route = 'api';
    private $respuesta;

	public function __construct($route){

		$modelo = $this->modelSeleccionado($_GET['model']); 

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
	
	
	private function modelSeleccionado($model){
		$modelo = null;
		switch ($model) {
			case 'banner':
				$modelo = new BannerModel();
				break;
			
			case 'servicio':
				$modelo = new ServicioModel();
				break;
				
			default:
				break;
		}
		return $modelo;
	}
}