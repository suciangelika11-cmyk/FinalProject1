@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOATentang.TentangEdit')

  <div class="form-card">
    <div class="form-card-title">Edit Data Tentang Gereja</div>

    @if ($errors->any())
      <div
        style="background:#fdf0f0;border:1px solid #e05555;border-radius:8px;padding:14px;margin-bottom:20px;color:#e05555;">
        <strong>Terjadi kesalahan!</strong>
        <ul style="padding-left:18px;margin-top:6px;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('tentang.update', $tentang->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="fg">
        <label>Sejarah Gereja</label>
        <textarea name="sejarah" rows="5" required maxlength="250">{{ old('sejarah', $tentang->sejarah) }}</textarea>
      </div>

      <div class="form-row">
        <div class="fg">
          <label>Visi</label>
          <textarea name="visi" rows="4" required maxlength="150">{{ old('visi', $tentang->visi) }}</textarea>
        </div>
        <div class="fg">
          <label>Misi</label>
          <textarea name="misi" rows="4" required maxlength="150">{{ old('misi', $tentang->misi) }}</textarea>
        </div>
      </div>

      <div class="form-row">
        <div class="fg">
          <label>Nama Gembala</label>
          <input type="text" name="gembala_nama" value="{{ old('gembala_nama', $tentang->gembala_nama) }}" required maxlength="100">
        </div>
        <div class="fg">
          <label>Jabatan</label>
          <input type="text" name="gembala_jabatan" value="{{ old('gembala_jabatan', $tentang->gembala_jabatan) }}" required maxlength="100">
        </div>
      </div>

      <div class="fg">
        <label>Deskripsi Gembala</label>
        <textarea name="gembala_deskripsi" rows="3" maxlength="200">{{ old('gembala_deskripsi', $tentang->gembala_deskripsi) }}</textarea>
      </div>

      <div class="fg">
        <label>Foto Gembala</label>
        <input type="file" name="gembala_foto" accept="image/*" onchange="previewImage(event)">

        @if($tentang->gembala_foto)
          <img src="{{ asset('storage/' . $tentang->gembala_foto) }}" class="current-img" alt="Foto gembala">
        @endif

        <img id="preview-img" class="preview-img">
      </div>

      <div class="form-actions">
        <a href="{{ route('tentang.index') }}" class="btn-back">{{ "\u{2190}" }} Kembali</a>
        <button type="submit" class="btn-submit">{{ "\u{2705}" }} Update</button>
      </div>
    </form>
  </div>

  <script src="{{ asset('js/Admin/TentangEdit.js') }}"></script>

@endsection