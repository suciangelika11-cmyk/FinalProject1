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

                <!-- DATE COLUMN -->
                <div class="card-date">
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

                <!-- INFO COLUMN -->
                <div class="card-info">
                    <div class="card-tag">Pengkhotbah</div>

                    <h2 class="card-preacher">{{ $item->pengkhotbah }}</h2>

                    <div class="card-divider"></div>

                    <div class="card-tema">"{{ $item->tema }}"</div>

                    <div class="card-verse">
                        <i class="fa-solid fa-book-open"></i>
                        {{ $item->ayat }}
                    </div>
                </div>

                <!-- TEAM COLUMN -->
                <div class="card-team">
                    <div class="team-heading">Tim yang Melayani</div>

                    <!-- WORSHIP TEAM -->
                    <div class="sub-team">
                        <div class="sub-team-head">
                            <div class="sub-team-icon worship">
                                <i class="fa-solid fa-microphone-lines"></i>
                            </div>
                            <div>
                                <div class="sub-team-name">Worship Team</div>
                                <div class="sub-team-desc">Pujian & Penyembahan</div>
                            </div>
                        </div>

                        @foreach(explode(',', $item->worship_team) as $m)
                            <div class="member-row">
                                <span class="member-name">{{ trim($m) }}</span>
                                <span class="member-badge worship">Worship</span>
                            </div>
                        @endforeach
                    </div>

                    <!-- MULTIMEDIA TEAM -->
                    <div class="sub-team">
                        <div class="sub-team-head">
                            <div class="sub-team-icon media">
                                <i class="fa-solid fa-video"></i>
                            </div>
                            <div>
                                <div class="sub-team-name">Multimedia</div>
                                <div class="sub-team-desc">Media & Operator</div>
                            </div>
                        </div>

                        @foreach(explode(',', $item->multimedia_team) as $m)
                            <div class="member-row">
                                <span class="member-name">{{ trim($m) }}</span>
                                <span class="member-badge media">Multimedia</span>
                            </div>
                        @endforeach
                    </div>

                    <!-- LITURGI TEAM -->
                    <div class="sub-team">
                        <div class="sub-team-head">
                            <div class="sub-team-icon liturgi">
                                <i class="fa-solid fa-scroll"></i>
                            </div>
                            <div>
                                <div class="sub-team-name">Liturgi</div>
                                <div class="sub-team-desc">Penyambutan & Liturgi</div>
                            </div>
                        </div>

                        @foreach(explode(',', $item->liturgi_team) as $m)
                            <div class="member-row">
                                <span class="member-name">{{ trim($m) }}</span>
                                <span class="member-badge liturgi">Liturgi</span>
                            </div>
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