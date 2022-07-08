<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Order;
use App\Models\User;
use App\View;

class HomeController
{
    public function index(): View
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            return View::make('users' . DIRECTORY_SEPARATOR . 'home');


        return View::make('admin' . DIRECTORY_SEPARATOR . 'home', ['users' => User::all(Order::class)]);
    }
}
