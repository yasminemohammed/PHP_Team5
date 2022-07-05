<?php

namespace App\Controllers;

class UsersOrdersController extends Controller
{
    public function store($id)
    {
        dump('we are in store method for order');
        dump($_POST);
    }
}