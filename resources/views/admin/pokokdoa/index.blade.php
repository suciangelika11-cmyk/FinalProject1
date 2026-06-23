@extends('admin.layouts.main')

@section('content')

    @include('admin.layouts.LOAPokokDoa.PokokDoa')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <h1>Pokok Doa Jemaat</h1>
                <p>Daftar pokok doa yang telah dikirim oleh jemaat.</p>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                <!-- HERO -->
                <div class="hero-box">

                    <div class="hero-badge">
                        🙏 POKOK DOA
                    </div>

                    <h2>Pokok Doa Jemaat</h2>

                    <p>
                        Kelola dan lihat seluruh pokok doa yang dikirim oleh jemaat.
                        Semua data akan tersimpan dan dapat dipantau dari halaman ini.
                    </p>

                </div>

                <!-- STATISTIK -->
                <div class="quick-stats">

                    <div class="quick-card">
                        <span>Total Doa</span>
                        <h2>{{ $totalDoa }}</h2>
                    </div>

                    <div class="quick-card">
                        <span>Bulan Ini</span>
                        <h2>{{ $bulanIni }}</h2>
                    </div>

                    <div class="quick-card">
                        <span>Hari Ini</span>
                        <h2>{{ $hariIni }}</h2>
                    </div>

                </div>

                <!-- TABEL -->
                <div class="card mt-4 shadow-sm border-0">

                    <div class="card-header bg-white">
                        <h3 class="card-title">
                            Daftar Pokok Doa
                        </h3>

                        <div class="card-tools">
                            <input type="text" class="form-control" placeholder="Cari nama atau pokok doa...">
                        </div>
                    </div>

                    <div class="card-body p-0">

                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th width="70">No</th>
                                    <th>Nama</th>
                                    <th>Pokok Doa</th>
                                    <th width="150">Tanggal</th>
                                </tr>
                            </thead>

                            <tbody>

                                <div class="card-body p-4">

    @forelse($pokokDoas as $pokok)

        <div class="doa-card">

            <div class="doa-avatar">
                {{ strtoupper(substr($pokok->nama,0,1)) }}
            </div>

            <div class="doa-content">

                <div class="doa-header">

                    <div>
                        <h4>{{ $pokok->nama }}</h4>
                        <span class="doa-date">
                            {{ $pokok->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <span class="status-badge">
                        Pokok Doa
                    </span>

                </div>

                <p>
                    {{ $pokok->isi_pokok_doa }}
                </p>

            </div>

        </div>

    @empty

        <div class="empty-box">

            <div class="empty-icon">
                🙏
            </div>

            <h4>Belum Ada Pokok Doa</h4>

            <p>
                Data pokok doa yang dikirim jemaat akan muncul di sini.
            </p>

        </div>

    @endforelse

</div>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>
        </section>

    </div>

@endsection