<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthPageController extends Controller
{
    public function login()
    {
        return view('halaman.login');
    }
}
