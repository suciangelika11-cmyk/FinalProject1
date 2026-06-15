@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAAbsen.AbsenCreate')

    <div class="form-wrap">
        <div class="form-card">
            <h2><i class="fas fa-plus-circle"></i> Tambah Data Absensi</h2>

            @if ($errors->any())
                <div
                    style="background:#fdf0f0;border:1px solid #f5c6cb;border-radius:8px;padding:14px;margin-bottom:18px;color:#e05555;font-size:13px;">
                    <strong><i class="fas fa-exclamation-circle"></i> Terjadi kesalahan!</strong>

                    <ul style="margin:6px 0 0 16px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('absensi.store') }}" method="POST">
                @csrf

                <div class="fg">
                    <label>Tanggal</label>
                    <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required>
                </div>

                <div class="form-row-2">
                    <div class="fg">
                        <label>Sesi</label>
                        <input type="text" name="session" value="{{ old('session') }}" placeholder="Contoh: Sesi 1"
                            required maxlength="50">
                    </div>

                    <div class="fg">
                        <label>Jumlah Jemaat</label>
                        <input type="number" name="jumlah" value="{{ old('jumlah') }}" min="0" placeholder="0" required maxlength="10">
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="fg">
                        <label>Pengkhotbah</label>
                        <input type="text" name="pengkhotbah" value="{{ old('pengkhotbah') }}"
                            placeholder="Nama pengkhotbah" required maxlength="100">
                    </div>

                    <div class="fg">
                        <label>Pelayan</label>
                        <input type="text" name="pelayan" value="{{ old('pelayan') }}" placeholder="Nama pelayan" required maxlength="100">
                    </div>
                </div>

                <div class="btn-row" style="margin-top:24px;">
                    <a href="{{ route('absensi.index') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection