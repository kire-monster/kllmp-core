<?php namespace kllmp\Core;

class AppServer_kllmp 
{
    private $controller='';
    private $action='hola';

    public function Run(array $config)
    {

        //Cargamos la configuracion
        #error_reporting(E_ALL);
        ini_set('display_errors', $config['debug']);
        date_default_timezone_set($config['timezone']);

        defined('APP_PATH') or define('APP_PATH' , $config['base_url']);
        defined('APP_INDEX') or define('APP_INDEX' , APP_PATH . $config['index_page']);
        defined('WORKSPACE') or define('WORKSPACE', $config['uri_workspace']);


        //$uri = @explode('/', @str_replace($config['uri_workspace'], '', $_SERVER['PATH_INFO']));
        $uri = @explode('/', @str_replace($config['uri_workspace'], '', $_SERVER['REQUEST_URI']));

        $controller   = (count($uri)>0 && trim($uri[0]) )? ucfirst($uri[0]):  $config['default_controller'];
        $action       = (count($uri)>1 && trim($uri[1]) )? ucfirst($uri[1]):  $config['default_action'];


        //Obtenemos los parametros
        $param = array();
        if(count($uri)>2)
        {
            unset($uri[0]);
            unset($uri[1]);
            foreach($uri as $k => $v)
            {
                if(trim($v)!=='')
                    array_push($param, urldecode($v));
            }
        }

        if(file_exists("{$config['path_controller']}/{$controller}.php"))
        {
            include "{$config['path_controller']}/{$controller}.php";

            if( class_exists($controller) && method_exists($controller, $action))
            {
                if(!is_subclass_of($controller, 'kllmp\Controllers\kllmp_Controller'))
                    showErrorHtml($view_error, 500, 'Internal Server Error', '<p>Error controller, Not valid</p>');

                $obj = new $controller();
                $obj->view_error   = "{$config['foler_views']}/{$config['template_error']}";
                $obj->folder_views = $config['foler_views'];
                
                call_user_func_array(array($obj, $action), $param);
            }
            else
                showErrorHtml("{$config['foler_views']}/{$config['template_error']}", 500, 'Internal Server Error', '<p>Error controller/Action</p>');
        }
        else
            showErrorHtml("{$config['foler_views']}/{$config['template_error']}", 500, 'Internal Server Error', '<p>Error controller not found</p>');		
    }
}