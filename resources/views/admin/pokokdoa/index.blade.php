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
            <div class="row mt-4">

                <div class="col-lg-3 col-md-6">
                    <div class="info-card">
                        <div class="info-icon blue">📄</div>
                        <div>
                            <h3>{{ $totalDoa }}</h3>
                            <p>Total Pokok Doa</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-card">
                        <div class="info-icon green">📅</div>
                        <div>
                            <h3>{{ $bulanIni }}</h3>
                            <p>Bulan Ini</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-card">
                        <div class="info-icon yellow">⏰</div>
                        <div>
                            <h3>{{ $hariIni }}</h3>
                            <p>Hari Ini</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-card">
                        <div class="info-icon purple">🙏</div>
                        <div>
                            <h3>{{ $totalDoa }}</h3>
                            <p>Akan Didoakan</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- TABEL -->
            <div class="card mt-4 shadow-sm border-0">

                <div class="card-header bg-white">
                    <h3 class="card-title">
                        Daftar Pokok Doa
                    </h3>

                    <div class="card-tools">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Cari nama atau pokok doa...">
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

                            @forelse($pokokDoas as $pokok)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <strong>
                                            {{ $pokok->nama }}
                                        </strong>
                                    </td>

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

                                        <div class="empty-box">

                                            <div class="empty-icon">
                                                📥
                                            </div>

                                            <h5>
                                                Belum ada pokok doa yang dikirim
                                            </h5>

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

        </div>
    </section>

</div>

@endsection