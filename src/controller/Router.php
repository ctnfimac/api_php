<?php

class Router{
	private $route = 'home';

	public function __construct($route){
        // echo $route;
		$macotas = new MascotaModel();
		$datos = $macotas->traerTodo();
		echo "<h2>Datos de la tabla Mascotas:</h2>\n";

		foreach($datos as $flower){
			echo "id: " . $flower->getId() . ", nombre: " . $flower->getNombre() . "<br>";
		}
	}

	private function route($route,$usuario){
	}
}