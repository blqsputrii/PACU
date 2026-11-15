@extends('layouts.guest')

@section('title', 'Sign Up')
@section('subtitle', 'Register your account now!')

@section('content')
<form method="POST" action="{{ route('register.store') }}">
    @csrf

    <div class="mb-3">
        <label for="nama" class="form-label fw-medium small">Name</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
            placeholder="Enter your name"
            class="form-control pacu-input @error('nama') is-invalid @enderror" required>
        @error('nama')
            <div class="invalid-feedback ps-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label fw-medium small">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
            placeholder="Enter your email"
            class="form-control pacu-input @error('email') is-invalid @enderror" required>
        @error('email')
            <div class="invalid-feedback ps-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label fw-medium small">Password</label>
        <input type="password" id="password" name="password"
            placeholder="Min. 8 characters"
            class="form-control pacu-input @error('password') is-invalid @enderror" required>
        @error('password')
            <div class="invalid-feedback ps-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label fw-medium small">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
            placeholder="Re-enter your password"
            class="form-control pacu-input" required>
    </div>

    <div class="mb-2">
        <label for="idrole" class="form-label fw-medium small">Role</label>
        <select id="idrole" name="idrole"
            class="form-select pacu-input @error('idrole') is-invalid @enderror" required>
            <option value="" disabled selected>Select your role</option>
            @foreach ($roles as $role)
                <option value="{{ $role->idrole }}" {{ old('idrole') == $role->idrole ? 'selected' : '' }}>
                    {{ ucfirst($role->nama_role ?? $role->role_name) }}
                </option>
            @endforeach
        </select>
        @error('idrole')
            <div class="invalid-feedback ps-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="text-end mb-3">
        <span class="text-muted" style="font-size: 0.72rem;">I already have an account</span>
    </div>

    <div class="row g-2">
        <div class="col-6 d-grid">
            <button type="submit" class="btn btn-pacu shadow-sm">Sign Up</button>
        </div>
        <div class="col-6 d-grid">
            <a href="{{ route('login') }}" class="btn btn-pacu shadow-sm">Log In</a>
        </div>
    </div>
</form>
@endsection
