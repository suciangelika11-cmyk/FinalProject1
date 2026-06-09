@extends('admin.layouts.main')

@section('content')

    @include('admin.layouts.LOAAccount.AkunCreate')

    <div class="account-page">
        <div class="account-header">
            <div>
                <h1>Pelayan</h1>
                <p>Buat akun baru untuk pelayan yang akan mengakses dashboard.</p>
            </div>
        </div>

        <div class="account-card">
            <div class="account-card-top">
                <h2>Form Tambah Akun</h2>
                <p>Isi data dengan benar agar akun bisa langsung digunakan untuk login.</p>
            </div>

            <div class="account-card-body">
                @if ($errors->any())
                    <div class="alert-danger-custom">
                        <strong>Terjadi kesalahan.</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('accounts.store') }}" method="POST">
                    @csrf

                    <div class="section-title">Informasi Dasar</div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control-custom" value="{{ old('name') }}"
                                placeholder="Masukkan nama lengkap" required maxlength="150">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control-custom" value="{{ old('username') }}"
                                placeholder="Masukkan username" required maxlength="100">
                        </div>

                        <div class="form-group full">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control-custom" value="{{ old('email') }}"
                                placeholder="Masukkan email aktif" required maxlength="100">
                        </div>
                    </div>

                    <div class="section-title">Keamanan Akun</div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Password</label>

                            <div class="password-wrapper">
                                <input type="password" name="password" id="password" class="form-control-custom"
                                    placeholder="Minimal 8 karakter" required maxlength="50">

                                <button type="button" class="password-toggle" data-target="password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>

                            <div class="form-help">Gunakan password yang cukup kuat.</div>
                        </div>

                        <div class="form-group">
                            <label>Konfirmasi Password</label>

                            <div class="password-wrapper">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control-custom" placeholder="Ulangi password" required maxlength="50">

                                <button type="button" class="password-toggle" data-target="password_confirmation">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="section-title">Hak Akses</div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-select-custom" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="pelayan" {{ old('role') == 'pelayan' ? 'selected' : '' }}>Pelayan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status Akun</label>
                            <select name="is_active" class="form-select-custom" required>
                                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="action-row">
                        <a href="{{ route('accounts.index') }}" class="btn-cancel">Batal</a>
                        <button type="submit" class="btn-save">Simpan Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Admin/AkunCreate.js') }}"></script>

@endsection