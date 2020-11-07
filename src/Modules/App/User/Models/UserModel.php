<?php

namespace Modules\App\User\Models;

use Core\Database\User\EntityRule\UserEntityRule;
use Core\Database\User\Repository\UserRepository;
use Exception;

class UserModel
{
    public static function submit(?int $id = null)
    {
        $user = UserRepository::byId($id);

        $user->setName(input_post('name', $user->getName()))
            ->setEmail(input_post('email', $user->getEmail()))
            ->setAvatar(input_post('avatar', $user->getEmail()));

        if(input_post('password')){
            $user->setPassword(input_post('password'), true);
        }

        if ($user->getId() && (int)$user->getId() === $id) {
            UserEntityRule::update($user);
            return $user->getId();
        } else {
            UserEntityRule::insert($user);
            return $user->getId();
        }

        throw new Exception("This user does not exists");
    }

    public static function delete($id)
    {
        $user = UserRepository::byId($id);
        if (!$user->getId()) {
            throw new Exception("This user does not exists");
        }
        UserEntityRule::delete($user);
    }
}
