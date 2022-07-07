<?php

namespace App\Controllers;

use App\Models\User;
use App\View;


class UserController
{
    public function index(): View
    {
        dump('we are in index method users');
        $users = User::all();

        return View::make('users' . DIRECTORY_SEPARATOR . 'index', ['users' => $users]);
    }

    public function create(): View
    {
        return View::make('users' . DIRECTORY_SEPARATOR . 'create');
    }

    public function store()
    {
        $attributes = [];
        $attributes['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $attributes['firstName'] = $_POST['firstName'];
        $attributes['lastName'] = $_POST['lastName'];
        $attributes['ext'] = $_POST['ext'];
        $attributes['username'] = $_POST['username'];

        $avatar = $_FILES['avatar'] ?? "default.png";

        $filePath = STORAGE_PATH . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $avatar['name'];

        if (isset($_FILES['avatar']))
            move_uploaded_file($avatar['tmp_name'], $filePath);

        $attributes['avatar'] = $avatar['name'];

        User::create($attributes);

        header("Location: /users");
    }

    public function edit($id): View
    {
        $user = User::getOneBy('id', $id);

        if (!$user)
            header('Location: /');
        return View::make('users' . DIRECTORY_SEPARATOR . 'edit', ['id' => $user->getId(), 'user' => $user]);

    }

    public function update($id)
    {
        $attributes = [];
        $attributes['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $attributes['firstName'] = $_POST['firstName'];
        $attributes['lastName'] = $_POST['lastName'];
        $attributes['ext'] = $_POST['ext'];
        $attributes['username'] = $_POST['username'];
        $attributes['roomNo'] = (int)$_POST['roomNo'];

        $avatar = $_FILES['avatar'] ?? "default.png";

        $filePath = STORAGE_PATH . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $avatar['name'];

        if (isset($_FILES['avatar']))
            move_uploaded_file($avatar['tmp_name'], $filePath);

        $attributes['avatar'] = $avatar['name'];

        User::update($attributes, $id);

        header("Location: /users");
    }

    public function destroy($id)
    {
        User::deleteById($id);

        header("Location: /users");
    }


}