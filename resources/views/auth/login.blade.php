<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | GBI Tambunan</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            @extends('layouts.guest')

            @section('content')
                <div class="circle-bg circle1"></div>
                <div class="circle-bg circle2"></div>

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
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- FORM LOGIN -->
                    <form action="{{ route('login.perform') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukkan email anda" value="{{ old('email') }}" required>
                            @error('email')
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
                        <button type="submit" class="btn btn-login w-100 text-white">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </button>
                    </form>
                    <a href="{{ route('register') }}" class="btn btn-outline-light w-100 mt-3">
                        <i class="bi bi-person-plus"></i> Belum punya akun? Daftar
                    </a>
                    <div class="verse-box text-center">
                        <i class="bi bi-book-half"></i>
                        <strong> Mazmur 118:24</strong><br>
                        “Inilah hari yang dijadikan TUHAN, marilah kita bersorak-sorai dan bersukacita karenanya.”
                    </div>
                    <div class="text-center mt-4 footer-text">
                        © {{ date('Y') }} GBI Tambunan | Sistem Informasi Gereja
                    </div>
                </div>
            @endsection

