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
      font-family: 'Rajdhani', sans-serif;
      font-size: 24px;
      font-weight: 700;
      margin: 0;
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

    .hero-bar {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      background: #fff;
      border: 1px solid #e2e8f0;
      border-radius: 18px;
      padding: 22px 24px;
      margin-bottom: 24px;
    }

    .hero-bar h2 {
      margin: 0;
      font-size: 18px;
      font-weight: 700;
      color: #111827;
    }

    .hero-bar p {
      margin: 0;
      color: #4b5563;
      font-size: 14px;
    }

    .btn-primary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 12px 18px;
      border-radius: 12px;
      background: #0ea5e9;
      color: #fff;
      text-decoration: none;
      font-weight: 700;
      transition: .18s;
    }

    .btn-primary:hover {
      background: #0284c7;
    }

    .table-card {
      background: #fff;
      border: 1px solid #e2e8f0;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 12px 30px rgba(15, 23, 42, .06);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 16px 18px;
      text-align: left;
      vertical-align: middle;
      border-bottom: 1px solid #e5e7eb;
    }

    th {
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: .08em;
      color: #6b7280;
      font-weight: 700;
    }

    td {
      color: #111827;
      font-size: 14px;
    }

    .actions {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .action-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 8px 12px;
      border-radius: 10px;
      font-size: 13px;
      font-weight: 700;
      text-decoration: none;
    }

    .btn-edit {
      background: #f8fafc;
      color: #0f172a;
      border: 1px solid #cbd5e1;
    }

    .btn-view {
      background: #e0f2fe;
      color: #0369a1;
    }

    .btn-delete {
      background: #fee2e2;
      color: #991b1b;
      border: 1px solid #fecaca;
    }

    .empty-box {
      background: #f8fafc;
      border: 1px dashed #cbd5e1;
      padding: 32px;
      text-align: center;
      border-radius: 16px;
      color: #475569;
    }

    @media(max-width:900px) {

      th,
      td {
        padding: 14px 12px;
      }
    }
  </style>
@endpush

@section('content')
  <div class="content-header">
    <div>
      <h1>Kegiatan Pelayanan</h1>
    </div>

    <a href="{{ route('kegiatan.create') }}" class="btn-primary">+ Tambah Kegiatan</a>
  </div>

  <div class="content">
    @if(session('success'))
      <div
        style="margin-bottom:18px; padding:16px 20px; border-radius:14px; background:#ecfdf5; color:#065f46; border:1px solid #d1fae5;">
        {{ session('success') }}
      </div>
    @endif

    <div class="hero-bar">
      <div>
        <h2>Daftar Kegiatan Pelayanan</h2>
        <p>Kelola jadwal, pengkhotbah, tema, ayat, dan tim pelayanan.</p>
      </div>
    </div>

    @if($kegiatans->isEmpty())
      <div class="empty-box">
        Belum ada data kegiatan pelayanan. Tambahkan kegiatan baru untuk melanjutkan.
      </div>
    @else
      <div class="table-card">
        <table>
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Pengkhotbah</th>
              <th>Tema</th>
              <th>Ayat</th>
              <th>Tim</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach($kegiatans as $item)
              <tr>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                <td>{{ $item->pengkhotbah }}</td>
                <td>{{ $item->tema }}</td>
                <td>{{ $item->ayat }}</td>

                <td>
                  @if($item->worship_team) Worship: {{ $item->worship_team }}<br>@endif
                  @if($item->multimedia_team) Multimedia: {{ $item->multimedia_team }}<br>@endif
                  @if($item->liturgi_team) Liturgi: {{ $item->liturgi_team }}@endif
                </td>

                <td>
                  <div class="actions">
                    <a href="{{ route('kegiatan.show', $item->id) }}" class="action-btn btn-view">Lihat</a>
                    <a href="{{ route('kegiatan.edit', $item->id) }}" class="action-btn btn-edit">Edit</a>

                    <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST"
                      onsubmit="return confirm('Yakin hapus kegiatan ini?');" style="display:inline-block;">
                      @csrf
                      @method('DELETE')

                      <button type="submit" class="action-btn btn-delete">Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
@endsection