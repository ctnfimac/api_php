<?php

class Autoload{
	public function __construct(){
		// Registrar las funciones dadas como implementación de __autoload()
		// En este caso recibe una funcion anonima
		spl_autoload_register(function($class_name){
			$model_path = './model/' . $class_name . '.php';
			$controller_path = './controller/' .$class_name . '.php';
			$clases_path = './model/clases/' .$class_name . '.php';
			// echo $controller_path;
			if(file_exists($model_path)) require_once($model_path);
			if(file_exists($controller_path)) require_once($controller_path);
			if(file_exists($clases_path)) require_once($clases_path);
		});
	}
}