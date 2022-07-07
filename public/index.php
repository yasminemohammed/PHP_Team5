<?php

declare(strict_types=1);

use App\App;
use App\Config;
use App\Controllers\Admin\AdminCategoriesController;
use App\Controllers\Admin\AdminOrdersController;
use App\Controllers\Admin\AdminProductsController;
use App\Controllers\Admin\AdminUsersController;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\UsersOrdersController;
use App\Sessions\Session;
use App\View;
use Pecee\SimpleRouter\SimpleRouter;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Helpers' . DIRECTORY_SEPARATOR . 'helpers.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

const STORAGE_PATH = __DIR__ . '/../storage';
const VIEW_PATH = __DIR__ . '/../views';

$session = new Session();
$session->start();

SimpleRouter::get('/', [HomeController::class, 'index']);

// auth
SimpleRouter::get('/login', function () use ($session) {
    if (!!auth())
        redirect('/');
    return View::make('auth' . DIRECTORY_SEPARATOR . 'login');
});
SimpleRouter::post('/login', [AuthController::class, 'login']);
SimpleRouter::post('/logout', [AuthController::class, 'logout']);

// users
SimpleRouter::get("/users/{id}/edit", [UserController::class, 'edit']);
SimpleRouter::put("/users/{id}", [UserController::class, 'update']);

// users.orders
SimpleRouter::get('users/{id}/orders', [UsersOrdersController::class, 'index']);
SimpleRouter::post('users/{id}/orders', [UsersOrdersController::class, 'store']);
SimpleRouter::delete('users/{id}/orders/{oid}', [UsersOrdersController::class, 'destroy']);


// admin.users
SimpleRouter::get('admin/users', [AdminUsersController::class, 'index']);
SimpleRouter::post('admin/users', [AdminUsersController::class, 'store']);
SimpleRouter::get('admin/users/create', [AdminUsersController::class, 'create']);
SimpleRouter::delete("admin/users/{id}", [AdminUsersController::class, 'destroy']);

// admin.products
SimpleRouter::get('/admin/products', [AdminProductsController::class, 'index']);
SimpleRouter::post('/admin/products', [AdminProductsController::class, 'store']);
SimpleRouter::get('/admin/products/create', [AdminProductsController::class, 'create']);
SimpleRouter::delete('/admin/products/{id}', [AdminProductsController::class, 'destroy']);

// admin.categories
SimpleRouter::get('/admin/categories/create', [AdminCategoriesController::class, 'create']);
SimpleRouter::post('/admin/categories', [AdminCategoriesController::class, 'store']);

// admin.orders
SimpleRouter::get('/admin/orders/create', [AdminOrdersController::class, 'create']);
SimpleRouter::post('/admin/orders', [AdminOrdersController::class, 'store']);

(new App(new Config($_ENV)))->run();
