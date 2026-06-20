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
          <input type="text" name="tema" class="form-control" value="{{ old('tema', $kegiatan->tema) }}" required
            maxlength="150">
        </div>

        <div class="form-group">
          <label>Ayat</label>
          <input type="text" name="ayat" class="form-control" value="{{ old('ayat', $kegiatan->ayat) }}" required
            maxlength="100">
        </div>

        <div class="form-group">
          <label>Tim Singer</label>
          <input type="text" name="tim_singer" class="form-control"
            value="{{ old('tim_singer', $kegiatan->tim_singer) }}" placeholder="Nama1, Nama2" maxlength="250">
        </div>

        <div class="form-group">
          <label>Tim Worship Leader</label>
          <input type="text" name="tim_worship_leader" class="form-control"
            value="{{ old('tim_worship_leader', $kegiatan->tim_worship_leader) }}" placeholder="Nama1, Nama2"
            maxlength="250">
        </div>

        <div class="form-group">
          <label>Tim Tamborin</label>
          <input type="text" name="tim_tamborin" class="form-control"
            value="{{ old('tim_tamborin', $kegiatan->tim_tamborin) }}" placeholder="Nama1, Nama2" maxlength="250">
        </div>

        <div class="form-group">
          <label>Tim Multimedia</label>
          <input type="text" name="tim_multimedia" class="form-control"
            value="{{ old('tim_multimedia', $kegiatan->tim_multimedia) }}" placeholder="Nama1, Nama2" maxlength="250">
        </div>

        <div class="form-group">
          <label>Tim Musik</label>
          <input type="text" name="tim_musik" class="form-control" value="{{ old('tim_musik', $kegiatan->tim_musik) }}"
            placeholder="Nama1, Nama2" maxlength="250">
        </div>

        <div class="action-row">
          <a href="{{ route('kegiatan.index') }}" class="btn-back">{{ "\u{2190}" }}Batal</a>
          <button type="submit" class="btn-submit">Update</button>
        </div>
      </form>
    </div>
  </div>
@endsection