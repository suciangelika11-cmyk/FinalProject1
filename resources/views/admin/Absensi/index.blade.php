@extends('admin.layouts.main')

@section('content')

    @include('admin.layouts.LOAAbsen.AbsenIndex')


    <div class="content-header">
        <h1>Kelola Absensi</h1>
        <div class="breadcrumb-bar">
            <a href="{{ route('admin.dashboard') }}">Home</a> / <span>Absensi</span>
        </div>
    </div>
    <div class="content">


        <div class="page-hero">
            <div class="hero-tag">

                <i class="ri-checkbox-circle-line"></i>Absensi Ibadah
            </div>
            <h2>Kelola Data Absensi</h2>

            <p>
                Super Admin dan Admin dapat membuat, mengubah, dan menghapus data absensi ibadah.
                Pelayan hanya dapat melihat data ini.
            </p>

            <div class="hero-actions">
                <a href="{{ route('absensi.create') }}" class="btn-hero-primary">
                    <i class="fas fa-plus"></i>
                    Tambah
                </a>
            </div>
        </div>

        @if(session('success'))
            <div
                style="background:#dcfce7; border:1px solid #86efac; border-radius:12px; padding:14px 16px; margin-bottom:20px; color:#166534; font-size:14px;">

                <strong>
                    <i class="fas fa-circle-check"></i>
                    {{ session('success') }}
                </strong>
            </div>
        @endif

        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Sesi Ibadah</th>
                        <th>Pengkhotbah</th>
                        <th>Jumlah Jemaat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($absensi as $item)
                        <tr>
                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            </td>

                            <td>
                                <strong>{{ $item->sesi_ibadah }}</strong>
                            </td>

                            <td>
                                {{ $item->pengkhotbah }}
                            </td>

                            <td>
                                <strong>{{ $item->jumlah }}</strong> orang
                            </td>

                            <td>
                                <a href="{{ route('absensi.edit', $item) }}" class="btn btn-warning">
                                    <i class="fas fa-pen"></i>
                                    Edit
                                </a>

                                <form id="delete-form-{{ $item->id }}" action="{{ route('absensi.destroy', $item) }}"
                                    method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-hapus" data-id="{{ $item->id }}"
                                        data-sesi="{{ $item->sesi_ibadah }}"
                                        data-tanggal="{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}">

                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center; padding:28px; color:#9ca3af; font-size:14px;">

                                <i class="fas fa-folder-open"></i>
                                Belum ada data absensi.

                                <br><br>

                                <a href="{{ route('absensi.create') }}"
                                    style="color:#1da8e0; text-decoration:none; font-weight:600;">

                                    <i class="fas fa-plus-circle"></i>
                                    Buat yang pertama
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')

        <script src="{{ asset('js/Admin/AbsensiIndex.js') }}"></script>

    @endpush
@endsection