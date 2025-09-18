<?php

namespace App\Core;

class Request
{
    public function all()
    {
        return $_REQUEST;
    }

    public function input($key, $default = null)
    {
        return $_REQUEST[$key] ?? $default;
    }

    public function has($key)
    {
        return isset($_REQUEST[$key]);
    }

    public function method()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST' && isset($_POST['_method'])) {
            return strtoupper($_POST['_method']); // override
        }

        return $method;
    }

    public function path()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
