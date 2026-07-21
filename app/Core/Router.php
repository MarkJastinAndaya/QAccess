<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $uri, callable|array $action): void
    {
        $this->register('GET', $uri, $action);
    }

    public function post(string $uri, callable|array $action): void
    {
        $this->register('POST', $uri, $action);
    }

    private function register(string $method, string $uri, callable|array $action): void
    {
        $uri = '/' . trim($uri, '/');

        $this->routes[$method][$uri] = $action;
    }

    public function dispatch(): void
    {
        $request = new Request();

        $method = $request->method();
        $uri = $request->uri();

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "<h1>404 - Page Not Found</h1>";
            exit;
        }

        $action = $this->routes[$method][$uri];

        if (is_callable($action)) {
            call_user_func($action);
            return;
        }

        [$controller, $method] = $action;

        $instance = new $controller();

        call_user_func([$instance, $method]);
    }
}