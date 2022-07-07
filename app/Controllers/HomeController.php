<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class HomeController
{
    public function index(): View
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            return View::make('users' . DIRECTORY_SEPARATOR . 'home');


        return View::make('index');
    }
}
