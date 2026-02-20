<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

#"URL", "archivo controlador PHP:: funcion"
$routes->get('/', 'Home::index');
$routes->get('/saludar', 'Home::saludar');
$routes->get('/saludar2/(:alpha)/(:num)', 'Home::saludar2/$1/$2');

# (:num), (:alpha), (:segment), o (:any)

$routes->get('/calculadora', 'Calculadora::index');
$routes->post('/calculadora/sumar', 'Calculadora::sumar');
$routes->post('/calculadora/restar', 'Calculadora::restar');
$routes->post('/calculadora/multiplicar', 'Calculadora::multiplicar');
$routes->post('/calculadora/dividir', 'Calculadora::dividir');

$routes->get('/usuarioTest', 'Home::usuarioTest');


$routes->group("usuarios", function($routes){
    $routes->get('/', 'UsuarioController::index'); #localhost:8080/usuarios
    $routes->get('/(:num)', 'UsuarioController::show/$1'); #localhost:8080/usuarios/5
    $routes->get('/(:num)/edit', 'UsuarioController::edit/$1');
    $routes->post('/(:num)/update', 'UsuarioController::update/$1');
    $routes->post('/(:num)/delete', 'UsuarioController::delete/$1');
    $routes->get('/create', 'UsuarioController::create');
    $routes->post('/store', 'UsuarioController::store');
    $routes->get('/login', 'UsuarioController::login');
    $routes->post('/login/auth', 'UsuarioController::auth');
    $routes->get('/logout', 'UsuarioController::logout');
});

#GET Mostrar usuarios (VIEW)
#GET Mostar usuario {id} (VIEW)
#GET Mostrar formulario para editar usuario {id} (VIEW)
#POST Accion: actualizar info del usuario {id} en la base de datos (Redireccion -> index)
#POST Accion: eliminar usuario {id}
#GET Mostrar formulario para crear nuevo usuario (VIEW)
#POST Accion: crear nuevo usuario en la base de datos (Redireccion -> usuarios/{id})
#GET mostrar login
#POST accion: validar login
