@extends('Pelayan.layouts.pelayan')

@section('content')

    @include('Pelayan.layouts.LOPKegiatanPelayan')

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-eyebrow">
                <i class="fa-solid fa-hands-praying" style="font-size:11px;"></i>
                Gereja Bethel Indonesia
            </div>

            <h1>Kegiatan <em>Pelayanan</em></h1>

            <p class="hero-sub">
                Daftar kegiatan pelayanan gereja bersama seluruh tim dan jemaat
            </p>
        </div>
    </section>

    <!-- CONTENT SECTION -->
    <div class="page-wrap">
        <div class="section-eyebrow">
            <span>Kegiatan Mendatang</span>
        </div>

        @foreach($kegiatans as $item)
            <article class="kegiatan-card">

                <div class="card-header">

                    <div class="date-box">
                        <div class="date-weekday">
                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l') }}
                        </div>

                        <div class="date-num">
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}
                        </div>

                        <div class="date-month">
                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('F Y') }}
                        </div>
                    </div>

                    <div class="info-box">
                        <span class="card-tag">Pengkhotbah</span>

                        <h2>{{ $item->pengkhotbah }}</h2>

                        <div class="card-tema">
                            "{{ $item->tema }}"
                        </div>

                        <div class="card-verse">
                            {{ $item->ayat }}
                        </div>
                    </div>

                </div>

                <div class="team-grid">

                    <!-- Singer -->
                    <div class="team-box">
                        <h4>{{ "\u{1F3A4}" }} Tim Singer</h4>
                        @foreach(explode(',', $item->tim_singer ?? '') as $m)
                            @if(trim($m))
                                <span>{{ trim($m) }}</span>
                            @endif
                        @endforeach
                    </div>

                    <!-- WL -->
                    <div class="team-box">
                        <h4>{{ "\u{1F399}\u{FE0F}" }} Tim Worship Leader</h4>
                        @foreach(explode(',', $item->tim_worship_leader ?? '') as $m)
                            @if(trim($m))
                                <span>{{ trim($m) }}</span>
                            @endif
                        @endforeach
                    </div>

                    <!-- Tamborin -->
                    <div class="team-box">
                        <h4>{{ "\u{2B50}" }} Tim Tamborin</h4>
                        @foreach(explode(',', $item->tim_tamborin ?? '') as $m)
                            @if(trim($m))
                                <span>{{ trim($m) }}</span>
                            @endif
                        @endforeach
                    </div>

                    <!-- Multimedia -->
                    <div class="team-box">
                        <h4>{{ "\u{1F3A5}" }} Tim Multimedia</h4>
                        @foreach(explode(',', $item->tim_multimedia ?? '') as $m)
                            @if(trim($m))
                                <span>{{ trim($m) }}</span>
                            @endif
                        @endforeach
                    </div>

                    <!-- Musik -->
                    <div class="team-box">
                        <h4>{{ "\u{1F3B8}" }} Tim Musik</h4>
                        @foreach(explode(',', $item->tim_musik ?? '') as $m)
                            @if(trim($m))
                                <span>{{ trim($m) }}</span>
                            @endif
                        @endforeach
                    </div>

                </div>

            </article>
        @endforeach

        <!-- FOOTER -->
        <div class="page-footer">
            <div class="footer-icon">
                <i class="fa-solid fa-cross"></i>
            </div>

            <p class="footer-quote">
                Mari melayani Tuhan dengan setia dan penuh sukacita.
            </p>
        </div>
    </div>

@endsection