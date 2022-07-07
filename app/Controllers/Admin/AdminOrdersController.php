<?php

namespace App\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use App\View;

class AdminOrdersController
{
    public function create(): View
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        return View::make('admin' . DIRECTORY_SEPARATOR . 'orders' . DIRECTORY_SEPARATOR . 'create', ['users' => User::all()]);
    }

    public function store()
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        $isSuccess = Order::create($_POST);

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            if ($isSuccess)
                response()->json(["message" => "success"]);
            else
                response()->json(["message" => "failed"]);
        }
    }

}