@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAAbsen.AbsenEdit')

    <div class="form-wrap">
        <div class="form-card">
            <h2>✏️ Edit Data Absensi</h2>

            @if ($errors->any())
                <div
                    style="background:#fdf0f0;border:1px solid #f5c6cb;border-radius:8px;padding:14px;margin-bottom:18px;color:#e05555;font-size:13px;">
                    <strong>Terjadi kesalahan!</strong>

                    <ul style="margin:6px 0 0 16px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('absensi.update', $absensi) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="fg">
                    <label>Tanggal</label>
                    <input type="date" name="date" value="{{ old('date', $absensi->date) }}" required>
                </div>

                <div class="form-row-2">
                    <div class="fg">
                        <label>Sesi</label>
                        <input type="text" name="session" value="{{ old('session', $absensi->session) }}" required>
                    </div>

                    <div class="fg">
                        <label>Jumlah Jemaat</label>
                        <input type="number" name="jumlah" value="{{ old('jumlah', $absensi->jumlah) }}" min="0" required>
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="fg">
                        <label>Pengkhotbah</label>
                        <input type="text" name="pengkhotbah" value="{{ old('pengkhotbah', $absensi->pengkhotbah) }}"
                            required>
                    </div>

                    <div class="fg">
                        <label>Pelayan</label>
                        <input type="text" name="pelayan" value="{{ old('pelayan', $absensi->pelayan) }}" required>
                    </div>
                </div>

                <div class="btn-row" style="margin-top:24px;">
                    <a href="{{ route('absensi.index') }}" class="btn-back">← Batal</a>
                    <button type="submit" class="btn-submit">✓ Perbarui Absensi</button>
                </div>
            </form>
        </div>
    </div>
@endsection