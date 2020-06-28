<?php

if( isset($config['core']) )
{
  date_default_timezone_set($config['core']['timezone'] );

  ini_set('display_errors', $config['core']['display_errors']);
}

if(isset($config['base_url'])){
  define('APP_PATH' , $config['base_url']);
}

if(isset($config['index_page'])){
  define('APP_INDEX' , APP_PATH . $config['index_page']);
}
