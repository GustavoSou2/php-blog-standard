<?php

$routes = [
    '/' => 'HomeController@index',
    '/login' => 'LoginController@index',
    '/logout' => 'LogoutController@index',
    '/register' => 'RegisterController@index',
    '/home' => 'HomeController@index',
    // Outras rotas...
];

foreach ($routes as $route => $controller) {
    require_once __DIR__ . '/../../controller/' . explode('@', $controller)[0] . '.php';
}
