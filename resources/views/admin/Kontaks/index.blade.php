@extends('admin.layouts.main')

@push('styles')

@include('admin.layouts.LOAKontak.KontakIndex')

@endpush

@section('content')
  <div class="content-header">
    <h1>Informasi Kontak Gereja</h1>
    <div class="breadcrumb-bar">
      <a href="{{ route('admin.dashboard') }}">Home</a> / <span>Kontak</span>
    </div>
  </div>

  <div class="content">

    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon ic">📍</div>
        <div>
          <div class="stat-val vc">{{ $kontak->count() }}</div>
          <div class="stat-lbl">Total Kontak</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ig">📞</div>
        <div>
          <div class="stat-val vg">
            {{ $kontak->whereNotNull('phone')->filter(fn($item) => !empty($item->phone))->count() }}</div>
          <div class="stat-lbl">Nomor Telepon</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon is">✉</div>
        <div>
          <div class="stat-val vs">
            {{ $kontak->whereNotNull('email')->filter(fn($item) => !empty($item->email))->count() }}</div>
          <div class="stat-lbl">Alamat Email</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ir">🕐</div>
        <div>
          <div class="stat-val vr">
            {{ $kontak->whereNotNull('office_hours')->filter(fn($item) => !empty($item->office_hours))->count() }}</div>
          <div class="stat-lbl">Ada Jam Sekretariat</div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h3>✉ Informasi Kontak Gereja</h3>
        <div class="card-tools">
          <a href="{{ route('kontak.create') }}" class="btn-tambah">
            <span style="font-size:15px;font-weight:900;">＋</span> Tambah Kontak
          </a>
        </div>
      </div>

      <div class="table-wrap">
        @if($kontak->count())
          <table>
            <thead>
              <tr>
                <th style="width:40px;">#</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Jam Sekretariat</th>
                <th style="width:150px;">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($kontak as $index => $item)
                <tr>
                  <td style="color:#b0b8c9;font-size:12px;">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                  <td>
                    <div class="loc-addr">{{ $item->address }}</div>
                  </td>
                  <td><span class="pill-cyan">📞 {{ $item->phone ?: '-' }}</span></td>
                  <td><span class="pill-gold">✉ {{ $item->email ?: '-' }}</span></td>
                  <td>
                    <div class="jam-main">{{ $item->office_hours ?: '-' }}</div>
                  </td>
                  <td>
                    <div style="display:flex;gap:6px;">
                      <a href="{{ route('kontak.edit', $item->id) }}" class="act-btn btn-edit">✏ Edit</a>

                      <form action="{{ route('kontak.destroy', $item->id) }}" method="POST"
                        onsubmit="return confirm('Hapus kontak ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="act-btn btn-del">🗑 Hapus</button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <div class="no-data">
            <div class="icon">✉</div>
            <p>Belum ada data kontak. Klik <strong>Tambah Kontak</strong> untuk memulai.</p>
          </div>
        @endif
      </div>
    </div>

  </div>
@endsection