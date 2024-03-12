<?php

use App\Core\Route;
use App\Core\RouteCollection;
use App\Controllers\BookController;
use App\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Rutas API
|--------------------------------------------------------------------------
|
| Aquí es donde se registran las rutas API de la aplicación.
|
*/

$routes = new RouteCollection();

$routes->addRoute(Route::get('/book', [BookController::class, 'index']));
$routes->addRoute(Route::post('/book', [BookController::class, 'store']));

$routes->addRoute(Route::get('/author', [AuthorController::class, 'index']));
$routes->addRoute(Route::get('/author/show/{id}', [AuthorController::class, 'show']));
$routes->addRoute(Route::post('/author', [AuthorController::class, 'store']));


return $routes;