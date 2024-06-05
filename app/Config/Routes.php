<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('/inicio', 'Inicio::Iniciovista');

$routes->get('/inicio', 'Inicio::cargartablappal'); // inicio general
$routes->get('/optionReport', 'OptionReport::ViewOptionReport'); // en desuso

//reportes
$routes->get('/TecReport', 'TecReport::TecReportView'); //vista opciones de reporte
$routes->post('/CustomerReport', 'CustomerReportView::CustomerReport'); //obtener registros por fecha y por cliente
$routes->post('/TecReport/CustomerReportPost', 'TecReport::CustomerReport'); //obtener registros por fecha y por cliente



$routes->post('/tablaRegistro', 'Inicio::cargarTb2'); //cargar tb2 con los datos seleccionados de la tb1

$routes->post('/filterT', 'FilterTb2::FilterTec'); //para el boton de filtros 
$routes->post('/filterO', 'FilterTb2::FilterOp');  //para boton de filtros
$routes->post('/filterR', 'FilterTb2::FilterReac');  //para boton de filtros


$routes->post('/Inicio/AddNotes', 'InsertNote::insert_note'); // guardar nota nueva

$routes->post('/UpdateNotes' , 'UpdateNote::UpdateNote'); //actualizar nota
$routes->post('/UpdateRecord' , 'UpdateRecord::UpdateRecord'); //actualizar registro de nota activo o finalizado

$routes ->post('/RowTb2' , 'Inicio::SelectRowTB2'); //para llamar la nota
$routes ->post('/DescargarExcel' , 'ExcelController::export');//para descargar el excel de mi tabla
