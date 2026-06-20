@extends('admin.layouts.main')

@section('content')

    @include('admin.layouts.LOAGaleri.GaleriEdit')

    <div class="form-wrap">
        <div class="form-card">
            <h2>{{ "\u{270F}\u{FE0F}" }} Edit Galeri Kegiatan</h2>

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
                    <input type="text" name="judul" value="{{ old('judul', $Galeri->judul) }}" required maxlength="100">
                </div>

                <div class="fg">
                    <label>Tanggal Kegiatan</label>
                    <input type="date" name="tanggal" <input type="date" name="tanggal"
                        value="{{ old('tanggal', \Carbon\Carbon::parse($Galeri->tanggal)->format('Y-m-d')) }}">
                </div>

                <div class="fg">
                    <label>Deskripsi</label>
                    <textarea name="deksripsi" rows="3" required
                        maxlength="250">{{ old('deksripsi', $Galeri->deksripsi) }}</textarea>
                </div>

                <div class="fg">
                    <label>Foto Galeri</label>
                    <input type="file" name="foto" accept="foto/*">
                    @if($Galeri->foto)
                        <img src="{{ asset('storage/' . $Galeri->foto) }}" class="img-preview" alt="Foto galeri">
                    @endif
                </div>

                <div class="btn-row">
                    <a href="{{ route('galeri.index') }}" class="btn-back">{{ "\u{2190}" }} Batal</a>
                    <button type="submit" class="btn-submit">{{ "\u{2705}" }} Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection