@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAKhotbah.KhotbahEdit')

    <div class="form-wrap">
        <div class="form-card">
            <h2>✏️ Edit</h2>

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

            <form action="{{ route('khotbah.update', $khotbah->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="fg">
                    <label>Judul Khotbah</label>
                    <input type="text" name="title" value="{{ old('title', $khotbah->title) }}" required maxlength="150">
                </div>

                <div class="fg">
                    <label>Link Video</label>
                    <input type="text" name="video" value="{{ old('video', $khotbah->video) }}"
                        placeholder="https://youtube.com/">
                </div>

                <div class="fg">
                    <label>Tanggal Khotbah</label>
                    <input type="date" name="sermon_date" value="{{ old('sermon_date', $khotbah->sermon_date) }}"
                        min="{{ date('Y-m-d') }}">
                </div>

                <div class="fg">
                    <label>Deskripsi</label>
                    <textarea name="description" rows="3" maxlength="250">{{ old('description', $khotbah->description) }}</textarea>
                </div>

                <div class="fg">
                    <label>Thumbnail Video</label>
                    <input type="file" name="thumbnail" accept="image/*">

                    @if($khotbah->thumbnail)
                        <img src="{{ asset('storage/' . $khotbah->thumbnail) }}" class="img-preview" alt="Thumbnail khotbah">
                    @endif
                </div>

                <div class="btn-row">
                    <a href="{{ route('khotbah.index') }}" class="btn-back">← Batal</a>
                    <button type="submit" class="btn-submit">✅ Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection