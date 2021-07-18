<?php

define('flag', true);

require_once 'system/loader.php';
$uri = RequestUri();
$uri = str_replace('/notes/', '/', $uri);

$parts = explode('/', $uri);

$Controller = $parts['1'];

$Method = $parts['2'];



$params = array();
for ($i = 3; $i < count($parts); $i++):
    $params[] = $parts[$i];
endfor;



$ClassName = ucfirst($Controller) . 'Controller';

/*
require_once "mvc/controller/$Controller.php";
*/

$ClassName = new $ClassName();

call_user_func_array(array($ClassName , $Method)  , $params);


/*

$ClassName = new $ClassName();

*/


