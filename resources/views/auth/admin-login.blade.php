@extends('layouts.login')

@section('content')

@include('layouts.LOLogin')

    <a href="{{ route('home') }}" class="back-btn">
        <i class="bi bi-arrow-left"></i>
        <span>Kembali</span>
    </a>

    <div class="login-wrapper">

        <div class="login-card">

            {{-- LOGO --}}
            <div class="logo-wrapper">

                @if(file_exists(public_path('gambar/gbi.jpeg')))
                    <img src="{{ asset('gambar/gbi.jpeg') }}" alt="Logo GBI Tambunan">
                @else
                    <div class="logo-placeholder"></div>
                @endif

            </div>

            {{-- TITLE --}}
            <h1 class="login-title">
                GBI Tambunan
            </h1>

            <p class="login-subtitle">
                Silakan login untuk masuk ke sistem informasi gereja
            </p>

            {{-- ALERT --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- FORM --}}
            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="mb-3">

                    <label for="login" class="form-label">
                        Email / Username
                    </label>

                    <input type="text" name="login" id="login" value="{{ old('login') }}"
                        placeholder="Masukkan email atau username" class="form-control @error('login') is-invalid @enderror"
                        required>

                </div>

                <div class="mb-3">

                    <label for="password" class="form-label">
                        Password
                    </label>

                    <input type="password" name="password" id="password" placeholder="Masukkan password"
                        class="form-control @error('password') is-invalid @enderror" required>

                </div>

                <div class="form-check mb-4">

                    <input type="checkbox" name="remember" class="form-check-input" id="remember">

                    <label class="form-check-label" for="remember">
                        Ingat saya
                    </label>

                </div>

                <button type="submit" class="login-btn">
                    Login
                </button>

            </form>

            {{-- VERSE --}}
            <div class="verse-box">

                <div class="verse-title">
                    Mazmur 118:24
                </div>

                <p class="verse-text">
                    “Inilah hari yang dijadikan TUHAN,
                    marilah kita bersorak-sorai dan
                    bersukacita karenanya.”
                </p>

            </div>

            {{-- FOOTER --}}
            <div class="footer-text">
                © 2026 GBI Tambunan
            </div>

        </div>

    </div>

@endsection