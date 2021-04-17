<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function () use ($router) {
	// Admin
	
	// SalesPeople

	// User


	// VERSION Control
	$router->group(['prefix' => 'v1'], function() use ($router) {

		// 物件查詢
		$router->group(['prefix' => 'res'], function() use ($router) {
			$router->get('/', '');
			$router->post('/', '');
			$router->patch('/{uid}', '');
			$router->delete('/{uid}', '');
			$router->options('/', '');
		});

		

	});
});


$router->group([], function() use ($router) {


});