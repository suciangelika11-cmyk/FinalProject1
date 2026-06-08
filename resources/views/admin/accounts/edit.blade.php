@extends('admin.layouts.main')

@section('content')

    @include('admin.layouts.LOAAccount.AkunEdit')

    <script src="{{ asset('js/Admin/AkunEdit.js') }}"></script>

    <div class="account-page">
        <div class="account-header">
            <div>
                <h1>Edit Akun</h1>
                <p>Perbarui data akun admin atau pelayan sesuai kebutuhan aksesnya.</p>
            </div>
        </div>

        <div class="account-card">
            <div class="account-card-top">
                <h2>Form Edit Akun</h2>
                <p>Ubah informasi akun, role, status, atau password bila diperlukan.</p>
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

                <form action="{{ route('accounts.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="section-title">Informasi Dasar</div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control-custom"
                                value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control-custom"
                                value="{{ old('username', $user->username) }}" required>
                        </div>

                        <div class="form-group full">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control-custom"
                                value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>

                    <div class="section-title">Keamanan Akun</div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Password Baru</label>

                            <div class="password-wrapper">
                                <input type="password" name="password" id="password" class="form-control-custom"
                                    placeholder="Kosongkan jika tidak diubah">

                                <button type="button" class="password-toggle" onclick="togglePassword('password', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>

                            <div class="form-help">Isi hanya jika ingin mengganti password.</div>
                        </div>

                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>

                            <div class="password-wrapper">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control-custom" placeholder="Ulangi password baru">

                                <button type="button" class="password-toggle"
                                    onclick="togglePassword('password_confirmation', this)">
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
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="pelayan" {{ old('role', $user->role) == 'pelayan' ? 'selected' : '' }}>Pelayan
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status Akun</label>
                            <select name="is_active" class="form-select-custom" required>
                                <option value="1" {{ old('is_active', $user->is_active) == 1 ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="0" {{ old('is_active', $user->is_active) == 0 ? 'selected' : '' }}>Nonaktif
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="action-row">
                        <a href="{{ route('accounts.index') }}" class="btn-cancel">Batal</a>
                        <button type="submit" class="btn-save">Update Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection