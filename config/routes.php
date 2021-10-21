<?php

use Symfony\Component\Routing\Route;

$routes->add('home', new Route("/", [
    'controller' => "App\Controller\RestaurantsController@index"
]));
$routes->add('hello', new Route("/hello", [
    'controller' => "App\Controller\HelloController@hello"
]));
