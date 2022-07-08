<?php

namespace App\Controllers\Admin;

use App\Models\Order;

class AdminOrdersDeliverController
{
    public function update($id)
    {

        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        Order::find($id)->deliver();

        redirect('/');
    }
}