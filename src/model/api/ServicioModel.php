<?php
header("Content-Type: application/json");

class ServicioModel extends Model{

    function __construct(){
		parent::__construct('Servicio');
	}

}