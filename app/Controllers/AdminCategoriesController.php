<?php

namespace App\Controllers;

use App\Models\Category;
use App\View;

class AdminCategoriesController
{
    public function create(): View
    {
        return View::make('admin' . DIRECTORY_SEPARATOR . 'categories' . DIRECTORY_SEPARATOR . 'create');
    }


    public function store()
    {
        $attributes = [];

        $attributes['name'] = $_POST['name'];

        Category::create($attributes);

        header("Location: /admin/products/create");
    }

}