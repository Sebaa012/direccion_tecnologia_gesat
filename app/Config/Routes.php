<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');


$routes->get('/login', 'Users\LoginController::viewLogin');


$routes->post('/Users/LoginController/login', 'Users\LoginController::login');
$routes->get('/dashboard', 'Solicitudes\SolicitudController::dashboard');
$routes->get('/solicitudes', 'Solicitudes\SolicitudController::solicitudes');
$routes->post('/saveSolicitud', 'Solicitudes\SolicitudController::setSolicitud');


$routes->get('/logout', 'Users\LoginController::logout');

$routes->get('/administration', 'Users\UserController::userAdministration');
$routes->get('/administration/updateUser/(:num)', 'Users\UserController::viewUpdateUser/$1');
$routes->post('/administration/updateUser/(:num)', 'Users\UserController::updateUser/$1');
$routes->get('/administration/deleteUser/(:num)', 'Users\UserController::deleteUser/$1');
$routes->get('/administration/consult', 'Users\UserController::usuarios');
$routes->get('/administration/insert', 'Users\UserController::InsertUser');
$routes->post('/administration/saveUser', 'Users\UserController::saveUser');

$routes->get('tickets/listar', 'Solicitudes\SolicitudController::listarTicketsAjax');
$routes->post('tickets/asignar', 'Solicitudes\SolicitudController::asignarTicketsAjax');

$routes->get('/tickets/pendientes', 'Solicitudes\SolicitudController::ticketsPendientes');
