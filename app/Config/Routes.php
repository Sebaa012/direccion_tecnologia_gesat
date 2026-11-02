<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');


$routes->get('/login', 'Users\LoginController::viewLogin');
//$routes->post('Users/LoginController/debugUser', 'Users\LoginController::debugUser');

$routes->get('/usuarios', 'Admin\AdminController::usuarios');
$routes->get('/usuarios/insert', 'Admin\AdminController::InsertUser');
$routes->post('/usuarios/saveUser', 'Admin\AdminController::saveUser');

$routes->post('/Users/LoginController/login', 'Users\LoginController::login');
$routes->get('/dashboard', 'Solicitudes\SolicitudController::dashboard');
$routes->get('/solicitudes', 'Solicitudes\SolicitudController::solicitudes');
$routes->post('/saveSolicitud', 'Solicitudes\SolicitudController::setSolicitud');


$routes->get('/logout', 'Users\LoginController::logout');
$routes->get('/usuarios/administration', 'Users\UserController::userAdministration');

$routes->get('tickets/listar', 'Solicitudes\SolicitudController::listarTicketsAjax');
$routes->post('tickets/atender/(:num)', 'Solicitudes\SolicitudController::atenderTicketsAjax');
