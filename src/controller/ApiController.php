<?php
header("Content-Type: application/json");

class ApiController{
	private $route = 'api';
    private $respuesta;

	public function __construct($route){

		$mascota_model = new MascotaModel();

		switch($_SERVER['REQUEST_METHOD']){
			case 'GET':
				$mascotas = isset($_GET['id']) ? $mascota_model->obtenerRegistro($_GET['id']) : $mascota_model->listarTodo();
				$this->respuesta = $mascota_model->convertirAJson($mascotas);
			break;
		}
        echo $this->respuesta;
	}
	
	
	private function route($route,$usuario){
	}
}