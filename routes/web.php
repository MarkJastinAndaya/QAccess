<?php

declare(strict_types=1);

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\HomeController;

$app->router()->get('/', [HomeController::class, 'index']);

$app->router()->get('/login', [AuthController::class, 'login']);
$app->router()->post('/login', [AuthController::class, 'authenticate']);
$app->router()->get('/logout', [AuthController::class, 'logout']);

$app->router()->get('/dashboard', [DashboardController::class, 'index']);