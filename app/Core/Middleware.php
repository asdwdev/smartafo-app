<?php

namespace App\Core;

class Middleware
{
    public static function auth()
    {
        if (empty($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }
    }

    public static function guest()
    {
        if (!empty($_SESSION['user'])) {
            header("Location: /dashboard");
            exit;
        }
    }
}
