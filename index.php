<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/Core/helpers.php';

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\DashboardController;
use App\Controllers\PenyulangController;
use App\Controllers\GarduIndukController;
use App\Controllers\GarduHubungController;
use App\Controllers\GarduDistribusiController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

// route biasa
$router->get("/", HomeController::class, "index");

// dashboard routes
$router->get("/dashboard", HomeController::class, "dashboard");

// auth routes
$router->get("/login", AuthController::class, "showLoginForm");
$router->post("/login", AuthController::class, "login");
$router->get("/signup", AuthController::class, "showSignupForm"); // optional
$router->post("/signup", AuthController::class, "signup");        // optional

// gardu distribusi routes
$router->resource("/gardu-induk", GarduIndukController::class);

// gardu penyulang routes
$router->resource("/penyulang", PenyulangController::class);

// gardu distribusi routes
$router->resource("/gardu-distribusi", GarduDistribusiController::class);

// gardu hubung routes
$router->resource("/gardu-hubung", GarduHubungController::class);


// 🚀 resource route
$router->resource("/users", UserController::class);

$router->dispatch($path, $method);
