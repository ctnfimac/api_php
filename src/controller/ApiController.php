<?php

header("Content-Type: application/json");

class ApiController{
	private $route = 'api';
    private $respuesta = ['data' =>[]];

	public function __construct($route){
		// $respuesta = ['data' =>[]];
		switch($_SERVER['REQUEST_METHOD']){
           
			case 'GET':
				// TODO: sino no hay el parametro controlador retorno un mensaje de error
				// TODO: importo el controlador conrrespondiente
				// $controlador = eval('new MascotaController();');//eval('new ' . ucfirst($_GET['controller']) . 'Controller()');
				$controlador = new MascotaModel();
				if(isset($_GET['id'])) {
					$resultado["mensaje"] = 'Retornar el usuario con el id ' . $_GET['id'];
					// TODO: utilizo el metodo que trae la mascota correspondiente

					// TODO: lo codifico a json
				}else{
                    $mascotas = $controlador->listarTodo();
                    // armo el array para poder convertirlo a json
                    foreach($mascotas as $mascota){
                        array_push($this->respuesta['data'],array('id' => $mascota->getId(), 'nombre'=> $mascota->getNombre()));
                    }
                }
                
				break;

			break;
		}

        echo json_encode($this->respuesta);
	}
	private function route($route,$usuario){
	}
}