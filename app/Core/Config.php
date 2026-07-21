<?php

declare(strict_types=1);

namespace App\Core;

class Config
{
    private static array $config = [];

    public static function load(): void
    {
        $configPath = BASE_PATH . '/config';

        foreach (glob($configPath . '/*.php') as $file) {

            $name = basename($file, '.php');

            self::$config[$name] = require $file;
        }
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        $segments = explode('.', $key);

        $value = self::$config;

        foreach ($segments as $segment) {

            if (!isset($value[$segment])) {
                return $default;
            }

            $value = $value[$segment];
        }

        return $value;
    }
}