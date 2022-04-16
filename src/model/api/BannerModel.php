<?php
header("Content-Type: application/json");

class BannerModel extends Model{

	function __construct(){
		parent::__construct('Banner');
	}
	
}