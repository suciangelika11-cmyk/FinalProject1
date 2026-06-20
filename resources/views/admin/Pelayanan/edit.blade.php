@extends('admin.layouts.main')

@push('styles')

@include('admin.layouts.LOAPelayanan.PelayananEdit')

@endpush

@section('content')

  <div class="content-header">

    <h1>Edit Data Pelayanan</h1>

    <div class="breadcrumb-bar">
      <a href="{{ route('pelayanan.index') }}">Pelayanan</a> / <span>Edit</span>
    </div>

  </div>

  <div class="content">

    @if(session('success'))
      <div
        style="margin:0 0 20px; padding:16px 20px; border-radius:14px; background:#e6f8f6; border:1px solid #9de8d8; color:#0e664f;">
        {{ session('success') }}
      </div>
    @endif

    <div class="page-hero">

      <div class="hero-tag">{{ "\u{270F}\u{FE0F}" }} Edit</div>

      <h2>Edit Data Pelayanan</h2>

      <p>
        Perbarui informasi pelayanan yang ada. Pastikan semua data diisi dengan benar sebelum menyimpan perubahan.
      </p>

    </div>

    <div class="section-panel">

      <div class="section-label">
        <span></span> Formulir Edit Data Pelayanan
      </div>

      <div class="form-card">

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

        <form action="{{ route('pelayanan.update', $pelayanan->id) }}" method="POST" enctype="multipart/form-data">

          @csrf
          @method('PUT')

          <div class="fg">
            <label>Kategori</label>

            <select id="pilih-kategori" name="kategori" required>
              <option value="kepemimpinan" {{ old('kategori', $pelayanan->kategori) == 'kepemimpinan' ? 'selected' : '' }}>
                Kepemimpinan
              </option>

              <option value="tim" {{ old('kategori', $pelayanan->kategori) == 'tim' ? 'selected' : '' }}>
                Tim Pelayanan
              </option>

              <option value="aksi" {{ old('kategori', $pelayanan->kategori) == 'aksi' ? 'selected' : '' }}>
                Pelayanan Dalam Aksi
              </option>
            </select>
          </div>

          <div id="form-kepemimpinan"
            style="{{ old('kategori', $pelayanan->kategori) == 'kepemimpinan' ? 'display:block' : 'display:none' }}">
            <div class="fg">
              <label>Nama Pelayanan</label>
              <input type="text" name="judul_kepemimpinan"
                value="{{ old('judul_kepemimpinan', $pelayanan->kategori == 'kepemimpinan' ? $pelayanan->judul : '') }}" maxlength="100">
            </div>

            <div class="fg">
              <label>Pemimpin</label>
              <input type="text" name="pemimpim_kepemimpinan" value="{{ old('pemimpim_kepemimpinan', $pelayanan->pemimpim) }}" maxlength="100">
            </div>

            <div class="fg">
              <label>Foto</label>
              <input type="file" name="foto" accept="image/*">

              @if($pelayanan->foto && $pelayanan->kategori == 'kepemimpinan')
                <img src="{{ asset('storage/' . $pelayanan->foto) }}" class="img-preview" alt="Foto pelayanan">
              @endif
            </div>
          </div>

          <div id="form-tim"
            style="{{ old('kategori', $pelayanan->kategori) == 'tim' ? 'display:block' : 'display:none' }}">
            <div class="fg">
              <label>Nama Pelayanan</label>
              <input type="text" name="judul_tim"
                value="{{ old('judul_tim', $pelayanan->kategori == 'tim' ? $pelayanan->judul : '') }}" maxlength="100">
            </div>

            <div class="fg">
              <label>Deskripsi Pelayanan</label>
              <textarea name="deksripsi_tim"
                rows="3" maxlength="250">{{ old('deksripsi_tim', $pelayanan->kategori == 'tim' ? $pelayanan->deksripsi : '') }}</textarea>
            </div>

            <div class="fg">
              <label>Anggota Tim</label>

              <div id="anggota-wrapper">
                @forelse($pelayanan->anggotas as $anggota)
                  <div class="form-row-2 anggota-item" style="margin-bottom:10px;">
                    <input type="text" name="anggota_nama[]" value="{{ $anggota->nama }}" placeholder="Nama anggota" maxlength="100">
                    <input type="text" name="anggota_bagian[]" value="{{ $anggota->bagian }}"
                      placeholder="Bagian / jabatan" maxlength="100">
                  </div>
                @empty
                  <div class="form-row-2 anggota-item" style="margin-bottom:10px;">
                    <input type="text" name="anggota_nama[]" placeholder="Nama anggota" maxlength="100">
                    <input type="text" name="anggota_bagian[]" placeholder="Bagian / jabatan" maxlength="100">
                  </div>
                @endforelse
              </div>

              <button type="button" id="tambah-anggota" class="btn-back" style="margin-top:10px;">
                {{ "\u{002B}" }} Tambah Anggota
              </button>
            </div>
          </div>

          <div id="form-aksi"
            style="{{ old('kategori', $pelayanan->kategori) == 'aksi' ? 'display:block' : 'display:none' }}">
            <div class="fg">
              <label>Nama Pelayanan</label>
              <input type="text" name="judul_aksi"
                value="{{ old('judul_aksi', $pelayanan->kategori == 'aksi' ? $pelayanan->judul : '') }}" maxlength="100">
            </div>

            <div class="fg">
              <label>Deskripsi Pelayanan</label>
              <textarea name="deksripsi_aksi"
                rows="3" maxlength="250">{{ old('deksripsi_aksi', $pelayanan->kategori == 'aksi' ? $pelayanan->deksripsi : '') }}</textarea>
            </div>

            <div class="fg">
              <label>Foto</label>
              <input type="file" name="foto" accept="image/*">

              @if($pelayanan->foto && $pelayanan->kategori == 'aksi')
                <img src="{{ asset('storage/' . $pelayanan->foto) }}" class="img-preview" alt="Foto pelayanan">
              @endif
            </div>
          </div>

          <div class="btn-row">

            <a href="{{ route('pelayanan.index') }}" class="btn-back">
              {{"\u{2190}"}} Batal
            </a>

            <button type="submit" class="btn-submit">
              {{"\u{2705}"}} Update
            </button>

          </div>

        </form>

      </div>

    </div>

  </div>

  <script src="{{ asset('js/Admin/PelayananEdit.js') }}"></script>

@endsection