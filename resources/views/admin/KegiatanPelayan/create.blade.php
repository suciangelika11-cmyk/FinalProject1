@extends('admin.layouts.main')

@push('styles')

@include('admin.layouts.LOAKegiatanPelayan.KegiatanPelayananCreate')

@endpush

@section('content')
  <div class="content-header">
    <div>
      <h1>Tambah Kegiatan Pelayanan</h1>
    </div>
  </div>


  <div class="content">
    <div class="form-wrapper">
      <div class="card">
        <h2>Form Tambah Kegiatan</h2>

        <p>
          Isi data kegiatan pelayanan agar dapat dikelola oleh admin dan super admin.
        </p>

        @if ($errors->any())
          <div class="alert">
            <strong>Perbaiki kesalahan berikut:</strong>

            <ul style="margin:12px 0 0; padding-left:18px;">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('kegiatan.store') }}" method="POST">
          @csrf

          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" min="{{ date('Y-m-d') }}"
              required>
          </div>

          <div class="form-group">
            <label>Pengkhotbah</label>
            <input type="text" name="pengkhotbah" class="form-control" value="{{ old('pengkhotbah') }}" required>
          </div>

          <div class="form-group">
            <label>Tema</label>
            <input type="text" name="tema" class="form-control" value="{{ old('tema') }}" required>
          </div>

          <div class="form-group">
            <label>Ayat</label>
            <input type="text" name="ayat" class="form-control" value="{{ old('ayat') }}" required>
          </div>

          <div class="form-group">
            <label>Worship Team</label>
            <input type="text" name="worship_team" class="form-control" value="{{ old('worship_team') }}"
              placeholder="Nama1, Nama2">
          </div>

          <div class="form-group">
            <label>Multimedia Team</label>
            <input type="text" name="multimedia_team" class="form-control" value="{{ old('multimedia_team') }}"
              placeholder="Nama1, Nama2">
          </div>

          <div class="form-group">
            <label>Liturgi Team</label>
            <input type="text" name="liturgi_team" class="form-control" value="{{ old('liturgi_team') }}"
              placeholder="Nama1, Nama2">
          </div>

          <div class="action-row">
            <a href="{{ route('kegiatan.index') }}" class="btn-back">Batal</a>
            <button type="submit" class="btn-submit">Simpan Kegiatan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection