<?php namespace Api\Http;

class REST_Controller {
	public $Method;
	
	public function __construct(){
		$this->Method=$_SERVER['REQUEST_METHOD'];
	}
	
	public function fnMethod(string $method){
		if($_SERVER['REQUEST_METHOD'] !== $method){
			http_response_code(405);
			die("Method Not Allowed");
		}
	}
}