<?php

namespace App\Controllers;

<<<<<<< HEAD
use App\Models\Order;
use App\View;

class UsersOrdersController extends Controller
{
    public function index($userId): View
    {

        if (!auth() || $userId != auth()?->getId())
            redirect('/login');

        return View::make('users' . DIRECTORY_SEPARATOR . 'orders', ['orders' => auth()->orders()]);
    }

    public function store($userId)
    {
        if (!auth() || $userId != auth()?->getId())
            redirect('/login');

        $isSuccess = Order::create($_POST + ['customer_id' => $userId]);

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            if ($isSuccess)
                response()->json(["message" => "success"]);
            else
                response()->json(["message" => "failed"]);
        }

        redirect('/');
    }

    public function destroy($userId, $orderId)
    {
        Order::deleteById($orderId);

        redirect("/users/$userId/orders");
    }


=======
class UsersOrdersController extends Controller
{
    public function store($id)
    {
        dump('we are in store method for order');
        dump($_POST);
    }
>>>>>>> [edit-files] write routes for user orders.
}