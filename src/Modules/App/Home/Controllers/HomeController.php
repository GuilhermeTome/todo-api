<?php

namespace Modules\App\Home\Controllers;

class HomeController
{
    public function index()
    {
        return json_response([]);
    }

    public function success()
    {
        return json_response([
            'msg' => 'Mensagem enviada com sucesso'
        ]);
    }
}
