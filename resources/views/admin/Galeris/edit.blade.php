@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAGaleri.GaleriEdit')

    <div class="form-wrap">
        <div class="form-card">
            <h2>✏️ Edit Galeri Kegiatan</h2>

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

            <form action="{{ route('galeri.update', $Galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="fg">
                    <label>Judul Kegiatan</label>
                    <input type="text" name="title" value="{{ old('title', $Galeri->title) }}" required>
                </div>

                <div class="fg">
                    <label>Tanggal Kegiatan</label>
                    <input type="date" name="event_date" value="{{ old('event_date', $Galeri->event_date) }}"
                        min="{{ date('Y-m-d') }}" required>
                </div>

                <div class="fg">
                    <label>Deskripsi</label>
                    <textarea name="description" rows="3">{{ old('description', $Galeri->description) }}</textarea>
                </div>

                <div class="fg">
                    <label>Foto Galeri</label>
                    <input type="file" name="image" accept="image/*">
                    @if($Galeri->image)
                        <img src="{{ asset('storage/' . $Galeri->image) }}" class="img-preview" alt="Foto galeri">
                    @endif
                </div>

                <div class="btn-row">
                    <a href="{{ route('galeri.index') }}" class="btn-back">← Batal</a>
                    <button type="submit" class="btn-submit">✅ Update Galeri</button>
                </div>
            </form>
        </div>
    </div>

@endsection