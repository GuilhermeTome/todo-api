<?php

namespace Modules\App\User\Controllers;

use Core\Constants\ResponseConstant;
use Core\Database\User\Repository\UserRepository;
use Modules\App\User\Models\UserModel;

class UserController
{
    public function index()
    {
        $users = UserRepository::all();

        foreach ($users as &$value) {
            $value = $value->toArray();
        }

        return json_response([
            'users' => $users
        ]);
    }

    public function info($id)
    {
        $user = UserRepository::byId($id);
        if (!$user->getId()) {
            return json_response([
                'msg' => 'This user does not exist'
            ], ResponseConstant::NO_CONTENT);
        }
        return json_response($user->toArray(false, true));
    }

    public function add()
    {
        try {
            $id = UserModel::submit();

            return json_response([
                'user' => $id,
                'msg' => 'User created successfully'
            ]);
        } catch (\Exception $e) {
            return json_response([
                'msg' => $e->getMessage()
            ], ResponseConstant::INTERNAL_SERVER_ERROR);
        }
    }

    public function edit($id)
    {
        try {
            $id = UserModel::submit($id);

            return json_response([
                'user' => $id,
                'msg' => 'User edited successfully'
            ]);
        } catch (\Exception $e) {
            return json_response([
                'msg' => $e->getMessage()
            ], ResponseConstant::INTERNAL_SERVER_ERROR);
        }
    }

    public function delete($id)
    {
        try {
            $id = UserModel::delete($id);

            return json_response([
                'user' => $id,
                'msg' => 'User deleted successfully'
            ]);
        } catch (\Exception $e) {
            return json_response([
                'msg' => $e->getMessage()
            ], ResponseConstant::INTERNAL_SERVER_ERROR);
        }
    }
}
