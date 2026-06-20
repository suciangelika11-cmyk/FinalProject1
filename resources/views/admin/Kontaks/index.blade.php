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
        <div class="stat-icon ic">{{ "\u{1F4CD}" }}</div>
        <div>
          <div class="stat-val vc">{{ $kontak->count() }}</div>
          <div class="stat-lbl">Total Kontak</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ig">{{ "\u{1F4DE}" }}</div>
        <div>
          <div class="stat-val vg">
            {{ $kontak->whereNotNull('no_hp')->filter(fn($item) => !empty($item->no_hp))->count() }}
          </div>
          <div class="stat-lbl">Nomor Telepon</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon is">{{ "\u{2709}\u{FE0F}" }}</div>
        <div>
          <div class="stat-val vs">
            {{ $kontak->whereNotNull('email')->filter(fn($item) => !empty($item->email))->count() }}
          </div>
          <div class="stat-lbl">Alamat Email</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ir">{{ "\u{1F550}" }}</div>
        <div>
          <div class="stat-val vr">
            {{ $kontak->whereNotNull('jam_kerja')->filter(fn($item) => !empty($item->jam_kerja))->count() }}
          </div>
          <div class="stat-lbl">Ada Jam Sekretariat</div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h3>{{ "\u{2709}\u{FE0F}" }} Informasi Kontak Gereja</h3>
        <div class="card-tools">
          @if($kontak->count() == 0)
            <a href="{{ route('kontak.create') }}" class="btn-tambah">
              <span style="font-size:15px;font-weight:900;">{{ "\u{FF0B}" }}</span> Tambah
            </a>
          @endif
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
                    <div class="loc-addr">{{ $item->alamat }}</div>
                  </td>
                  <td><span class="pill-cyan">{{ "\u{1F4DE}" }} {{ $item->no_hp ?: '-' }}</span></td>
                  <td><span class="pill-gold">{{ "\u{2709}\u{FE0F}" }} {{ $item->email ?: '-' }}</span></td>
                  <td>
                    <div class="jam-main">{{ $item->jam_kerja ?: '-' }}</div>
                  </td>
                  <td>
                    <div style="display:flex;gap:6px;">
                      <a href="{{ route('kontak.edit', $item->id) }}" class="act-btn btn-edit">{{ "\u{270F}\u{FE0F}" }}
                        Edit</a>

                      <form id="delete-form-{{ $item->id }}" action="{{ route('kontak.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="act-btn btn-del btn-hapus" data-id="{{ $item->id }}"
                          data-phone="{{ $item->no_hp }}" data-email="{{ $item->email }}">
                          {{ "\u{1F5D1}\u{FE0F}" }} Hapus
                        </button>
                      </form>
                      
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <div class="no-data">
            <div class="icon">{{ "\u{2709}\u{FE0F}" }}</div>
            <p>Belum ada data kontak. Klik <strong>Tambah Kontak</strong> untuk memulai.</p>
          </div>
        @endif
      </div>
    </div>

  </div>

  @push('scripts')

    <script src="{{ asset('js/Admin/KontakIndex.js') }}"></script>

  @endpush
@endsection