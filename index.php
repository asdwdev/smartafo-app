<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/Core/helpers.php';

use App\Core\Router;
use App\Core\Middleware;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\TrafoController;
use App\Controllers\JurusanController;
use App\Controllers\KubikelController;
use App\Controllers\TrafoGiController;
use App\Controllers\DashboardController;
use App\Controllers\PenyulangController;
use App\Controllers\GarduIndukController;
use App\Controllers\TrafoGarduController;
use App\Controllers\GarduHubungController;
use App\Controllers\UserAccountController;
use App\Controllers\KubikelGarduController;
use App\Controllers\GarduDistribusiController;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

// route biasa
$router->get("/", HomeController::class, "index");

// guest routes
$router->middlewareGroup([Middleware::class . '::guest'], function ($router) {
    // auth routes
    $router->get("/login", AuthController::class, "showLoginForm");
    $router->post("/login", AuthController::class, "login");
    $router->get("/signup", AuthController::class, "showSignupForm");
    $router->post("/signup", AuthController::class, "signup");
});

// auth routes
$router->middlewareGroup([Middleware::class . '::auth'], function ($router) {
    // dashboard routes
    $router->get("/dashboard", HomeController::class, "dashboard");
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

    // kubikel routes
    $router->resource("/kubikel", KubikelController::class);

    // kubikel-gardu routes
    $router->resource("/kubikel-gardu", KubikelGarduController::class);

    // kubikel-gardu routes
    $router->resource("/jurusan", JurusanController::class);

    // gardu penyulang routes
    $router->resource("/user-account", UserAccountController::class);

    // Statistik
    $router->get('/statistik/penyulang-per-gi', HomeController::class, 'penyulangPerGI');
    $router->get('/statistik/gardu-per-penyulang', HomeController::class, 'garduPerPenyulang');
    $router->get('/statistik/gardu-per-area', HomeController::class, 'garduPerArea');
    $router->get('/statistik/penyulang-per-area', HomeController::class, 'penyulangPerArea');
    $router->get('/statistik/trafo-per-area', HomeController::class, 'trafoPerArea');
    $router->get('/statistik/jurusan-per-area', HomeController::class, 'jurusanPerArea');
    $router->get('/statistik/kubikel-gardu-per-area', HomeController::class, 'kubikelGarduPerArea');

    // logout
    $router->get("/logout", AuthController::class, "logout");
});


$router->dispatch($path, $method);
