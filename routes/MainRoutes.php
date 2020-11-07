<?php

use Core\Constants\ResponseConstant;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

require PATH_ROUTE . 'app' . DS . 'home.php';
require PATH_ROUTE . 'app' . DS . 'user.php';

SimpleRouter::error(function(Request $request, \Exception $exception) {

    if($exception instanceof NotFoundHttpException && $exception->getCode() === 404) {
        return json_response([
            'msg' => 'Page not found'
        ], ResponseConstant::NOT_FOUND);
    }
    
});