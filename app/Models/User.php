<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    public static function findByLogin(string $login): ?array
    {
        $pdo = Database::connection();

        $sql = "
            SELECT *
            FROM users
            WHERE username = :username
            OR email = :email
            LIMIT 1
        ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'username' => $login,
            'email' => $login
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }
}
