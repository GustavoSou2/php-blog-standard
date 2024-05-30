<?php


require_once __DIR__ . '/../routes/routes.php';


$request_uri = $_SERVER['REQUEST_URI'];

if (array_key_exists($request_uri, $routes)) {
    $viewAction = $routes[$request_uri];
    list($controllerName, $action) = explode('@', $viewAction);

    require_once __DIR__ . '/../../controller/' . $controllerName . '.php';

    $controller = new $controllerName();
    $controller->$action();
} else {
    echo "Erro 404 - Página não encontrada";
}
