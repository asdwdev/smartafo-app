<?php

if (!function_exists('view')) {
    function view($name, $data = [])
    {
        $viewPath = __DIR__ . "/../views/{$name}.php";

        if (!file_exists($viewPath)) {
            throw new Exception("View {$name} tidak ditemukan di {$viewPath}");
        }

        extract($data);

        ob_start();
        include $viewPath;
        return ob_get_clean();
    }
}

/**
 * Helper untuk generate URL ke asset di folder public
 */
if (!function_exists('asset')) {
    function asset($path)
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];

        // hilangkan slash ganda
        $path = ltrim($path, '/');

        return "{$protocol}://{$host}/app/public/{$path}";
    }
}

if (!function_exists('error')) {
    /**
     * Render error untuk field tertentu.
     *
     * @param array $errors
     * @param string $field
     * @return string
     */
    function error(array $errors, string $field): string
    {
        if (!empty($errors[$field])) {
            $msg = implode('<br>', $errors[$field]);
            return "<p class='mt-1 text-sm text-red-600'>{$msg}</p>";
        }
        return '';
    }
}


$__blocks = [];
$__currentBlock = null;

function startBlock($name)
{
    global $__currentBlock;
    ob_start();
    $__currentBlock = $name;
}

function endBlock()
{
    global $__blocks, $__currentBlock;
    $__blocks[$__currentBlock] = ob_get_clean();
    $__currentBlock = null;
}

function extend($layoutPath)
{
    global $__blocks;
    extract($__blocks);
    require __DIR__ . "/../Views/$layoutPath.php";
}
