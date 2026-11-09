<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');


$routes->get('/login', 'Users\LoginController::viewLogin');


$routes->post('/Users/LoginController/login', 'Users\LoginController::login');
$routes->get('/dashboard', 'Solicitudes\SolicitudController::dashboard');
$routes->get('/solicitudes', 'Solicitudes\SolicitudController::solicitudes');
$routes->post('/tickets/resolve/(:num)', 'Solicitudes\SolicitudController::resolveTicket/$1');
$routes->post('/tickets/escalar/(:num)', 'Solicitudes\SolicitudController::escalarTicket/$1');
$routes->post('/saveSolicitud', 'Solicitudes\SolicitudController::setSolicitud');


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

$routes->get('tickets/listar', 'Solicitudes\SolicitudController::listarTicketsAjax');
$routes->post('tickets/asignar', 'Solicitudes\SolicitudController::asignarTicketsAjax');

$routes->get('/tickets/pendientes', 'Solicitudes\SolicitudController::ticketsPendientes');
