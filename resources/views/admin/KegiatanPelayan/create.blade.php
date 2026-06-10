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
            <input type="text" name="pengkhotbah" class="form-control" value="{{ old('pengkhotbah') }}" required
              maxlength="100">
          </div>

          <div class="form-group">
            <label>Tema</label>
            <input type="text" name="tema" class="form-control" value="{{ old('tema') }}" required maxlength="150">
          </div>

          <div class="form-group">
            <label>Ayat</label>
            <input type="text" name="ayat" class="form-control" value="{{ old('ayat') }}" required maxlength="100">
          </div>

          <div class="form-group">
            <label>Tim Singer</label>
            <input type="text" name="singer_team" class="form-control" placeholder="Nama1, Nama2"
              value="{{ old('singer_team') }}" required maxlength="250">
          </div>

          <div class="form-group">
            <label>Tim Multimedia</label>
            <input type="text" name="multimedia_team" class="form-control" value="{{ old('multimedia_team') }}"
              placeholder="Nama1, Nama2" required maxlength="250">
          </div>

          <div class="form-group">
            <label>Tim Worship Leader</label>
            <input type="text" name="worship_leader_team" class="form-control" value="{{ old('worship_leader_team') }}"
              placeholder="Nama1, Nama2" required maxlength="250">
          </div>

          <div class="form-group">
            <label>Tim Tamborin</label>
            <input type="text" name="tamborin_team" class="form-control" value="{{ old('tamborin_team') }}"
              placeholder="Nama1, Nama2" required maxlength="250">
          </div>

          <div class="form-group">
            <label>Tim Musik</label>
            <input type="text" name="musik_team" class="form-control" value="{{ old('musik_team') }}"
              placeholder="Nama1, Nama2" required maxlength="250">  
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