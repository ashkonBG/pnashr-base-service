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
    return [
        config('app.name'),
        $router->app->version()
    ];
});

/**
 * Mobile Applications
 */
$router->group(['prefix' => 'mobile'], function () use ($router) {
    $router->post('/check', 'MobileController@checkForUpdate');
});

/**
 * Categories
 */
$router->group(['prefix' => 'categories'], function () use ($router) {
    $router->get('roots', 'CategoryController@roots');
    $router->get('{category}/children', 'CategoryController@children');
    $router->get('{category}/parent', 'CategoryController@parent');
    $router->get('{category}/descendants', 'CategoryController@descendants');
    $router->get('{category}/ancestors', 'CategoryController@ancestors');
});

/**
 * Products
 */
$router->group(['prefix' => 'products'], function () use ($router) {
    $router->get('/', 'ProductController@index');
    $router->get('/{productId}', 'ProductController@show');
});

/**
 * Packages
 */
$router->group(['prefix' => 'packages'], function () use ($router) {
    $router->get('/', 'PackageController@index');
    $router->get('/{packageId}', 'PackageController@show');
});
