<?php namespace kllmp\Http;

class REST_Controller
{
	public $load;
	private $config;

	public function loadConfig(array $config){
		$this->config = $config;
		$this->load = new Loader($this);
	}


	public function get_config($index = NULL){
		if ($index!=NULL)
			return $this->config[$index];
		return $this->config;
	}

	public function fnMethod($method = ['GET', 'POST', 'PUT', 'DELETE'])
	{
		if (!is_array($method)){
			showErrorHtml("{$this->config['dir_views']}/{$this->config['template_error']}", 500, 'Internal Server Error', 'Tipo de variable no permitida en la función <b>fnMethod(array methods)</b>.');
		}

		if(!in_array( $_SERVER['REQUEST_METHOD'], $method)){
			showErrorHtml("{$this->config['dir_views']}/{$this->config['template_error']}", 405, 'Method Not Allowed');
		}
	}

}
