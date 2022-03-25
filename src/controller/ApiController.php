<?php

header("Content-Type: application/json");

class ApiController{
	private $route = 'api';
    private $respuesta;

	public function __construct($route){

		switch($_SERVER['REQUEST_METHOD']){
           
			case 'GET':
				// TODO: sino no hay el parametro controlador retorno un mensaje de error
				// TODO: importo el controlador conrrespondiente
				// $controlador = eval('new MascotaController();');//eval('new ' . ucfirst($_GET['controller']) . 'Controller()');
				$mascota_model = new MascotaModel();
				if(isset($_GET['id'])) {
					// TODO: utilizo el metodo que trae la mascota correspondiente

					// TODO: lo codifico a json
				}else{
                    $mascotas = $mascota_model->listarTodo();
					$this->respuesta = $mascota_model->convertirJson($mascotas);
                }
			break;

		}

        echo $this->respuesta;
	}
	
	
	private function route($route,$usuario){
	}
}