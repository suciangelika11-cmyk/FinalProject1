@extends('admin.layouts.main')

@push('styles')
<style>
  .content-header { display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:16px; padding:24px 28px 0; }
  .content-header h1 { margin:0; font-size:24px; font-family:'Rajdhani',sans-serif; font-weight:700; }
  .breadcrumb-bar { display:flex; align-items:center; gap:6px; color:#6b7280; font-size:13px; }
  .breadcrumb-bar a { color:#0ea5e9; text-decoration:none; }
  .content { padding:20px 28px 60px; }
  .card { background:#fff; border:1px solid #e2e8f0; border-radius:20px; box-shadow:0 18px 46px rgba(15,23,42,.06); padding:28px; }
  .card h2 { margin:0 0 8px; font-size:20px; color:#111827; }
  .card p { margin:0 0 24px; color:#4b5563; }
  .detail-row { display:grid; gap:18px; margin-top:24px; }
  .detail-item { display:flex; flex-direction:column; gap:6px; }
  .detail-item label { font-size:13px; font-weight:700; color:#374151; }
  .detail-item span { color:#111827; font-size:15px; }
  .action-row { display:flex; flex-wrap:wrap; gap:12px; justify-content:flex-end; margin-top:24px; }
  .btn-back, .btn-edit, .btn-delete { display:inline-flex; align-items:center; justify-content:center; padding:11px 18px; border-radius:12px; font-weight:700; text-decoration:none; }
  .btn-back { background:#f8fafc; color:#0f172a; border:1px solid #cbd5e1; }
  .btn-edit { background:#e0f2fe; color:#0369a1; border:1px solid #bae6fd; }
  .btn-delete { background:#fee2e2; color:#991b1b; border:1px solid #fecaca; }
</style>
@endpush

@section('content')
<div class="content-header">
  <div>
    <h1>Detail Kegiatan Pelayanan</h1>
    <div class="breadcrumb-bar"><a href="{{ route('admin.dashboard') }}">Home</a> / <a href="{{ route('kegiatan.index') }}">Kegiatan</a> / <span>Detail</span></div>
  </div>
</div>

<div class="content">
  <div class="card">
    <h2>{{ $kegiatan->tema }}</h2>
    <p>Detail lengkap kegiatan pelayanan yang dikelola oleh admin dan super admin.</p>

    <div class="detail-row">
      <div class="detail-item"><label>Tanggal</label><span>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('l, d F Y') }}</span></div>
      <div class="detail-item"><label>Pengkhotbah</label><span>{{ $kegiatan->pengkhotbah }}</span></div>
      <div class="detail-item"><label>Ayat</label><span>{{ $kegiatan->ayat }}</span></div>
      <div class="detail-item"><label>Worship Team</label><span>{{ $kegiatan->worship_team ?: 'Tidak ada data' }}</span></div>
      <div class="detail-item"><label>Multimedia Team</label><span>{{ $kegiatan->multimedia_team ?: 'Tidak ada data' }}</span></div>
      <div class="detail-item"><label>Liturgi Team</label><span>{{ $kegiatan->liturgi_team ?: 'Tidak ada data' }}</span></div>
    </div>

    <div class="action-row">
      <a href="{{ route('kegiatan.index') }}" class="btn-back">Kembali</a>
      <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn-edit">Edit</a>
      <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kegiatan ini?');" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete">Hapus</button>
      </form>
    </div>
  </div>
</div>
@endsection
"