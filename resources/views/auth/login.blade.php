@extends('layouts.auth')
@section('title', 'Login')

@section('content')
<h1 class="auth-title">Hi, there!</h1>
<p class="auth-subtitle">Welcome back!</p>

@if (session('status'))
<div class="alert-success">{{  session('status') }}</div>
@endif

<form method="POST" action="{{ route('login.store') }}" novalidate>
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
        @error('password')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="actions center">
        <button type="submit" class="btn">Log In</button>
    </div>

    <div class="switch-text" style="text-align:center; margin-top:16px;">
        <a href="{{  route('register') }}>I don't have an account</a>
    </div>
</form>
@endsection
