<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/Core/helpers.php';

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

// route biasa
$router->get("/", HomeController::class, "index");

// auth routes
$router->get("/login", AuthController::class, "showLoginForm");
$router->post("/login", AuthController::class, "login");
$router->get("/signup", AuthController::class, "showSignupForm"); // optional
$router->post("/signup", AuthController::class, "signup");        // optional


// 🚀 resource route
$router->resource("/users", UserController::class);

$router->dispatch($path, $method);
