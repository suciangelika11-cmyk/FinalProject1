@extends('admin.layouts.main')

@section('content')

<style>
.jemaat-page{
    padding:32px;
    background:#f5f7fb;
    min-height:100vh;
}

.jemaat-header{
    margin-bottom:28px;
}

.jemaat-label{
    font-size:13px;
    font-weight:800;
    color:#1da8e0;
    text-transform:uppercase;
    letter-spacing:.18em;
    margin-bottom:8px;
}

.jemaat-title{
    font-size:30px;
    font-weight:800;
    color:#172033;
    margin:0;
}

.jemaat-desc{
    margin-top:8px;
    color:#64748b;
    max-width:720px;
    line-height:1.6;
    font-size:15px;
}

.alert-success{
    margin-bottom:20px;
    padding:14px 18px;
    background:#e8f7ef;
    border:1px solid #c8e8d3;
    color:#1f6238;
    border-radius:12px;
    font-weight:600;
}

.jemaat-card{
    background:#fff;
    border:1px solid #e5eaf3;
    border-radius:18px;
    box-shadow:0 12px 35px rgba(15,23,42,.06);
    overflow:hidden;
}

.table-scroll{
    width:100%;
    overflow-x:auto;
}

.jemaat-table{
    width:100%;
    min-width:1800px;
    border-collapse:collapse;
}

.jemaat-table th{
    background:#f4f8fc;
    padding:14px 16px;
    font-size:13px;
    color:#334155;
    text-align:left;
    white-space:nowrap;
    border-bottom:1px solid #e8edf5;
}

.jemaat-table td{
    padding:14px 16px;
    border-top:1px solid #eef2f7;
    color:#475569;
    font-size:14px;
    vertical-align:top;
    white-space:nowrap;
}

.jemaat-table tbody tr:hover{
    background:#f8fafc;
}

.text-long{
    min-width:260px;
    max-width:320px;
    white-space:normal !important;
    line-height:1.6;
}

.badge-pending{
    display:inline-block;
    padding:6px 12px;
    border-radius:999px;
    background:#fff4e6;
    color:#c4710d;
    font-size:12px;
    font-weight:700;
    white-space:nowrap;
}

.badge-ok{
    display:inline-block;
    padding:6px 12px;
    border-radius:999px;
    background:#e8f7ef;
    color:#1f6238;
    font-size:12px;
    font-weight:700;
    white-space:nowrap;
}

.btn-confirm{
    border:none;
    background:#1da8e0;
    color:#fff;
    padding:8px 14px;
    border-radius:10px;
    font-weight:700;
    cursor:pointer;
    white-space:nowrap;
    transition:.2s;
}

.btn-confirm:hover{
    background:#1289bb;
}

.no-action{
    color:#64748b;
    font-size:13px;
    white-space:nowrap;
}

.empty{
    padding:36px 16px;
    color:#64748b;
    text-align:center;
}
</style>

<div class="jemaat-page">

    <div class="jemaat-header">
        <div class="jemaat-label">Jemaat</div>

        <h1 class="jemaat-title">
            Daftar Pendaftaran Jemaat
        </h1>

        <p class="jemaat-desc">
            Kelola semua pendaftaran jemaat baru dan tandai sebagai telah dikonfirmasi setelah ditindaklanjuti.
        </p>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="jemaat-card">
        <div class="table-scroll">
            <table class="jemaat-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No KK</th>
                        <th>Nama Keluarga</th>
                        <th>Alamat Domisili</th>
                        <th>Alamat KTP</th>
                        <th>Nama Lengkap</th>
                        <th>NIK</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Handphone / WA</th>
                        <th>Pekerjaan</th>
                        <th>Status Pernikahan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($jemaats as $jemaat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jemaat->no_kk }}</td>
                            <td>{{ $jemaat->nama_keluarga }}</td>
                            <td class="text-long">{{ $jemaat->alamat_domisili }}</td>
                            <td class="text-long">{{ $jemaat->alamat_ktp }}</td>
                            <td>{{ $jemaat->nama_lengkap }}</td>
                            <td>{{ $jemaat->nik }}</td>
                            <td>{{ $jemaat->tempat_lahir }}</td>
                            <td>{{ $jemaat->tanggal_lahir }}</td>
                            <td>{{ $jemaat->jenis_kelamin }}</td>
                            <td>{{ $jemaat->handphone }}</td>
                            <td>{{ $jemaat->pekerjaan }}</td>
                            <td>{{ $jemaat->status_pernikahan }}</td>

                            <td>
                                @if($jemaat->status === 'pending')
                                    <span class="badge-pending">
                                        Menunggu
                                    </span>
                                @else
                                    <span class="badge-ok">
                                        Dikonfirmasi
                                    </span>
                                @endif
                            </td>

                            <td>
                                @if($jemaat->status === 'pending')
                                    <form action="{{ route('jemaat.confirm', $jemaat->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit" class="btn-confirm">
                                            Konfirmasi
                                        </button>
                                    </form>
                                @else
                                    <span class="no-action">
                                        Tidak ada aksi
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="16" class="empty">
                                Belum ada pendaftaran jemaat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection