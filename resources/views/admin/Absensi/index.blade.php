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
                    ＋ Tambah Absensi
                </a>
            </div>
        </div>

        @if(session('success'))
            <div
                style="background:#dcfce7; border:1px solid #86efac; border-radius:12px; padding:14px 16px; margin-bottom:20px; color:#166534; font-size:14px;">
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
                            <td>
                                {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                            </td>

                            <td>
                                <strong>{{ $item->session }}</strong>
                            </td>

                            <td>
                                {{ $item->pengkhotbah }}
                            </td>

                            <td>
                                {{ $item->pelayan }}
                            </td>

                            <td>
                                <strong>{{ $item->jumlah }}</strong> orang
                            </td>

                            <td>
                                <a href="{{ route('absensi.edit', $item) }}" class="btn btn-warning">
                                    ✏ Edit
                                </a>

                                <form action="{{ route('absensi.destroy', $item) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data absensi ini?')">
                                        🗑 Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center; padding:28px; color:#9ca3af; font-size:14px;">
                                Belum ada data absensi.

                                <a href="{{ route('absensi.create') }}" style="color:#1da8e0; text-decoration:none;">
                                    Buat yang pertama
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection