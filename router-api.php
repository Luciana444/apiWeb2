<?php
require_once './libs/Router.php';
require_once './controllers/videojuegos-api.controller.php';

$router = new Router();

$router->addRoute('videojuegos','GET','VideojuegosApiController','GetVideojuegos');
$router->addRoute('videojuegos/:ID','GET','VideojuegosApiController','GetVideojuego');
$router->addRoute('videojuegos', 'POST', 'VideojuegosApiController', 'AgregarVideojuego'); 
$router->addRoute('videojuegos/:ID', 'DELETE', 'VideojuegosApiController', 'EliminarVideojuego');
$router->addRoute('videojuegos/:ID', 'PUT', 'VideojuegosApiController', 'EditarVideojuego');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);


