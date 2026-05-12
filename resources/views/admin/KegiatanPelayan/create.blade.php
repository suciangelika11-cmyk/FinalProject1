@extends('admin.layouts.main')

@push('styles')
<style>
  .content-header {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 24px 28px 0;
  }

  .content-header h1 {
    margin: 0;
    font-size: 24px;
    font-family: 'Rajdhani', sans-serif;
    font-weight: 700;
  }

  .breadcrumb-bar {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #6b7280;
    font-size: 13px;
  }

  .breadcrumb-bar a {
    color: #0ea5e9;
    text-decoration: none;
  }

  .content {
    padding: 20px 28px 60px;
  }

  .card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    box-shadow: 0 18px 46px rgba(15,23,42,.06);
    padding: 28px;
  }

  .card h2 {
    margin: 0 0 8px;
    font-size: 20px;
    color: #111827;
  }

  .card p {
    margin: 0 0 24px;
    color: #4b5563;
  }

  .form-group {
    margin-bottom: 18px;
  }

  .form-group label {
    display: block;
    font-size: 13px;
    font-weight: 700;
    color: #374151;
    margin-bottom: 8px;
  }

  .form-control {
    width: 100%;
    border: 1px solid #d1d5db;
    border-radius: 12px;
    background: #f8fafc;
    padding: 12px 14px;
    font-size: 14px;
    color: #111827;
  }

  .form-control:focus {
    outline: none;
    border-color: #0ea5e9;
    background: #fff;
  }

  .action-row {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    justify-content: flex-end;
    margin-top: 20px;
  }

  .btn-back,
  .btn-submit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    padding: 11px 18px;
    font-weight: 700;
    text-decoration: none;
  }

  .btn-back {
    background: #f8fafc;
    color: #0f172a;
    border: 1px solid #cbd5e1;
  }

  .btn-submit {
    background: #0ea5e9;
    color: #fff;
    border: 1px solid transparent;
  }

  .btn-submit:hover {
    background: #0284c7;
  }

  .alert {
    background: #fef3c7;
    border: 1px solid #fde68a;
    color: #92400e;
    border-radius: 12px;
    padding: 14px 16px;
    margin-bottom: 20px;
  }
</style>
@endpush

@section('content')
<div class="content-header">
  <div>
    <h1>Tambah Kegiatan Pelayanan</h1>

    <div class="breadcrumb-bar">
      <a href="{{ route('admin.dashboard') }}">Home</a> /
      <a href="{{ route('kegiatan.index') }}">Kegiatan</a> /
      <span>Tambah</span>
    </div>
  </div>
</div>

<div class="content">
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
        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
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
        <input type="text" name="worship_team" class="form-control" value="{{ old('worship_team') }}" placeholder="Nama1, Nama2">
      </div>

      <div class="form-group">
        <label>Multimedia Team</label>
        <input type="text" name="multimedia_team" class="form-control" value="{{ old('multimedia_team') }}" placeholder="Nama1, Nama2">
      </div>

      <div class="form-group">
        <label>Liturgi Team</label>
        <input type="text" name="liturgi_team" class="form-control" value="{{ old('liturgi_team') }}" placeholder="Nama1, Nama2">
      </div>

      <div class="action-row">
        <a href="{{ route('kegiatan.index') }}" class="btn-back">Batal</a>
        <button type="submit" class="btn-submit">Simpan Kegiatan</button>
      </div>
    </form>
  </div>
</div>
@endsection