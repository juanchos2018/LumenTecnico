<?php

/** @var \Laravel\Lumen\Routing\Router $router */



$router->get('/', function () use ($router) {
    return $router->app->version();
});



$router->post('/login', 'UsuarioController@Login');


$router->get('/users', 'UsuarioController@records');
$router->get('/clientes', 'ClienteController@records');


$router->get('/servicio', 'ServicioController@records');
$router->post('/servicio', 'ServicioController@store');


$router->post('/servicioimp', 'ServicioController@storeimp');


//probar despues en el hotstin
$router->get('/SedEmail', 'ServicioController@SedEmail');

