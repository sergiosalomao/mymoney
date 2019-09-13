<?php

#instala o Presto
require_once '../library/Presto/init.php';
#habilitar no servidor allow_url_include=On


#includes do App
require_once '../App/config/includes.php';
require_once '../App/config/cfg.php';

#define as rotas
$routes = include '../App/config/routes.php';


$requestURI = $_SERVER['REQUEST_URI'];
$request = new PRESTO_Request($requestURI);
$params = $request->getRequest();

//PRESTO_Session::loggedOff();

if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) {
    if (isset($routes[$params['get']['request']]['controller'])) {
        $controller = $routes[$params['get']['request']]['controller'];
        $method = $routes[$params['get']['request']]['method'];
        $control = new $controller();
        $control->setParams($params);
        $control->setController($controller);
        $control->setMethod($method);
        $control->$method();
    } else
        die("rota nao Encontrada => " . $params['get']['request']);
}
if (!isset($_SESSION['logged']) || ($_SESSION['logged'] == false)) {
    $method = $routes[$params['get']['request']]['method'];
    if ($method == 'authAction' || $method == 'loginAction') {
        $controller = $routes[$params['get']['request']]['controller'];
        $control = new $controller();
        $control->setParams($params);
        $control->setController($controller);
        $control->setMethod($method);
        $control->$method();
    } else {
        $controller = 'UsuariosController';
        $control = new $controller();
        $control->setController('Usuarios');
        $method = 'loginAction';
        $control->$method();
    }
}
?>
