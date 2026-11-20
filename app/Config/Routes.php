<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');


$routes->get('/login', 'Users\LoginController::viewLogin');


$routes->post('/Users/LoginController/login', 'Users\LoginController::login');
$routes->get('/dashboard', 'Solicitudes\SolicitudController::dashboard');
$routes->get('/solicitudes', 'Solicitudes\SolicitudController::solicitudes');
$routes->post('/saveSolicitud', 'Solicitudes\SolicitudController::setSolicitud');

$routes->get('/reportes', 'Reportes\ReportController::reportView');
$routes->get('/reportes/bitacora', 'Reportes\ReportController::generateReport');



$routes->post('/logout', 'Users\LoginController::logout');

$routes->group(
    'administration',
    ['namespace' => 'App\Controllers\Users'],
    function ($routes) {
        $routes->get('/', 'UserController::userAdministration');
        $routes->get('consult', 'UserController::usuarios');
        $routes->get('insert', 'UserController::InsertUser');
        $routes->post('saveUser', 'UserController::saveUser');
        $routes->get('updateUser/(:num)', 'UserController::viewUpdateUser/$1');
        $routes->post('updateUser/(:num)', 'UserController::updateUser/$1');
        $routes->post('deleteUser/(:num)', 'UserController::deleteUser/$1');
    }
);

$routes->group(
    'tickets',
    ['namespace' => 'App\Controllers\Solicitudes'],
    function ($routes) {
        $routes->post('resolve/(:num)', 'SolicitudController::resolveTicket/$1');
        $routes->post('escalar/(:num)', 'SolicitudController::escalarTicket/$1');
        $routes->get('mytickets', 'SolicitudController::misTickets');
        $routes->get('listar', 'SolicitudController::listarTicketsAjax');
        $routes->post('asignar', 'SolicitudController::asignarTicketsAjax');
        $routes->post('reasignar', 'SolicitudController::reasignarTicket');
        $routes->get('pendientes', 'SolicitudController::ticketsPendientes');
    }
);
