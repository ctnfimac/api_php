<?php

header('Content-type: application/json; charset=utf8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

class ApiTransporteController{
	private $route = 'api';
    private $respuesta;

	public function __construct($route){

		$modelo = new Model(ucwords($_GET['model']));

		if(isset($_GET['method'])){
			$this->respuesta = $this->metodos($_GET['method']);
		}else{
			switch($_SERVER['REQUEST_METHOD']){
				case 'GET':
						$registros = isset($_GET['id']) ? $modelo->obtenerRegistro($_GET['id']) : $modelo->listarTodo();
						$this->respuesta = $modelo->convertirAJson($registros);
					break;

				case 'POST':

					$info = json_decode(file_get_contents('php://input'), true);
					$direccion = str_replace(' ','_',$info['direccion']);
					$url = "http://servicios.usig.buenosaires.gob.ar/normalizar/?direccion=${direccion},caba";

					$json = file_get_contents($url);
					$respuesta = json_decode($json,true);

					$longitud = $respuesta["direccionesNormalizadas"][0]["coordenadas"]["x"];
					$latitud = $respuesta["direccionesNormalizadas"][0]["coordenadas"]["y"];

					$url = 'https://ws.usig.buenosaires.gob.ar/datos_utiles/?x='.$longitud.'&y='.$latitud;
					$json = file_get_contents($url);
					$respuesta = json_decode($json,true);

					$info['latitud'] = floatval($latitud);
					$info['longitud'] = floatval($longitud);
					$info['barrio'] = $respuesta["barrio"];
					$info['comuna'] = $respuesta["comuna"];

					$this->respuesta = $modelo->guardar($info);
					break;

				case 'DELETE':
					if(isset($_GET['id'])) 
						$this->respuesta = $modelo->borrar($_GET['id']);
					break;
				
				case 'PUT':
					if(isset($_GET['id'])){
						$info = json_decode(file_get_contents('php://input'), true);
						$direccion = str_replace(' ','_',$info['direccion']);
						$registro_actual = $modelo->obtenerRegistro($_GET['id']);

						$url = "http://servicios.usig.buenosaires.gob.ar/normalizar/?direccion=${direccion},caba";

						$json = file_get_contents($url);
						$respuesta = json_decode($json,true);

						$longitud = $respuesta["direccionesNormalizadas"][0]["coordenadas"]["x"];
						$latitud = $respuesta["direccionesNormalizadas"][0]["coordenadas"]["y"];

						$url = 'https://ws.usig.buenosaires.gob.ar/datos_utiles/?x='.$longitud.'&y='.$latitud;
						$json = file_get_contents($url);
						$respuesta = json_decode($json,true);

						$info['latitud'] = floatval($latitud);
						$info['longitud'] = floatval($longitud);
						$info['barrio'] = $respuesta["barrio"];
						$info['comuna'] = $respuesta["comuna"];

						// $this->respuesta = $modelo->convertirAJson($registro_actual);

						$this->respuesta = $modelo->modificar($_GET['id'], $info);
					}
					break;
				default:
					$this->respuesta = 'Error';
				break;
			}
		}
        echo $this->respuesta;
	}


	private function metodos($method){
		$servicioTrasporte = new ApiTransporteServices();
		switch($method) {
			case 'usuarios_por_barrio':
				$resultado = $servicioTrasporte->usuarios_por_barrio();
				break;
			
			case 'usuarios_por_comuna':
				$resultado = $servicioTrasporte->usuarios_por_comuna();
				break;

			case 'login_de_usuario':
				$credenciales = json_decode(file_get_contents('php://input'), true);
				$resultado = $servicioTrasporte->login_de_usuario($credenciales);
				break;
			default:
				$resultado = 'method con valor desconocido';
				break;
		}

		return $resultado;
	}
	

}