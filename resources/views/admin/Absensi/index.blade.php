@extends('admin.layouts.main')

@section('content')
<style>
.table-wrap { overflow-x:auto; background:#fff; border-radius:14px; box-shadow:0 2px 10px rgba(0,0,0,.05); }
.table { border-collapse:collapse; width:100%; }
.table th { background:#f8f9fa; padding:16px 14px; font-size:13px; font-weight:700; text-transform:uppercase; letter-spacing:.5px; color:#6b7280; border:1px solid #e5e7eb; }
.table td { padding:14px; border-bottom:1px solid #e5e7eb; color:#374151; font-size:14px; }
.table tbody tr:hover { background:#fafbfc; }
.btn { display:inline-flex; align-items:center; gap:6px; padding:8px 16px; border-radius:8px; font-size:13px; font-weight:600; text-decoration:none; border:none; cursor:pointer; transition:all .2s; }
.btn-primary { background:#1da8e0; color:#fff; }
.btn-primary:hover { background:#0d85b5; }
.btn-warning { background:#f59e0b; color:#fff; }
.btn-warning:hover { background:#d97706; }
.btn-danger { background:#ef4444; color:#fff; }
.btn-danger:hover { background:#dc2626; }
.btn-secondary { background:#e5e7eb; color:#374151; }
.btn-secondary:hover { background:#d1d5db; }
.page-hero { background:linear-gradient(135deg, #1da8e0 0%, #0d85b5 100%); border-radius:14px; padding:28px 32px; color:#fff; margin-bottom:28px; }
.hero-tag { font-size:12px; letter-spacing:.8px; text-transform:uppercase; opacity:.8; margin-bottom:8px; }
.page-hero h2 { font-size:24px; font-weight:700; margin:0 0 8px; }
.page-hero p { margin:0; font-size:14px; opacity:.9; }
.hero-actions { margin-top:20px; display:flex; gap:12px; }
.btn-hero-primary { display:inline-flex; align-items:center; gap:6px; background:#fff; border:none; color:#1da8e0; padding:10px 20px; border-radius:8px; font-weight:700; cursor:pointer; transition:all .2s; }
.btn-hero-primary:hover { transform:translateY(-2px); box-shadow:0 4px 12px rgba(0,0,0,.15); }
</style>

<div class="content-header">
  <h1>Kelola Absensi</h1>
  <div class="breadcrumb-bar"><a href="{{ route('admin.dashboard') }}">Home</a> / <span>Absensi</span></div>
</div>

<div class="content">
  <div class="page-hero">
    <div class="hero-tag">✅ Absensi Ibadah</div>
    <h2>Kelola Data Absensi</h2>
    <p>Super Admin dan Admin dapat membuat, mengubah, dan menghapus data absensi ibadah. Pelayan hanya dapat melihat data ini.</p>
    <div class="hero-actions">
      <a href="{{ route('absensi.create') }}" class="btn-hero-primary">＋ Tambah Absensi</a>
    </div>
  </div>

  @if(session('success'))
    <div style="background:#dcfce7; border:1px solid #86efac; border-radius:12px; padding:14px 16px; margin-bottom:20px; color:#166534; font-size:14px;">
      <strong>✓ {{ session('success') }}</strong>
    </div>
  @endif

  <div class="table-wrap">
    <table class="table">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Sesi</th>
          <th>Pengkhotbah</th>
          <th>Pelayan</th>
          <th>Jumlah Jemaat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($absensi as $item)
          <tr>
            <td>{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
            <td><strong>{{ $item->session }}</strong></td>
            <td>{{ $item->pengkhotbah }}</td>
            <td>{{ $item->pelayan }}</td>
            <td><strong>{{ $item->jumlah }}</strong> orang</td>
            <td>
              <a href="{{ route('absensi.edit', $item) }}" class="btn btn-warning">✏ Edit</a>
              <form action="{{ route('absensi.destroy', $item) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data absensi ini?')">🗑 Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" style="text-align:center; padding:28px; color:#9ca3af; font-size:14px;">Belum ada data absensi. <a href="{{ route('absensi.create') }}" style="color:#1da8e0; text-decoration:none;">Buat yang pertama</a></td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
