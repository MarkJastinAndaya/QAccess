<?php

declare(strict_types=1);

namespace App\Core;

class View
{
    public static function render(string $view, array $data = []): void
    {
        extract($data);

        $content = BASE_PATH . '/resources/views/' . $view . '.php';

        if (!file_exists($content)) {
            http_response_code(500);
            exit("View not found: {$view}");
        }

        require BASE_PATH . '/resources/views/layouts/app.php';
    }
}