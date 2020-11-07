<?php

namespace Core\Database\User\Repository;

use Core\Database\Database;
use Core\Database\User\Entity\UserEntity;
use Core\Interfaces\Database\RepositoryInterface;
use PDO;

class UserRepository implements RepositoryInterface
{
    public static function byId(?int $id = null): UserEntity
    {
        $db = Database::getInstance();
        $row = $db->query('select * from ' . UserEntity::TABLE_NAME . ' where id = :id', ['id' => $id])->fetchObject(UserEntity::class);
        if ($row === false) {
            return new UserEntity;
        }
        return $row;
    }

    public static function all(?array $options = null): array
    {
        $db = Database::getInstance();
        return $db->query('select * from ' . UserEntity::TABLE_NAME . ' where deleted_at is null')->fetchAll(PDO::FETCH_CLASS, UserEntity::class);
    }
}
