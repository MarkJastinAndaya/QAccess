<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Member
{
    public static function all(string $search = '', bool $archived = false): array
    {
        $pdo = Database::connection();

        $statusSql = $archived ? 'deleted_at IS NOT NULL' : 'deleted_at IS NULL';

        if ($search === '') {
            $stmt = $pdo->query("
                SELECT *
                FROM members
                WHERE {$statusSql}
                ORDER BY last_name
            ");

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $stmt = $pdo->prepare("
            SELECT *
            FROM members
            WHERE {$statusSql}
              AND (
                    first_name LIKE ?
                 OR middle_name LIKE ?
                 OR last_name LIKE ?
                 OR primary_email LIKE ?
              )
            ORDER BY last_name
        ");

        $keyword = "%{$search}%";

        $stmt->execute([
            $keyword,
            $keyword,
            $keyword,
            $keyword
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare("
            SELECT *
            FROM members
            WHERE member_id = ?
            LIMIT 1
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function update(int $id, array $data): void
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare("
            UPDATE members
            SET
                first_name = ?,
                middle_name = ?,
                last_name = ?,
                sex_id = ?,
                primary_email = ?,
                primary_mobile = ?,
                birth_date = ?
            WHERE member_id = ?
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

    public static function archive(int $id): void
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare("
            UPDATE members
            SET deleted_at = NOW()
            WHERE member_id = ?
        ");

        $stmt->execute([$id]);
    }

    public static function restore(int $id): void
    {
        $pdo = Database::connection();

        $stmt = $pdo->prepare("
            UPDATE members
            SET deleted_at = NULL
            WHERE member_id = ?
        ");

        $stmt->execute([$id]);
    }
}