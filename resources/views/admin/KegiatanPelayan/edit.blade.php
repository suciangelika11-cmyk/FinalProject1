@extends('admin.layouts.main')

@push('styles')

@include('admin.layouts.LOAKegiatanPelayan.KegiatanPelayananEdit')

@endpush

@section('content')
  <div class="content-header">
    <div>
      <h1>Edit Kegiatan Pelayanan</h1>
    </div>
  </div>

  <div class="content">
    <div class="card">
      <h2>Form Edit Kegiatan</h2>

      <p>
        Perbarui detail kegiatan pelayanan di sini.
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

      <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" name="tanggal" class="form-control"
            value="{{ old('tanggal', \Carbon\Carbon::parse($kegiatan->tanggal)->format('Y-m-d')) }}"
            min="{{ date('Y-m-d') }}" required>
        </div>

        <div class="form-group">
          <label>Pengkhotbah</label>
          <input type="text" name="pengkhotbah" class="form-control"
            value="{{ old('pengkhotbah', $kegiatan->pengkhotbah) }}" required maxlength="100">
        </div>

        <div class="form-group">
          <label>Tema</label>
          <input type="text" name="tema" class="form-control" value="{{ old('tema', $kegiatan->tema) }}" required maxlength="150">
        </div>

        <div class="form-group">
          <label>Ayat</label>
          <input type="text" name="ayat" class="form-control" value="{{ old('ayat', $kegiatan->ayat) }}" required maxlength="100">
        </div>

        <div class="form-group">
          <label>Worship Team</label>
          <input type="text" name="worship_team" class="form-control"
            value="{{ old('worship_team', $kegiatan->worship_team) }}" placeholder="Nama1, Nama2" required maxlength="250">
        </div>

        <div class="form-group">
          <label>Multimedia Team</label>
          <input type="text" name="multimedia_team" class="form-control"
            value="{{ old('multimedia_team', $kegiatan->multimedia_team) }}" placeholder="Nama1, Nama2" required maxlength="250">
        </div>

        <div class="form-group">
          <label>Liturgi Team</label>
          <input type="text" name="liturgi_team" class="form-control"
            value="{{ old('liturgi_team', $kegiatan->liturgi_team) }}" placeholder="Nama1, Nama2" required maxlength="250">
        </div>

        <div class="action-row">
          <a href="{{ route('kegiatan.index') }}" class="btn-back">Batal</a>
          <button type="submit" class="btn-submit">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
@endsection