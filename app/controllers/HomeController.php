<?php

namespace App\Controllers;

class HomeController
{
    // HomeController.php
    public function index()
    {
        if (empty($_SESSION['user'])) {
            header("Location: /login");
        } else {
            header("Location: /dashboard");
        }
        exit;
    }

    public function dashboard()
    {
        return view('dashboard/index');
    }
}
