@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAGaleri.GaleriCreate')

    <div class="form-wrap">
        <div class="form-card">
            <h2>🖼 Tambah Galeri Kegiatan</h2>

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

            <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="fg">
                    <label>Judul Kegiatan</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Ibadah Minggu" required maxlength="100">
                </div>

                <div class="fg">
                    <label>Tanggal Kegiatan</label>
                    <input type="date" name="event_date" value="{{ old('event_date') }}" min="{{ date('Y-m-d') }}" required>
                </div>

                <div class="fg">
                    <label>Deskripsi</label>
                    <textarea name="description" rows="3" required maxlength="250"
                        placeholder="Masukkan deskripsi kegiatan">{{ old('description') }}</textarea>
                </div>

                <div class="fg">
                    <label>Upload Foto</label>
                    <input type="file" name="image" accept="image/*" required>
                </div>

                <div class="btn-row">
                    <a href="{{ route('galeri.index') }}" class="btn-back">← Batal</a>
                    <button type="submit" class="btn-submit">💾 Simpan Galeri</button>
                </div>
            </form>
        </div>
    </div>

@endsection