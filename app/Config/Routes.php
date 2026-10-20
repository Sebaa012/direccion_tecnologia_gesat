<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('/usuarios', 'Users\UserController::usuarios');
$routes->get('/usuarios/insert', 'Users\UserController::InsertUser');
$routes->post('/usuarios/saveUser', 'Users\UserController::saveUser');
$routes->get('/login', 'Users\LoginController::viewLogin');
$routes->post('Users/LoginController/debugUser', 'Users\LoginController::debugUser');