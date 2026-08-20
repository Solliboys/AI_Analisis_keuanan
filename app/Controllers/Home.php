<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function admin()
    {
        return view('admin/dashboard');
    }

    public function superadmin()
    {
        return view('admin/dashboard');
    }
}
