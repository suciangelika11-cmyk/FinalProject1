@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAKhotbah.KhotbahCreate')

    <div class="form-wrap">
        <div class="form-card">
            <h2>{{ "\u{1F399}\u{FE0F}" }} Tambah Khotbah</h2>

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

            <form action="{{ route('khotbah.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="fg">
                    <label>Judul Khotbah</label>
                    <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Contoh: Iman dalam Cobaan"
                        required maxlength="150">
                </div>

                <div class="fg">
                    <label>Link Video</label>
                    <input type="text" name="video" value="{{ old('video') }}" placeholder="https://youtube.com/">
                </div>

                <div class="fg">
                    <label>Tanggal Khotbah</label>
                    <input type="date" name="tanggal_khotbah" value="{{ old('tanggal_khotbah') }}" min="{{ date('Y-m-d') }}">
                </div>

                <div class="fg">
                    <label>Deskripsi</label>
                    <textarea name="deksripsi" rows="3" maxlength="250"
                        placeholder="Masukkan ringkasan khotbah">{{ old('deksripsi') }}</textarea>
                </div>

                <div class="fg">
                    <label>Thumbnail Video</label>
                    <input type="file" name="thumbnail" accept="image/*">
                </div>

                <div class="btn-row">
                    <a href="{{ route('khotbah.index') }}" class="btn-back">← Batal</a>
                    <button type="submit" class="btn-submit">{{ "\u{1F4BE}" }} Simpan</button>
                </div>
            </form>
        </div>
    </div>

@endsection