<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\View;

class AdminProductsController
{
    public function index(): View
    {
        return View::make('admin' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . 'index', ['products' => Product::all()]);
    }

    public function create(): View
    {
        return View::make('admin' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . 'create', ['categories' => Category::all()]);
    }

    public function store()
    {
        $attributes = [];
        $attributes['name'] = $_POST['name'];
        $attributes['category_id'] = (int)$_POST['category_id'];
        $attributes['price'] = (int)$_POST['price'];

        $productImage = $_FILES['featureImage'] ?? "default.png";

        $filePath = STORAGE_PATH . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . $productImage['name'];

        if (isset($_FILES['featureImage']))
            move_uploaded_file($productImage['tmp_name'], $filePath);

        $attributes['featureImage'] = $productImage['name'];
        Product::create($attributes);

        header("Location: /admin/products");
    }

    public function destroy($id)
    {
        Product::deleteById($id);

        header("Location: /admin/products");
    }
}