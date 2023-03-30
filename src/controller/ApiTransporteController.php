<?php
header('Content-type: application/json; charset=utf8');


class ApiTransporteController{
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

			break;
		}
		
        echo $this->respuesta;
	}
	

}