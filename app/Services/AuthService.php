<?php

declare(strict_types=1);

namespace App\Services;

use App\Core\Session;
use App\Models\User;

class AuthService
{
    public static function attempt(string $login, string $password): bool
    {
        $user = User::findByLogin($login);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['password_hash'])) {
            return false;
        }

        Session::set('user_id', $user['user_id']);
        Session::set('member_id', $user['member_id']);
        Session::set('username', $user['username']);

        return true;
    }

    public static function logout(): void
    {
        Session::destroy();
    }

    public static function check(): bool
    {
        return Session::has('user_id');
    }
}