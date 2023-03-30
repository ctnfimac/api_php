<?php

class Autoload{
	public function __construct(){
		// Registrar las funciones dadas como implementación de __autoload()
		// En este caso recibe una funcion anonima
		spl_autoload_register(function($class_name){
			$model_path = './model/' . $class_name . '.php';
			$controller_path = './controller/' .$class_name . '.php';
			$modelapi_path = './model/api/' .$class_name . '.php';
			$modelapiclases_path = './model/api/clases/' .$class_name . '.php';
			
			$modelapitransporteclases_path = './model/api/clasesTransporte/' .$class_name . '.php';

			if(file_exists($model_path)) require_once($model_path);
			if(file_exists($controller_path)) require_once($controller_path);
			if(file_exists($modelapi_path)) require_once($modelapi_path);
			if(file_exists($modelapiclases_path)) require_once($modelapiclases_path);
			
			if(file_exists($modelapitransporteclases_path)) require_once($modelapitransporteclases_path);
		});
	}
}