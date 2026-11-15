<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthPageController extends Controller
{
    public function register()
    {
        return view('halaman.register');
    }
    public function login()
    {
        return view('halaman.login');
    }
}
