@extends('layouts.guest')

@section('title', 'Log In')
@section('subtitle', "You're almost done!")

@section('content')
<form method="POST" action="{{ route('login.store') }}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label fw-medium small">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
            placeholder="Enter your email"
            class="form-control pacu-input @error('email') is-invalid @enderror" required>
        @error('email')
            <div class="invalid-feedback ps-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="form-label fw-medium small">Password</label>
        <input type="password" id="password" name="password"
            placeholder="Enter your password"
            class="form-control pacu-input @error('password') is-invalid @enderror" required>
        @error('password')
            <div class="invalid-feedback ps-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-grid col-8 mx-auto mb-3">
        <button type="submit" class="btn btn-pacu shadow-sm">Log In</button>
    </div>

    <div class="text-center">
        <a href="{{ route('register') }}" class="text-decoration-none text-muted small">
            Don't have an account? <span class="fw-semibold text-pacu text-decoration-underline">Sign Up</span>
        </a>
    </div>
</form>
@endsection
