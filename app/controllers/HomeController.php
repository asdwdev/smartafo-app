<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        return "Ini halaman home";
    }

    public function dashboard()
    {
        return view('dashboard/index');
    }
}
