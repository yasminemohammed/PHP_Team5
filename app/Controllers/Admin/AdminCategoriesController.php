<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\View;

class AdminCategoriesController
{
    public function create(): View
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        return View::make('admin' . DIRECTORY_SEPARATOR . 'categories' . DIRECTORY_SEPARATOR . 'create');
    }

    public function store()
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        $attributes = [];

        $attributes['name'] = $_POST['name'];

        Category::create($attributes);

        header("Location: /admin/products/create");
    }

}