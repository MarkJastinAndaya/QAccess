<?php

declare(strict_types=1);

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\MemberController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

$app->router()->get('/', [HomeController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

$app->router()->get('/login', [AuthController::class, 'login']);
$app->router()->post('/login', [AuthController::class, 'authenticate']);
$app->router()->get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

$app->router()->get('/dashboard', [DashboardController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Members
|--------------------------------------------------------------------------
*/

$app->router()->get('/members', [MemberController::class, 'index']);

$app->router()->get('/members/create', [MemberController::class, 'create']);
$app->router()->post('/members/create', [MemberController::class, 'store']);

$app->router()->get('/members/edit', [MemberController::class, 'edit']);

$app->router()->post('/members/edit',[MemberController::class,'update']);