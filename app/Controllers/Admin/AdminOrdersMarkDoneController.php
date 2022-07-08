<?php

namespace App\Controllers\Admin;

use App\Models\Order;

class AdminOrdersMarkDoneController
{
    public function update($id)
    {

        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        Order::find($id)->markDone();

        redirect('/');
    }
}