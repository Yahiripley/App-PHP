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