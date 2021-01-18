<?php

function showErrorHtml(string $ruta, int $code_error, string $titulo = '' , $error = NULL)
{
    include($ruta);
    http_response_code($code_error);
    exit(1);
}

/*
function scanDirFramework($dir, &$results = array())
{
    $files = scandir($dir);

    foreach($files as $key => $value)
    {
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);

        if(!is_dir($path))
            $results[] = $path;//Es un Archivo
        else if($value != "." && $value != "..")
        {
            scanDirFramework($path, $results);
            //$results[] = $path;//Es un directorio
        }
    }
    return $results;
}
*/
