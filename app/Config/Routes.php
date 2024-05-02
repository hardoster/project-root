<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('/inicio', 'Inicio::Iniciovista');

$routes->get('/inicio', 'Inicio::cargartablappal');

$routes->post('/tablaRegistro', 'Inicio::cargarTb2');


$routes->get('/datacar', 'Inicio::DataLoadCar');

$routes->post('/Inicio/AddNotes', 'Inicio::insert_note');

$routes->get('/informes', 'informesController::informesfn');