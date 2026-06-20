@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAAbsen.AbsenEdit')

    <div class="form-wrap">
        <div class="form-card">
            <h2>
                <i class="fas fa-pen-to-square"></i>
                Edit Data Absensi
            </h2>

            @if ($errors->any())
                <div
                    style="background:#fdf0f0;border:1px solid #f5c6cb;border-radius:8px;padding:14px;margin-bottom:18px;color:#e05555;font-size:13px;">

                    <strong>
                        <i class="fas fa-circle-exclamation"></i>
                        Terjadi kesalahan!
                    </strong>

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
                    <input type="date" name="tanggal" value="{{ old('tanggal', $absensi->tanggal) }}" required>
                </div>

                <div class="form-row-2">
                    <div class="fg">
                        <label>Sesi</label>
                        <input type="text" name="sesi_ibadah" value="{{ old('sesi_ibadah', $absensi->sesi_ibadah) }}" required maxlength="50">
                    </div>

                    <div class="fg">
                        <label>Jumlah Jemaat</label>

                        <input type="number" name="jumlah" value="{{ old('jumlah', $absensi->jumlah) }}" min="0" required maxlength="10">

                    </div>
                </div>

                <div class="form-row-2">
                    <div class="fg">
                        <label>Pengkhotbah</label>
                        <input type="text" name="pengkhotbah" value="{{ old('pengkhotbah', $absensi->pengkhotbah) }}"
                            required maxlength="100">
                    </div>
                </div>

                <div class="btn-row" style="margin-top:24px;">
                    <a href="{{ route('absensi.index') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i>
                        {{ "\u{2190}" }} Batal
                    </a>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-floppy-disk"></i>
                        {{"\u{2705}"}} Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection