<?php namespace kllmp\Api\Http;
    
class AppServer {
	public $controller=DEFAULT_CONTROLLER;
	public $action=DEFAULT_METHOD;
	public $param = array();
	
	public $pathControllers='controllers';
	
	public function run($quit){
		$ruta = @str_replace($quit, '', $_SERVER['REQUEST_URI']);
		$seg = @explode('/', $ruta);
		$this->controller = (count($seg) > 1 && trim($seg[0]!==''))? $seg[0]:$this->controller;
		$this->action = (count($seg) >= 2 && trim($seg[1])!=='')? $seg[1]:$this->action;
		
		if(count($seg)>2){
			unset($seg[0]);
			unset($seg[1]);
			foreach($seg as $k => $v){
				if(trim($v)!==''){
					array_push($this->param, urldecode($v));		
				}
			}
		}
		
		
		if(file_exists("{$this->pathControllers}/{$this->controller}.php")){
			include("{$this->pathControllers}/{$this->controller}.php");

			if( class_exists($this->controller) && method_exists($this->controller, $this->action)){
				$obj = new $this->controller();
				call_user_func_array(array($obj, $this->action), $this->param);	
			}else{
				http_response_code(500);
				die("Internal Server Error - Error controller/Action");
				exit(1);
			}
		}else{
			http_response_code(500);
			die("Internal Server Error - Error controller");
			exit(1);
		}		
	}
}