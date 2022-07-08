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
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        $product = Product::find($id);

        if (!$product)
            redirect('/admin/products');

        return View::make('admin' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . 'edit', [
            'categories' => Category::all(),
            'product' => $product
        ]);
    }

    public function update($id)
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

        Product::find($id)->update($attributes);

        redirect("/admin/products");
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