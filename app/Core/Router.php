<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function add($method, $path, $controller, $action)
    {
        $method = strtoupper($method);
        $this->routes[$method][$path] = [$controller, $action];
    }

    public function get($path, $controller, $action)
    {
        $this->add("GET", $path, $controller, $action);
    }

    public function post($path, $controller, $action)
    {
        $this->add("POST", $path, $controller, $action);
    }

    public function put($path, $controller, $action)
    {
        $this->add("PUT", $path, $controller, $action);
    }

    public function delete($path, $controller, $action)
    {
        $this->add("DELETE", $path, $controller, $action);
    }

    // 🚀 resource helper
    public function resource($basePath, $controller)
    {
        $this->get($basePath, $controller, "index");              // list
        $this->get($basePath . "/create", $controller, "create"); // form create
        $this->post($basePath, $controller, "store");             // simpan
        $this->get($basePath . "/{id}", $controller, "show");     // detail
        $this->get($basePath . "/{id}/edit", $controller, "edit"); // form edit
        $this->put($basePath . "/{id}", $controller, "update");   // update
        $this->delete($basePath . "/{id}", $controller, "destroy"); // hapus
    }

    public function dispatch($currentPath, $requestMethod)
    {
        $requestMethod = strtoupper($requestMethod);

        if (!isset($this->routes[$requestMethod])) {
            http_response_code(405);
            echo "405 Method Not Allowed";
            return;
        }

        foreach ($this->routes[$requestMethod] as $route => [$controller, $action]) {
            // ubah {param} jadi regex
            $pattern = preg_replace("#{[a-zA-Z_]+}#", "([^/]+)", $route);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $currentPath, $matches)) {
                array_shift($matches);

                $controllerInstance = new $controller();

                // cek apakah method butuh Request
                $reflection = new \ReflectionMethod($controllerInstance, $action);
                $params = $reflection->getParameters();

                $args = [];
                foreach ($params as $param) {
                    $type = $param->getType();
                    if ($type && $type->getName() === \App\Core\Request::class) {
                        // kalau butuh Request, buat instance
                        $args[] = new \App\Core\Request();
                    } elseif (!empty($matches)) {
                        // ambil param dari URL
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
