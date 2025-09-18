<?php

if (!function_exists('view')) {
    /**
     * Render view dari folder app/views
     */
    function view($name, $data = [])
    {
        $viewPath = __DIR__ . "/../views/{$name}.php";

        if (!file_exists($viewPath)) {
            throw new Exception("View {$name} tidak ditemukan di {$viewPath}");
        }

        // ekstrak variabel supaya bisa dipakai di view
        extract($data);

        // simpan output buffering
        ob_start();
        include $viewPath;
        return ob_get_clean();
    }
}
