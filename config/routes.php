<?php
$request  = $_SERVER['REQUEST_URI'];
    
$params = explode("/", $request);
$route = array(
    "controller" => "Test",
    "language" => (isset($params[1]) && !empty($params[1]) ? strtolower($params[1]) : 'us'),
    "method" => (isset($params[2]) && !empty($params[2]) ? strtolower($params[2]) : 'index')
);
if($route['language'] != "ru" && $route['language']!="us")
        $route['language'] = "us";
$lang = $route['language'];

$filename = "./controller/". $route['controller'] .".php";

if(file_exists($filename)) {
    require_once $filename;
    $controller = new $route['controller']($dbh);
    
    if(method_exists($controller, $route['method']))
        $page = $controller->$route['method']($lang);
    else
        die("Method not found.");
} else die("File not found.");