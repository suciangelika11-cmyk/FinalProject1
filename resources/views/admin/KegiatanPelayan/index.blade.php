@extends('admin.layouts.main')

@push('styles')

@include('admin.layouts.LOAKegiatanPelayan.KegiatanPelayananIndex')

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