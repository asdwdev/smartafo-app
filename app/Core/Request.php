<?php

namespace App\Core;

class Request
{
    protected array $data;

    public function __construct()
    {
        // Ambil semua data dari POST, kecuali _method
        $this->data = $_POST;
        unset($this->data['_method']);
    }

    /**
     * Ambil semua input (POST) kecuali _method
     */
    public function all(): array
    {
        return $this->data;
    }

    /**
     * Ambil satu field input
     */
    public function input(string $key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    /**
     * Cek apakah field ada
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * Ambil hanya beberapa field
     */
    public function only(array $keys): array
    {
        return array_intersect_key($this->data, array_flip($keys));
    }

    /**
     * Ambil semua kecuali beberapa field
     */
    public function except(array $keys): array
    {
        return array_diff_key($this->data, array_flip($keys));
    }

    /**
     * Method HTTP (GET/POST/PUT/DELETE)
     */
    public function method(): string
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        if ($method === 'POST' && isset($_POST['_method'])) {
            return strtoupper($_POST['_method']); // override
        }

        return strtoupper($method);
    }

    /**
     * Path URL (tanpa query string)
     */
    public function path(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
    }

    /**
     * Validasi input berdasarkan rules
     */
    public function validate(array $rules): array
    {
        $validator = new Validator($this->all(), $rules);

        if ($validator->fails()) {
            return [false, $validator->errors()];
        }

        return [true, $this->all()];
    }
}
