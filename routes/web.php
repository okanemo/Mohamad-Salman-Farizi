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

// user
$router->get('/api/v1/user', 'V1\RegisterController@index');
$router->get('/api/v1/user/{id}', 'V1\RegisterController@show');
$router->post('/api/v1/user/add', 'V1\RegisterController@store');
$router->post('/api/v1/user/{id}/delete', 'V1\RegisterController@destroy');

$router->post('/api/v1/user/login', 'V1\LoginController@action');

// nab
$router->get('/api/v1/ib/listNAB', 'V1\NabController@index');
$router->post('/api/v1/ib/addNAB', 'V1\NabController@store');

// topup
$router->post('/api/v1/ib/topup', 'V1\TopupController@store');

// wd
$router->post('/api/v1/ib/withdraw', 'V1\WithdrawController@store');

// balance
$router->get('/api/v1/ib/balance', 'V1\BalanceController@index');