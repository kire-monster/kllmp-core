<?php namespace kllmp\Http;

class Loader
{
  private $instancia;


	function __construct(&$super){
		$this->instancia = $super;
	}

	public function View($pagina___='' , $data___ = array())
	{
		if(strpos($pagina___, '.php') === false)
			$pagina___ .= '.php';
    	

	    $vistaError__Conf = "{$this->instancia->get_config('dir_views')}/{$this->instancia->get_config('template_error')}";
	    $dirVistas__Conf = $this->instancia->get_config('dir_views');

		if(is_file("{$dirVistas__Conf}/{$pagina___}"))
		{
			if(!is_array($data___))
				showErrorHtml("{$vistaError__Conf}", 500, 'Internal Server Error', 'Tipo de variable no permitida en la funcion <b>vista(string _vista_, array _datos_)</b>');
			extract($data___ , EXTR_SKIP);
			include "{$dirVistas__Conf}/{$pagina___}";
		}
		else
		{
			showErrorHtml("{$vistaError__Conf}", 404, 'Not Found', '<p>The requested URL was not found on this server.</p> <p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p> <p> File: ' .$pagina___ . '</p>' );
		}

	}
}
