<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\User;
use App\View;


class AdminUsersController extends Controller
{
    public function index(): View
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        dump('we are in index method users');
        $users = User::all();

        return View::make('admin' . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . 'index', ['users' => $users]);
    }

    public function create(): View
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        return View::make('admin' . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . 'create');
    }

    public function store()
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        $attributes = [];
        $attributes['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $attributes['firstName'] = $_POST['firstName'];
        $attributes['lastName'] = $_POST['lastName'];
        $attributes['email'] = $_POST['email'];
        $attributes['ext'] = $_POST['ext'];
        $attributes['username'] = $_POST['username'];
        $attributes['roomNo'] = (int)$_POST['roomNo'];

        $avatar = $_FILES['avatar'] ?? "default.png";

        $filePath = STORAGE_PATH . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $avatar['name'];

        if (isset($_FILES['avatar']))
            move_uploaded_file($avatar['tmp_name'], $filePath);

        $attributes['avatar'] = $avatar['name'];

        User::create($attributes);

        redirect('/users');
    }

    public function destroy($id)
    {
        if (!auth())
            redirect('/login');

        if (!auth()?->isAdmin())
            redirect('/');

        User::deleteById($id);

        redirect('/users');
    }

}