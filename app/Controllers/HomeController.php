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

        return View::make('index');
    }
}
