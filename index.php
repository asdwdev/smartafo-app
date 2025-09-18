<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/Core/helpers.php';

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\TrafoController;
use App\Controllers\DashboardController;
use App\Controllers\PenyulangController;
use App\Controllers\GarduIndukController;
use App\Controllers\GarduHubungController;
use App\Controllers\UserAccountController;
use App\Controllers\KubikelTeknisController;
use App\Controllers\GarduDistribusiController;
use App\Controllers\TrafoGarduController;
use App\Controllers\TrafoGiController;

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

// penyulang routes
$router->resource("/penyulang", PenyulangController::class);

// gardu hubung routes
$router->resource("/gardu-hubung", GarduHubungController::class);

// gardu distribusi routes
$router->resource("/gardu-distribusi", GarduDistribusiController::class);

// trafo routes
$router->resource("/trafo", TrafoController::class);

// trafo gi routes
$router->resource("/trafo-gi", TrafoGiController::class);

// trafo gardu routes
$router->resource("/trafo-gardu", TrafoGarduController::class);

// kubikel teknis routes
$router->resource("/kubikel-teknis", KubikelTeknisController::class);

// gardu penyulang routes
$router->resource("/user-account", UserAccountController::class);

$router->dispatch($path, $method);
