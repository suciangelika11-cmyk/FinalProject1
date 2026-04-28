@extends('admin.layouts.main')

@section('content')
<div style="padding:28px 32px;">
  <div style="display:flex; align-items:center; justify-content:space-between; gap:14px; flex-wrap:wrap; margin-bottom:24px;">
    <div>
      <div style="font-size:13px; font-weight:700; color:#1da8e0; text-transform:uppercase; letter-spacing:.18em; margin-bottom:8px;">Jemaat</div>
      <h1 style="font-size:28px; margin:0;">Daftar Pendaftaran Jemaat</h1>
      <p style="margin:8px 0 0; color:#5f6d84; max-width:620px;">Kelola semua pendaftaran jemaat baru dan tandai als telah dikonfirmasi setelah ditindaklanjuti.</p>
    </div>
  </div>

  @if(session('success'))
    <div style="margin-bottom:18px; padding:14px 18px; background:#e8f7ef; border:1px solid #c8e8d3; color:#1f6238; border-radius:12px;">
      {{ session('success') }}
    </div>
  @endif

  <div style="overflow-x:auto; background:#fff; border:1px solid #e4e8ef; border-radius:18px; padding:18px; box-shadow:0 10px 30px rgba(50,50,93,.06);">
    <table style="width:100%; border-collapse:collapse; min-width:900px;">
      <thead>
        <tr style="background:#f4f8fc; color:#334155; text-align:left;">
          <th style="padding:14px 16px; font-size:13px;">No</th>
          <th style="padding:14px 16px; font-size:13px;">Nama Keluarga</th>
          <th style="padding:14px 16px; font-size:13px;">Nama Lengkap</th>
          <th style="padding:14px 16px; font-size:13px;">No KK</th>
          <th style="padding:14px 16px; font-size:13px;">Status</th>
          <th style="padding:14px 16px; font-size:13px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($jemaats as $jemaat)
          <tr style="border-top:1px solid #eff2f7;">
            <td style="padding:14px 16px; vertical-align:top;">{{ $loop->iteration }}</td>
            <td style="padding:14px 16px; vertical-align:top;">{{ $jemaat->nama_keluarga }}</td>
            <td style="padding:14px 16px; vertical-align:top;">{{ $jemaat->nama_lengkap }}</td>
            <td style="padding:14px 16px; vertical-align:top;">{{ $jemaat->no_kk }}</td>
            <td style="padding:14px 16px; vertical-align:top;">
              @if($jemaat->status === 'pending')
                <span style="display:inline-flex; align-items:center; gap:6px; padding:6px 12px; border-radius:999px; background:#fff4e6; color:#c4710d; font-size:12px; font-weight:700;">Menunggu</span>
              @else
                <span style="display:inline-flex; align-items:center; gap:6px; padding:6px 12px; border-radius:999px; background:#e8f7ef; color:#1f6238; font-size:12px; font-weight:700;">Dikonfirmasi</span>
              @endif
            </td>
            <td style="padding:14px 16px; vertical-align:top;">
              @if($jemaat->status === 'pending')
                <form action="{{ route('jemaat.confirm', $jemaat->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('PUT')
                  <button type="submit" style="border:none; background:#1da8e0; color:#fff; padding:9px 16px; border-radius:10px; font-weight:700; cursor:pointer; transition:all .2s;">Telah Dikonfirmasi</button>
                </form>
              @else
                <span style="color:#64748b; font-size:13px;">Tidak ada aksi</span>
              @endif
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" style="padding:28px 16px; color:#64748b; text-align:center;">Belum ada pendaftaran jemaat.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
