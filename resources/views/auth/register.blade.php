@extends('layouts.auth')
@section('title', 'Register')

@section('content')
<h1 class="auth-title">Hi, there!</h1>
<p class="auth-subtitle">Register your account now!</p>

<form method="POST" action="{{ route('register.store') }}" novalidate>
    @csrf

    <div class="form-group">
        <label for="nama">Name</label>
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Enter your name" value="{{  old('nama') }}" required>
        @error('nama')
            <p class="error">{{  $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
        @error('password')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password_confirmation">Verify Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Re-enter your password" required>
    </div>

    <div class="form-group">
        <label for="idrole">Role</label>
        <select id="idrole" name="idrole" class="form-control" style="color: #333; background-color: #fff;" required>
            <option value="" disabled {{ old('idrole') ? '' : 'selected' }}>Select your role</option>
            @foreach ($roles as $role)
                <option value="{{  $role->idrole }}"
                    {{  old('idrole') == $role->idrole ? 'selected' : '' }}>
                    {{  ucfirst($role->role_name) }}
            </option>
            @endforeach
        </select>
        @error('idrole')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="switch-text">
        <a href="{{ route('login') }}">I already have an account</a>
    </div>

    <div class="actions">
        <button type="submit" class="btn">Sign Up</button>
        <a href="{{ route('login') }}" class="btn">Log In</a>
    </div>
</form>
@endsection
