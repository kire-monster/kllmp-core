<?php

function showErrorHtml(string $ruta, int $code_error, string $titulo , string $error)
{
    include($ruta);
    http_response_code($code_error);
    exit(1);
}