<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');



// $routes->get('mytry', 'MyTry::index');
// $routes->get('mytry/msg', 'MyTry::msg');



$routes->get('user', 'User::index');
$routes->post('user/insert', 'User::insert');
$routes->get('user/show', 'User::show');
$routes->get('user/edit/(:num)', 'User::edit/$1');
$routes->post('user/update', 'User::update');
$routes->get('user/delete/(:num)', 'User::delete/$1');



















