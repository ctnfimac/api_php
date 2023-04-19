<?php

// header('Content-type: application/json; charset=utf8');
header("Access-Control-Allow-Origin: *");


class ApiTransporteServices extends Conexion{

    public function usuarios_por_barrio(){
        $this->query = "SELECT barrio, COUNT(*) AS cantidad FROM usuario GROUP BY barrio";
        $tabla = $this->get_query();
        $respuesta = [];
        foreach ($tabla as $fila) {
            if($fila['barrio'] != null)
            array_push($respuesta,array ('barrio' => $fila['barrio'], 'count' => $fila['cantidad']));
        }
        return json_encode($respuesta);
    }

    public function usuarios_por_comuna(){
        $this->query = "SELECT comuna, COUNT(*) AS cantidad FROM usuario GROUP BY comuna";
        $tabla = $this->get_query();
        $respuesta = [];
        foreach ($tabla as $fila) {
            if($fila['comuna'] != null)
            array_push($respuesta,array ('comuna' => $fila['comuna'], 'count' => $fila['cantidad']));
        }
        return json_encode($respuesta);
    }


    public function login_de_usuario($credenciales){
        $nombre = $credenciales['nombre'];
        $password = $credenciales['password'];
        $this->query = "SELECT nombre FROM administrador WHERE nombre = '".$nombre."' and contrasea = ".$password." LIMIT 1";
        $tabla = $this->get_query();
        $respuesta = [];
        foreach ($tabla as $fila) {
            array_push($respuesta,array ('nombre' => $fila['nombre']));
        }
        return json_encode($respuesta);
    }

    protected function listarTodo(){}
	protected function obtenerRegistro($id){}
	protected function guardar($registro){}
	protected function borrar($id){}
	protected function modificar($id,$registro){}
}