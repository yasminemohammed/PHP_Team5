<?php

declare(strict_types=1);

use App\App;
use App\Config;
use App\Controllers\AdminCategoriesController;
use App\Controllers\AdminProductsController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use Pecee\SimpleRouter\SimpleRouter;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

const STORAGE_PATH = __DIR__ . '/../storage';
const VIEW_PATH = __DIR__ . '/../views';


SimpleRouter::get('/', [HomeController::class, 'index']);

// users
SimpleRouter::get('/users', [UserController::class, 'index']);
SimpleRouter::get('/users/create', [UserController::class, 'create']);
SimpleRouter::get("/users/{id}/edit", [UserController::class, 'edit']);
SimpleRouter::post('/users', [UserController::class, 'store']);
SimpleRouter::put("/users/{id}", [UserController::class, 'update']);
SimpleRouter::delete("/users/{id}", [UserController::class, 'destroy']);

//products
SimpleRouter::get('/admin/products', [AdminProductsController::class, 'index']);
SimpleRouter::post('/admin/products', [AdminProductsController::class, 'store']);
SimpleRouter::get('/admin/products/create', [AdminProductsController::class, 'create']);
SimpleRouter::delete('/admin/products/{id}', [AdminProductsController::class, 'destroy']);

// categories
SimpleRouter::get('/admin/categories/create', [AdminCategoriesController::class, 'create']);
SimpleRouter::post('/admin/categories', [AdminCategoriesController::class, 'store']);

SimpleRouter::setDefaultNamespace('\App\Controllers');


(new App(new Config($_ENV)))->run();
