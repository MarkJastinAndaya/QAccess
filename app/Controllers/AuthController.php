<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function login(): void
    {
        if (AuthService::check()) {
            Response::redirect('/QAccess/public/dashboard');
        }

        $this->view('auth/login');
    }

    public function authenticate(): void
    {
        $request = new Request();

        $login = trim((string) $request->input('login'));
        $password = (string) $request->input('password');

        if (!AuthService::attempt($login, $password)) {

            $this->view('auth/login', [
                'error' => 'Invalid username or password.'
            ]);

            return;
        }

        Response::redirect('/QAccess/public/dashboard');
    }

    public function logout(): void
    {
        AuthService::logout();

        Response::redirect('/QAccess/public/login');
    }
}