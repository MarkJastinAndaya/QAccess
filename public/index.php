<?php

declare(strict_types=1);

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/Core/Autoloader.php';

use App\Core\Application;
use App\Core\Config;
use App\Core\Session;

date_default_timezone_set('Asia/Manila');

Config::load();

Session::start();

$app = new Application();

require BASE_PATH . '/routes/web.php';

$app->run();