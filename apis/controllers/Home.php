<?php

use kllmp\Api\Http\REST_Controller;

class Home extends REST_Controller {
	public function All() {
		echo "hola desde cualquier metodo";
	}

	public function Get(){
		self::fnMethod('GET');
		echo "hola mundo GET";
	}
	
	public function Post(){
		self::fnMethod('POST');
		echo "hola mundo POST";
	}
	
	public function Put(){
		self::fnMethod('PUT');
		echo "hola mundo PUT";
	}
	
	public function Patch(){
		self::fnMethod('PATCH');
		echo "hola mundo PATCH";
	}
	
	public function Delete(){
		self::fnMethod('DELETE');
		echo "hola mundo DELETE";
	}
	
	public function Prueba($nombre, $nombre2){
		echo "bienvenido {$nombre} - {$nombre2}";
	}
}