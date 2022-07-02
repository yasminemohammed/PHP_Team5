<?php

declare(strict_types=1);

use App\App;
use App\Config;
use App\Controllers\AdminCategoriesController;
use App\Controllers\AdminProductsController;
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

    // users
    ->get("/users/" . ($params[1] ?? ""), [UserController::class, 'show'])
    ->get('/users', [UserController::class, 'index'])
    ->post('/users', [UserController::class, 'store'])
    ->delete("/users/" . ($params[1] ?? ""), [UserController::class, 'delete'])
    ->put("/users/" . ($params[1] ?? ""), [UserController::class, 'update'])
    ->get("/users/" . ($params[1] ?? "") . "/edit", [UserController::class, 'edit'])
    ->get('/users/create', [UserController::class, 'create']);

//products
->
get('/admin/products', [AdminProductsController::class, 'index'])
    ->post('/admin/products', [AdminProductsController::class, 'store'])
    ->get('/admin/products/create', [AdminProductsController::class, 'create'])
    ->delete('/admin/products/1', [AdminProductsController::class, 'destroy'])


    // categories
    ->get('/admin/categories/create', [AdminCategoriesController::class, 'create'])
    ->post('/admin/categories', [AdminCategoriesController::class, 'store']);

dump($_SERVER['REQUEST_URI']);
dump($params);
dump($_SERVER['REQUEST_METHOD']);
dd('here');

(new App(
    $router,
    ['uri' => ($_SERVER['REQUEST_URI'] != '/' ? rtrim($_SERVER['REQUEST_URI'], '/') : "/"), 'method' => ($_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD']), 'params' => $params],
    new Config($_ENV)
))->run();
