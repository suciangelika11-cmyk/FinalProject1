@extends('admin.layouts.main')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detail Jadwal</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
          <li class="breadcrumb-item active">Show</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">{{ $Jadwal->title }}</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <table class="table table-borderless">
                  <tr>
                    <td style="width: 40%; font-weight: bold;">Kategori:</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $Jadwal->category)) }}</td>
                  </tr>
                  <tr>
                    <td>Hari:</td>
                    <td>{{ $Jadwal->day ?? '-' }}</td>
                  </tr>
                  <tr>
                    <td>Waktu:</td>
                    <td>{{ $Jadwal->start_time }}{{ $Jadwal->end_time ? ' - ' . $Jadwal->end_time : '' }}</td>
                  </tr>
                  <tr>
                    <td>Lokasi:</td>
                    <td>{{ $Jadwal->location ?? '-' }}</td>
                  </tr>
                  <tr>
                    <td>Icon:</td>
                    <td>{{ $Jadwal->icon ?? '-' }}</td>
                  </tr>
                </table>
              </div>
              <div class="col-md-6">
                @if($Jadwal->description)
                  <div>
                    <strong>Deskripsi:</strong>
                    <p class="text-muted mt-1">{{ $Jadwal->description }}</p>
                  </div>
                @endif
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('jadwal.edit', $Jadwal) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
            <a href="{{ route('jadwal.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            <form method="POST" action="{{ route('jadwal.destroy', $Jadwal) }}" class="d-inline" onsubmit="return confirm('Yakin hapus jadwal ini?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

