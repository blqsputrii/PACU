<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function showRegister()
  {
    $roles = Role::orderBy('idrole')->get();

    return view('auth.register', compact('roles'));
  }

  public function register(Request $request)
  {
    $data = $request->validate([
        'nama' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email', 'max:100', 'unique:user,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'idrole' => ['required', 'exists:role,idrole'],
    ]);

    User::create($data);

    return redirect()->route('login')
        ->with('status', 'Welcome! You’re all set.');
  }


  public function showLogin()
  {
    return view('auth.login');
  }
  public function login(Request $request)
  {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    return back()
        ->withErrors(['email' => 'Incorrect emaail or password'])
        ->onlyInput('email');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
  }
}
