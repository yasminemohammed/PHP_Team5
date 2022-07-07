<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\View;

class AdminProductsController
{
    public function index(): View
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        return View::make('admin' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . 'index', ['products' => Product::all()]);
    }

    public function create(): View
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        return View::make('admin' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . 'create', ['categories' => Category::all()]);
    }

    public function store()
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        $attributes = [];
        $attributes['name'] = $_POST['name'];
        $attributes['category_id'] = (int)$_POST['category_id'];
        $attributes['price'] = (int)$_POST['price'];


        if (isset($_FILES['featureImage']))
            $productImage = $_FILES['featureImage'];
        else
            $productImage['name'] = 'default.png';

        $filePath = STORAGE_PATH . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . $productImage['name'];

        if (isset($_FILES['featureImage']))
            move_uploaded_file($productImage['tmp_name'], $filePath);

        $attributes['featureImage'] = $productImage['name'];
        Product::create($attributes);

        header("Location: /admin/products");
    }

    public function edit($id)
    {
        dd('we are edit page to edit product todo');
    }

    public function update($id)
    {
        dd('we are update method to update product todo');
    }

    public function destroy($id)
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        Product::deleteById($id);

        header("Location: /admin/products");
    }
}