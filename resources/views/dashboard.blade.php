@extends('layouts.auth')
@section('title', Dashboard)

@section('content')
<h1 class="auth-title">Hi, {{  auth()->user()->user_name }}</h1>
<p class="auth-subtitle">Login sebagai {{ ucfirst(auth()->user()->role->role_name) }}</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <div class="actions center">
        <button type="submit" class="btn">Log Out</button>
    </div>
</form>
@endsection
