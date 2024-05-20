<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('/inicio', 'Inicio::Iniciovista');

$routes->get('/inicio', 'Inicio::cargartablappal'); // inicio general

$routes->post('/tablaRegistro', 'Inicio::cargarTb2'); //cargar tb2 con los datos seleccionados de la tb1
$routes->post('/filterT', 'FilterTb2::FilterTec'); //para el boton de filtros 

$routes->post('/Inicio/AddNotes', 'InsertNote::insert_note'); // guardar nota nueva

$routes->post('/UpdateNotes' , 'UpdateNote::UpdateNote'); //actualizar nota

$routes ->post('/RowTb2' , 'Inicio::SelectRowTB2'); //para llamar la nota

$routes->get('/informes', 'informesController::informesfn'); //en desuso