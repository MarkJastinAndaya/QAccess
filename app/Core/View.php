<?php

declare(strict_types=1);

namespace App\Core;

class View
{
    public static function render(string $view, array $data = []): void
    {
        extract($data);

        $file = BASE_PATH . '/resources/views/' . $view . '.php';

        if (!file_exists($file)) {
            http_response_code(500);

            exit("View not found: {$view}");
        }

        require $file;
    }
}