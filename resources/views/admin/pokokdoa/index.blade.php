@extends('admin.layouts.main')

@section('content')

<div class="doa-page">

    <div class="page-header">
        <div>
            <h1>Pokok Doa Jemaat</h1>
            <p>Daftar pokok doa yang telah dikirim oleh jemaat.</p>
        </div>
    </div>

    <div class="stats-grid">

        <div class="stat-card">
            <div class="icon blue">📄</div>
            <div>
                <h4>Total Pokok Doa</h4>
                <h2>{{ $totalDoa }}</h2>
                <span>Semua waktu</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon green">📅</div>
            <div>
                <h4>Bulan Ini</h4>
                <h2>{{ $bulanIni }}</h2>
                <span>Data pokok doa</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon yellow">⏰</div>
            <div>
                <h4>Hari Ini</h4>
                <h2>{{ $hariIni }}</h2>
                <span>Data baru</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon purple">🙏</div>
            <div>
                <h4>Akan Didoakan</h4>
                <h2>{{ $totalDoa }}</h2>
                <span>Dalam doa</span>
            </div>
        </div>

    </div>

    <div class="table-card">

        <div class="table-header">

            <h3>Daftar Pokok Doa</h3>

            <input
                type="text"
                placeholder="Cari nama atau pokok doa..."
                class="search-box">

        </div>

        <table class="doa-table">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Pokok Doa</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>

                @forelse($pokokDoas as $pokok)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $pokok->nama }}</td>

                        <td>
                            {{ Str::limit($pokok->isi_pokok_doa, 60) }}
                        </td>

                        <td>
                            {{ $pokok->created_at->format('d M Y') }}
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="4">

                            <div class="empty-state">

                                <div class="empty-icon">
                                    📥
                                </div>

                                <h4>
                                    Belum ada pokok doa yang dikirim
                                </h4>

                                <p>
                                    Ketika jemaat mengirim pokok doa,
                                    data akan muncul di sini.
                                </p>

                            </div>

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection