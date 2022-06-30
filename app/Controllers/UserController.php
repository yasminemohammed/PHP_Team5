<?php

namespace App\Controllers;

use App\View;

class UserController
{
    public function index(): View
    {
        return View::make('users' . DIRECTORY_SEPARATOR . 'index');

    }
}