<?php

namespace App\Controllers;

use App\Sessions\Session;

abstract class Controller
{
    protected Session $session;

    public function __construct()
    {
        $this->session = new Session();
    }

}