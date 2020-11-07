<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group([
    'middleware' => Modules\App\Middleware::class,
    'prefix' => '/',
    'namespace' => 'Modules\App\Home\Controllers',
], function () {
    SimpleRouter::get('/', 'HomeController@index');
    SimpleRouter::get('/success', 'HomeController@success');
});
