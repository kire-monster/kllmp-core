<?php namespace kllmp\Http;

class REST_Controller
{
	private $view_error='';
	private $folder_views='';

	public function loadConfig(array $config)
	{
		$this->view_error = "{$config['dir_views']}/{$config['template_error']}";
    $this->folder_views = $config['dir_views'];
	}

	public function fnMethod($method = ['GET', 'POST', 'PUT', 'DELETE'])
	{
		if (!is_array($method))
			showErrorHtml($this->view_error, 500, 'Internal Server Error', 'Tipo de variable no permitida en la función <b>fnMethod(array methods)</b>.');


		if(!in_array( $_SERVER['REQUEST_METHOD'], $method))
			showErrorHtml($this->view_error, 405, 'Method Not Allowed');
		
	}

	public function View($pagina___='' , $data___ = array())
	{
		if(strpos($pagina___, '.php') === false)
			$pagina___ .= '.php';


		if(is_file("{$this->folder_views}/{$pagina___}"))
		{
			if(!is_array($data___))
				showErrorHtml($this->view_error, 500, 'Internal Server Error', 'Tipo de variable no permitida en la funcion <b>vista(string _vista_, array _datos_)</b>');
			extract($data___ , EXTR_SKIP);
			include "{$this->folder_views}/{$pagina___}";
		}
		else
			showErrorHtml($this->view_error, 404, 'Not Found', '<p>The requested URL was not found on this server.</p> <p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p> <p> File: ' .$pagina___ . '</p>' );
	}
}
