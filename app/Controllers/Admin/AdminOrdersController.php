<?php

namespace App\Controllers\Admin;

use App\Models\Order;
<<<<<<< HEAD
use App\Models\Product;
=======
>>>>>>> [add-feature] Admin can create a manual order for a specific user.
use App\Models\User;
use App\View;

class AdminOrdersController
{
<<<<<<< HEAD

    public function index(): View
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        if (empty($_GET['startDate']))
            unset($_GET['startDate']);

        if (empty($_GET['endDate']))
            unset($_GET['endDate']);


        $users = User::all();

        $data = [];

        if (isset($_GET['user_id']) && !empty($_SERVER['QUERY_STRING'])) {
            $user = User::getOneBy('id', $userId = $_GET['user_id']);

            $data[] = [
                'user' => $user,
                'orders' => $user?->orders(true, $_GET['startDate'] ?? null, $_GET['endDate'] ?? null)
            ];
            return View::make('admin' . DIRECTORY_SEPARATOR . 'orders' . DIRECTORY_SEPARATOR . 'checks', ['users' => $users, 'data' => $data]);
        }

        foreach ($users as $user) {
            $data[] = [
                'user' => $user,
                'orders' => $user?->orders(true)
            ];
        }

        return View::make('admin' . DIRECTORY_SEPARATOR . 'orders' . DIRECTORY_SEPARATOR . 'checks', ['users' => $users, 'data' => $data]);
    }

=======
>>>>>>> [add-feature] Admin can create a manual order for a specific user.
    public function create(): View
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

<<<<<<< HEAD

        return View::make('admin' . DIRECTORY_SEPARATOR . 'orders' . DIRECTORY_SEPARATOR . 'create', [
            'users' => User::all(),
            'products' => Product::all()
        ]);
=======
        return View::make('admin' . DIRECTORY_SEPARATOR . 'orders' . DIRECTORY_SEPARATOR . 'create', ['users' => User::all()]);
>>>>>>> [add-feature] Admin can create a manual order for a specific user.
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