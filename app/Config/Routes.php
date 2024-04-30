<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('/inicio', 'Inicio::Iniciovista');
$routes->get('/iniciotb1', 'Inicio::cargartablappal');
$routes->get('/inicio', 'Inicio::cargartablappal');
$routes->get('/datacar', 'Inicio::DataLoadCar');

$routes->post('/Inicio/AddNotes', 'Inicio::insert_note');

$routes->get('/informes', 'informesController::informesfn');