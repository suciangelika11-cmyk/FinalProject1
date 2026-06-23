@extends('admin.layouts.main')

@section('content')

    @include('admin.layouts.LOAPokokDoa.PokokDoa')

    <style>
        /* ===== HERO BANNER (gradient seperti Jadwal Ibadah) ===== */
        .hero-box {
            background: linear-gradient(135deg, #0b5ed7 0%, #17a6e0 50%, #22c3ee 100%);
            border-radius: 14px;
            padding: 32px 36px;
            color: #fff;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.18);
        }

        .hero-box::after {
            content: "🙏";
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 90px;
            opacity: 0.15;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.35);
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 6px 14px;
            border-radius: 30px;
            margin-bottom: 14px;
        }

        .hero-box h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #fff;
        }

        .hero-box p {
            font-size: 14.5px;
            max-width: 560px;
            color: rgba(255, 255, 255, 0.92);
            margin-bottom: 0;
            line-height: 1.6;
        }

        /* ===== STATISTIK ===== */
        .quick-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .quick-card {
            background: #fff;
            border-radius: 12px;
            padding: 22px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .quick-card span {
            display: block;
            color: #6c757d;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .quick-card h2 {
            font-size: 26px;
            font-weight: 700;
            color: #0b5ed7;
            margin: 0;
        }

        /* ===== CARD LIST ===== */
        .card.shadow-sm {
            border-radius: 12px;
            overflow: hidden;
        }

        .card-header.bg-white {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            border-bottom: 1px solid #eef0f2;
            padding: 18px 20px;
        }

        .card-title {
            font-weight: 700;
            font-size: 16px;
            margin: 0;
        }

        .card-tools input {
            border-radius: 30px;
            border: 1px solid #e2e5e9;
            padding: 8px 16px;
            font-size: 13px;
            min-width: 260px;
        }

        .card-body.p-0 {
            padding: 16px !important;
            background: #f7f8fa;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* 2 kolom, bisa diganti 3 */
            gap: 16px;
        }

        .doa-card {
            display: flex;
            flex-direction: column;
            /* avatar di atas, teks di bawah */
            gap: 10px;
            padding: 20px;
            background: #fff;
            border-radius: 16px;
            border: 1px solid #f0f1f3;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }

        .doa-card:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
            transform: translateY(-1px);
        }

        .doa-card:last-child {
            border-bottom: 1px solid #f0f1f3;
            /* override aturan lama */
        }

        .doa-card:last-child {
            border-bottom: none;
        }

        .doa-avatar {
            width: 44px;
            height: 44px;
        }

        .doa-content {
            flex: 1;
        }

        .doa-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 10px;
        }

        .doa-header h4 {
            font-size: 15px;
            font-weight: 700;
            margin: 0;
            color: #1c1f23;
        }

        .doa-date {
            font-size: 12px;
            color: #9aa1a8;
        }

        .status-badge {
            background: #e6f7ec;
            color: #1aa860;
            font-size: 12px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 30px;
            white-space: nowrap;
        }

        .doa-content p {
            margin: 8px 0 0;
            color: #495057;
            font-size: 14px;
            line-height: 1.5;
        }

        .empty-box {
            text-align: center;
            padding: 50px 20px;
            color: #6c757d;
        }

        .empty-icon {
            font-size: 40px;
            margin-bottom: 10px;
            opacity: 0.6;
        }
    </style>

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

                <!-- LIST POKOK DOA -->
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

                        @forelse($pokokDoas as $pokok)

                            <div class="doa-card">

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

                </div>

            </div>
        </section>

    </div>

@endsection