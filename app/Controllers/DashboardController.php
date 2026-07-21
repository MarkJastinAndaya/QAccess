<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AuthService;
use App\Core\Response;
use App\Core\Session;

class DashboardController extends Controller
{
    public function index(): void
    {
        if (!AuthService::check()) {
            Response::redirect('/QAccess/public/login');
        }

        $this->view('dashboard/index', [
            'username' => Session::get('username')
        ]);
    }
}