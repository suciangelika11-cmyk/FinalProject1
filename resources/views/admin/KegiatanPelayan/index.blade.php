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

    .page-hero {
      position: relative;
      overflow: hidden;
      border-radius: 16px;
      margin-bottom: 24px;
      background: linear-gradient(135deg, var(--cyan-dk), var(--cyan), #29c4f0);
      padding: 40px 45px;
      box-shadow: 0 12px 40px rgba(29, 168, 224, .2), inset 0 1px 0 rgba(255, 255, 255, .2);
      animation: slideUp .6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .page-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse 50% 80% at 95% 50%, rgba(255, 255, 255, .12) 0%, transparent 65%), radial-gradient(ellipse 35% 60% at 5% 90%, rgba(200, 155, 60, .18) 0%, transparent 55%);
      pointer-events: none;
      animation: float 6s ease-in-out infinite;
    }

    .page-hero::after {
      content: '';
      position: absolute;
      inset: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      pointer-events: none;
    }

    .hero-tag {
      display: inline-block;
      background: rgba(255, 255, 255, .15);
      border: 1px solid rgba(255, 255, 255, .4);
      color: #fff;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      padding: 6px 14px;
      border-radius: 20px;
      margin-bottom: 12px;
      animation: fadeIn .6s ease-out .2s both;
      backdrop-filter: blur(4px);
    }

    .page-hero h2 {
      font-family: 'Rajdhani', sans-serif;
      font-size: 32px;
      font-weight: 700;
      color: #fff;
      margin-bottom: 8px;
      animation: slideInLeft .6s ease-out .3s both;
      letter-spacing: -0.5px;
    }

    .page-hero p {
      color: rgba(255, 255, 255, .9);
      font-size: 14.5px;
      max-width: 580px;
      line-height: 1.7;
      animation: fadeIn .6s ease-out .4s both;
    }

    .hero-actions {
      margin-top: 20px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      animation: fadeUp .6s ease-out .5s both;
    }

    .btn-hero-primary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 7px;
      background: #fff;
      color: var(--cyan);
      border: none;
      text-decoration: none;
      font-family: 'Nunito', sans-serif;
      font-size: 13.5px;
      font-weight: 700;
      padding: 11px 24px;
      border-radius: 9px;
      cursor: pointer;
      transition: all .3s cubic-bezier(0.34, 1.56, 0.64, 1);
      box-shadow: 0 4px 14px rgba(0, 0, 0, .12);
      position: relative;
      overflow: hidden;
    }

    .btn-hero-primary::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(13, 133, 181, .1), transparent);
      opacity: 0;
      transition: opacity .3s;
    }

    .btn-hero-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 24px rgba(0, 0, 0, .18);
      color: var(--cyan-dk);
    }

    .btn-hero-primary:active {
      transform: translateY(-1px);
    }

    .btn-hero-outline {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: rgba(255, 255, 255, .1);
      color: #fff;
      border: 1.5px solid rgba(255, 255, 255, .4);
      font-family: 'Nunito', sans-serif;
      font-size: 13.5px;
      font-weight: 700;
      padding: 10px 24px;
      border-radius: 9px;
      cursor: pointer;
      transition: all .3s cubic-bezier(0.34, 1.56, 0.64, 1);
      backdrop-filter: blur(4px);
    }

    .btn-hero-outline:hover {
      background: rgba(255, 255, 255, .2);
      border-color: rgba(255, 255, 255, .6);
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, .15);
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
  <div class="page-hero">
    <div class="hero-tag"><i class="ri-calendar-event-line"></i> Kegiatan Pelayana</div>
    <h2>Daftar Kegiatan Pelayanan</h2>
    <p>Kelola jadwal, pengkhotbah, tema, ayat, dan tim pelayanan.</p>
    <div class="hero-actions">
      <a href="{{ route('kegiatan.create') }}" class="btn-hero-primary">＋ Tambah Kegiatan</a>
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