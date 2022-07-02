<?php

declare(strict_types=1);

use App\App;
use App\Config;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Helpers\Utils;
use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

const STORAGE_PATH = __DIR__ . '/../storage';
const VIEW_PATH = __DIR__ . '/../views';


$params = Utils::parseUrl($_SERVER['REQUEST_URI']);

$router = new Router();

$router
    ->get('/', [HomeController::class, 'index'])

    // user
    ->get("/users/" . ($params['users'] ?? ""), [UserController::class, 'show'])
    ->get('/users', [UserController::class, 'index'])
    ->post('/users', [UserController::class, 'store'])
    ->delete("/users/" . ($params['users'] ?? ""), [UserController::class, 'delete'])
    ->put("/users/" . ($params['users'] ?? ""), [UserController::class, 'update'])
    ->get("/users/" . ($params['users'] ?? "") . "/edit", [UserController::class, 'edit'])
    ->get('/users/create', [UserController::class, 'create']);

(new App(
    $router,
    ['uri' => ($_SERVER['REQUEST_URI'] != '/' ? rtrim($_SERVER['REQUEST_URI'], '/') : "/"), 'method' => ($_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD']), 'params' => $params],
    new Config($_ENV)
))->run();
