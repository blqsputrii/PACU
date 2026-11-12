@extends('layouts.auth')
@section('title', 'Dashboard')

@section('content')
<h1 class="auth-title">Hi, {{  auth()->user()->nama }}</h1>
<p class="auth-subtitle">Login sebagai {{ ucfirst(auth()->user()->role->nama_role) }}</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <div class="actions center">
        <button type="submit" class="btn">Log Out</button>
    </div>
</form>
@endsection
