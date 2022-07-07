<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if (!!auth())
            redirect('/');

        $username = $_POST['username'] ?? "";
        $password = $_POST['password'] ?? "";

        if (!$user = User::authenticate($username, $password)) {
            $this->session->set('errors.login', 'invalid username or password.');
            redirect('/login');
        }

        $this->session->regenerate();
        $this->session->set('auth', $user);

        redirect('/');
    }

    public function logout()
    {
        if (!auth())
            redirect('/login');

        $this->session->destroy();

        redirect('/login');
    }
}