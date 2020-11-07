<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group([
    'middleware' => Modules\App\Middleware::class,
    'prefix' => '/user',
    'namespace' => 'Modules\App\User\Controllers',
], function () {

    SimpleRouter::get('/', 'UserController@index')->setName('AppUser');
    SimpleRouter::get('/{id}', 'UserController@info');

    SimpleRouter::post('/add', 'UserController@add');

    SimpleRouter::post('/edit/{id}', 'UserController@edit');

    SimpleRouter::post('/delete/{id}', 'UserController@delete');
});
