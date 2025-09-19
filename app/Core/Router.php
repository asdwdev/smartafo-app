<?php

namespace App\Core;

class Router
{
    private $routes = [];
    private $currentGroupMiddlewares = [];

    public function add($method, $path, $controller, $action)
    {
        $method = strtoupper($method);
        $this->routes[$method][$path] = [
            'controller'  => $controller,
            'action'      => $action,
            'middlewares' => $this->currentGroupMiddlewares, // 🚀 otomatis masukin middleware group
        ];
        return $this;
    }

    public function get($path, $controller, $action)
    {
        return $this->add("GET", $path, $controller, $action);
    }

    public function post($path, $controller, $action)
    {
        return $this->add("POST", $path, $controller, $action);
    }

    public function put($path, $controller, $action)
    {
        return $this->add("PUT", $path, $controller, $action);
    }

    public function delete($path, $controller, $action)
    {
        return $this->add("DELETE", $path, $controller, $action);
    }

    public function resource($basePath, $controller)
    {
        $this->get($basePath, $controller, "index");
        $this->get($basePath . "/create", $controller, "create");
        $this->post($basePath, $controller, "store");
        $this->get($basePath . "/{id}", $controller, "show");
        $this->get($basePath . "/{id}/edit", $controller, "edit");
        $this->put($basePath . "/{id}", $controller, "update");
        $this->delete($basePath . "/{id}", $controller, "destroy");
        return $this;
    }

    // ✅ single middleware untuk 1 route
    public function middleware($middleware)
    {
        $lastMethod = array_key_last($this->routes);
        $lastPath   = array_key_last($this->routes[$lastMethod]);

        $this->routes[$lastMethod][$lastPath]['middlewares'][] = $middleware;
        return $this;
    }

    // ✅ middleware group
    public function middlewareGroup(array $middlewares, callable $callback)
    {
        $previousGroup = $this->currentGroupMiddlewares;

        // gabungkan middleware group yang sudah ada
        $this->currentGroupMiddlewares = array_merge($this->currentGroupMiddlewares, $middlewares);

        // jalankan callback dengan router
        $callback($this);

        // kembalikan ke group sebelumnya
        $this->currentGroupMiddlewares = $previousGroup;
    }

    public function dispatch($currentPath, $requestMethod)
    {
        $requestMethod = strtoupper((new \App\Core\Request())->method());

        if (!isset($this->routes[$requestMethod])) {
            http_response_code(405);
            echo "405 Method Not Allowed";
            return;
        }

        foreach ($this->routes[$requestMethod] as $route => $routeData) {
            $controller  = $routeData['controller'];
            $action      = $routeData['action'];
            $middlewares = $routeData['middlewares'] ?? [];

            // ubah {param} jadi regex
            $pattern = preg_replace("#{[a-zA-Z_]+}#", "([^/]+)", $route);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $currentPath, $matches)) {
                array_shift($matches);

                // 🚀 jalankan semua middleware
                foreach ($middlewares as $middleware) {
                    if (is_callable($middleware)) {
                        call_user_func($middleware);
                    } elseif (is_array($middleware)) {
                        call_user_func($middleware);
                    }
                }

                $controllerInstance = new $controller();

                $reflection = new \ReflectionMethod($controllerInstance, $action);
                $params = $reflection->getParameters();

                $args = [];
                foreach ($params as $param) {
                    $type = $param->getType();
                    if ($type && $type->getName() === \App\Core\Request::class) {
                        $args[] = new \App\Core\Request();
                    } elseif (!empty($matches)) {
                        $args[] = array_shift($matches);
                    }
                }

                $result = $reflection->invokeArgs($controllerInstance, $args);

                if ($result !== null) {
                    echo $result;
                }
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
