<?php

require '../app/Core/Autoloader.php';

define('BASE_PATH', dirname(__DIR__));

use App\Core\Config;
use App\Core\Database;

Config::load();

$pdo = Database::connection();

$passwordHash = password_hash('admin123', PASSWORD_DEFAULT);

$stmt = $pdo->prepare("
INSERT INTO users
(
    member_id,
    username,
    email,
    password_hash,
    is_active
)
VALUES
(
    1,
    'admin',
    'admin@qaccess.local',
    :hash,
    1
)
");

$stmt->execute([
    'hash' => $passwordHash
]);

echo "Admin account created successfully.";