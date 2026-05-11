@extends('layouts.guest')

@section('title', 'Login | GBI Tambunan')

@section('content')
<div class="login-card">
    <div class="text-center">
        <div class="logo-circle">
            <i class="bi bi-cross"></i>
        </div>
        <h2>GBI Tambunan</h2>
        <p class="mb-4" style="opacity: 0.85;">Silakan login untuk masuk ke sistem gereja</p>
    </div>

    <!-- Alert Error -->
    @if(session('error'))
        <div class="alert alert-danger text-center">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success text-center">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- FORM LOGIN -->
    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email / Username</label>
            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror"
                placeholder="Masukkan email atau username" value="{{ old('login') }}" required>
            @error('login')
                <small class="text-warning">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Masukkan password" required>
            @error('password')
                <small class="text-warning">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Ingat saya
                </label>
            </div>
            <a href="#" class="small-link">Lupa Password?</a>
        </div>
        
        <button type="submit" class="btn btn-login w-100">
            <i class="bi bi-box-arrow-in-right me-2"></i> Login
        </button>
    </form>
    
    <a href="{{ route('register') }}" class="btn btn-outline-light w-100 mt-3">
        <i class="bi bi-person-plus me-2"></i> Belum punya akun? Daftar
    </a>
    
    <div class="verse-box text-center">
        <i class="bi bi-book-half me-2"></i>
        <strong>Mazmur 118:24</strong>
        <p class="mb-0 mt-2 small">"Inilah hari yang dijadikan TUHAN, marilah kita bersorak-sorai dan bersukacita karenanya."</p>
    </div>
</div>
@endsection