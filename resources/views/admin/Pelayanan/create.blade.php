@extends('admin.layouts.main')

@push('styles')

@include('admin.layouts.LOAPelayanan.PelayananCreate')

@endpush

@section('content')

<script src="{{ asset('js/Admin/PelayananCreate.js') }}"></script>

  <div class="content-header">
    <h1>Tambah Data Pelayanan</h1>

    <div class="breadcrumb-bar">
      <a href="{{ route('pelayanan.index') }}">Pelayanan</a> / <span>Tambah</span>
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
      <div class="hero-tag">＋ Tambah</div>

      <h2>Tambah Data Pelayanan</h2>

      <p>
        Tambahkan data pelayanan baru ke dalam sistem. Isi formulir di bawah dengan informasi yang lengkap dan akurat.
      </p>

    <div class="section-panel">

      <div class="section-label">
        <span></span> Formulir Data Pelayanan
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

        <form action="{{ route('pelayanan.store') }}" method="POST" enctype="multipart/form-data">

          @csrf

          <div class="fg">

            <label>Pilih Jenis Pelayanan</label>

            <select id="pilih-kategori" name="category" required>

              <option value="">-- Pilih Jenis --</option>

              <option value="kepemimpinan">Kepemimpinan</option>

              <option value="tim">Tim Pelayanan</option>

              <option value="aksi">Pelayanan Dalam Aksi</option>

            </select>

            <p id="pilih-info" style="font-size:13px;color:#7a8499;margin-bottom:16px;">
              Pilih jenis pelayanan terlebih dahulu untuk menampilkan form.
            </p>

          </div>

          <!-- FORM KEPEMIMPINAN -->
          <div id="form-kepemimpinan" class="form-dinamis">

            <div class=" fg">
              <label>Nama Pelayanan</label>
              <input type="text" name="title_kepemimpinan">
            </div>

            <div class="fg">
              <label>Pemimpin</label>
              <input type="text" name="leader_kepemimpinan">
            </div>

            <div class="fg">
              <label>Foto</label>

              <input type="file" name="photo_kepemimpinan" id="photo-kepemimpinan" accept="image/*">

              <img id="preview-kepemimpinan" class="img-preview" style="display:none;">
            </div>

          </div>

          <!-- FORM TIM -->
          <div id="form-tim" class="form-dinamis">

            <div class="fg">
              <label>Nama Pelayanan</label>
              <input type="text" name="title_tim">
            </div>

            <div class="fg">
              <label>Deskripsi Pelayanan</label>
              <textarea name="description_tim"></textarea>
            </div>

            <div class="fg">

              <label>Anggota Tim</label>

              <div id="anggota-wrapper">

                <div class="form-row-2 anggota-item" style="margin-bottom:10px;">

                  <input type="text" name="anggota_nama[]" placeholder="Nama anggota">

                  <input type="text" name="anggota_bagian[]" placeholder="Bagian">

                </div>

              </div>

              <button type="button" id="tambah-anggota" class="btn-back">
                + Tambah Anggota
              </button>

            </div>

          </div>

          <!-- FORM AKSI -->
          <div id="form-aksi" class="form-dinamis">

            <div class="fg">
              <label>Nama Pelayanan</label>
              <input type="text" name="title_aksi">
            </div>

            <div class="fg">
              <label>Deskripsi Pelayanan</label>
              <textarea name="description_aksi"></textarea>
            </div>

            <div class="fg">
              <label>Foto</label>

              <input type="file" name="photo_aksi" id="photo-aksi" accept="image/*">
            </div>

          </div>

          <div class="btn-row">
            <a href="{{ route('pelayanan.index') }}" class="btn-back">
              ← Batal
            </a>

            <button type="submit" class="btn-submit">
              💾 Simpan Data
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection