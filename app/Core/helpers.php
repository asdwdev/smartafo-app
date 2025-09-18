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
