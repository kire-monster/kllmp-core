<?php namespace kllmp\Core;

class kllmp_app
{

    public static function Run(array $config)
    {

        //Cargamos la configuracion
        #error_reporting(E_ALL);
        ini_set('display_errors', $config['debug']);
        date_default_timezone_set($config['timezone']);



        // Obtenemos la cadena uri del servidor
        $str_uri = (substr(@$_SERVER[$config['type_uri']], 0,1) =='/') ? substr(@$_SERVER[$config['type_uri']],1) : @$_SERVER[$config['type_uri']];

        $uri = @explode('/', @str_replace($config['uri_workspace'], '', $str_uri));


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

        //Directorio Core del Framwework
        $dirCore = dirname(__FILE__) . DIRECTORY_SEPARATOR ;


        if(!file_exists( $dirCore . 'REST_Controller.php')){
          showErrorHtml("{$config['dir_views']}/{$config['template_error']}", 500, 'Internal Server Error', '<p>No se Encontro el archivo'. $dirCore . 'REST_Controller.php</p>');
        }
        if(!file_exists( $dirCore . 'showErrorHtml.php')){
          showErrorHtml("{$config['dir_views']}/{$config['template_error']}", 500, 'Internal Server Error', '<p>No se Encontro el archivo'. $dirCore . 'showErrorHtml.php</p>');
        }
        // Cargamos el controlador base
        include $dirCore . 'REST_Controller.php';

        // Inlcuimos el archivo con la funcion showErrorHtml()
        include $dirCore . 'showErrorHtml.php';


        // Cargamos el controlador dinamico -> Tomado por la URI, si existe
        if(file_exists("{$config['dir_controller']}/{$controller}.php"))
        {
            include "{$config['dir_controller']}/{$controller}.php";

            if( class_exists($controller) && method_exists($controller, $action))
            {
                if(!is_subclass_of($controller, 'kllmp\Http\REST_Controller'))
                    showErrorHtml("{$config['dir_views']}/{$config['template_error']}", 500, 'Internal Server Error', '<p>Error controller, Not valid</p>');

                $obj = new $controller();
                $obj->loadConfig($config);

                foreach(@$config['libraries'] as $key => $lib) { include $lib;}

                call_user_func_array(array($obj, $action), $param);
            }
            else
                showErrorHtml("{$config['dir_views']}/{$config['template_error']}", 500, 'Internal Server Error', '<p>Error controller/Action</p>');
        }
        else
            showErrorHtml("{$config['dir_views']}/{$config['template_error']}", 500, 'Internal Server Error', '<p>Error controller not found</p>');
    }
}
