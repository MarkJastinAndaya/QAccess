<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Member
{
    public static function all(): array
    {
        $pdo = Database::connection();

        return $pdo->query("
            SELECT *
            FROM members
            ORDER BY last_name
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare("
            SELECT *
            FROM members
            WHERE member_id=?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function update(int $id,array $data): void
    {
        $pdo=Database::connection();

        $stmt=$pdo->prepare("
            UPDATE members
            SET
                first_name=?,
                middle_name=?,
                last_name=?,
                sex_id=?,
                primary_email=?,
                primary_mobile=?,
                birth_date=?
            WHERE member_id=?
        ");

        $stmt->execute([

            $data['first_name'],
            $data['middle_name'],
            $data['last_name'],
            $data['sex_id'],
            $data['primary_email'],
            $data['primary_mobile'],
            $data['birth_date'],
            $id

        ]);
    }
}