<?php

namespace App\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\View;

class AdminOrdersController
{

    public function index(): View
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        if (empty($_GET['user_id']))
            unset($_GET['user_id']);

        if (empty($_GET['startDate']))
            unset($_GET['startDate']);

        if (empty($_GET['endDate']))
            unset($_GET['endDate']);

        $data = [];

        if (isset($_GET['user_id']) && !empty($_SERVER['QUERY_STRING'])) {
            $user = User::getOneBy('id', $userId = $_GET['user_id']);
            $data[] = [
                'user' => $user,
                'orders' => $user?->orders(true, $_GET['startDate'] ?? null, $_GET['endDate'] ?? null)
            ];
            return View::make('admin' . DIRECTORY_SEPARATOR . 'orders' . DIRECTORY_SEPARATOR . 'checks', ['users' => [$user], 'data' => $data]);
        }

        $users = User::all();

        foreach ($users as $user) {

            $data[] = [
                'user' => $user,
                'orders' => $user?->orders(true)
            ];
        }

        return View::make('admin' . DIRECTORY_SEPARATOR . 'orders' . DIRECTORY_SEPARATOR . 'checks', ['users' => $users, 'data' => $data]);
    }

    public function create(): View
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');


        return View::make('admin' . DIRECTORY_SEPARATOR . 'orders' . DIRECTORY_SEPARATOR . 'create', [
            'users' => User::all(),
            'products' => Product::all()
        ]);
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