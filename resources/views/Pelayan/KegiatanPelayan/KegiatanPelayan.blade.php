@extends('Pelayan.layouts.pelayan')

@section('content')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        :root {
            --blue-light: #ADE1FB;
            --blue-mid: #266CA9;
            --blue-dark: #0F2573;
            --navy: #041D56;
            --navy-dark: #01082D;

            --ink: #0A0E17;
            --ink-mid: #0D1422;
            --ink-card: rgba(12, 19, 34, 0.96);

            --surface: rgba(255, 255, 255, 0.04);

            --text: #ADE1FB;
            --text-muted: rgba(173, 225, 251, 0.72);

            --border: rgba(38, 108, 169, 0.2);
            --border-strong: rgba(173, 225, 251, 0.35);

            --radius: 22px;

            --purple-dim: rgba(38, 108, 169, 0.12);
            --purple: #266CA9;

            --green-dim: rgba(15, 37, 115, 0.12);
            --green: #0F2573;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            overflow-x: hidden;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--navy-dark);
            color: var(--blue-light);
        }

        /* ================= HERO ================= */
<<<<<<< HEAD
        .hero {
            position: relative;
            min-height: 420px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
            padding: 120px 24px 110px;
            background: var(--navy);
        }
=======
>>>>>>> 345e4aa07069f33de2acccec842637325bed1e18

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(
                    ellipse 70% 100% at 50% 0%,
                    rgba(173, 225, 251, 0.08),
                    transparent 65%
                );
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: var(--navy-dark);
            clip-path: ellipse(55% 100% at 50% 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 720px;
            width: 100%;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(38, 108, 169, 0.15);
            border: 1px solid var(--border-strong);
            border-radius: 40px;
            padding: 8px 20px;
            font-size: 10px;
            font-weight: 500;
            color: var(--blue-light);
            letter-spacing: .22em;
            text-transform: uppercase;
            margin-bottom: 24px;
        }

        .hero h1 {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(38px, 6vw, 70px);
            line-height: 1.1;
            margin-bottom: 18px;
            color: var(--blue-light);
        }

        .hero h1 em {
            color: var(--blue-mid);
            font-style: italic;
        }

        .hero-sub {
            color: var(--text-muted);
            font-size: 15px;
            line-height: 1.9;
            font-weight: 300;
            max-width: 620px;
            margin: auto;
        }

        /* ================= PAGE ================= */
        .page-wrap {
            width: min(92%, 1180px);
            margin: auto;
            padding: 70px 0 100px;
        }

        /* ================= SECTION ================= */
        .section-eyebrow {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 50px;
        }

        .section-eyebrow::before,
        .section-eyebrow::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .section-eyebrow span {
            color: var(--blue-mid);
            font-size: 10px;
            font-weight: 500;
            letter-spacing: .22em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        /* ================= CARD ================= */
        .kegiatan-card {
            display: grid;
            grid-template-columns: 170px 1fr 340px;
            background: var(--ink-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            margin-bottom: 28px;
            transition: .35s ease;
        }

        .kegiatan-card:hover {
            border-color: var(--border-strong);
            transform: translateY(-4px);
            box-shadow: 0 22px 55px rgba(0, 0, 0, .42);
        }

        /* ================= DATE ================= */
        .card-date {
            background: rgba(38, 108, 169, 0.08);
            border-right: 1px solid var(--border);

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            text-align: center;
            padding: 40px 20px;
        }

        .date-weekday {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: .20em;
            text-transform: uppercase;
            color: var(--blue-mid);
            margin-bottom: 10px;
        }

        .date-num {
            font-family: 'Libre Baskerville', serif;
            font-size: 62px;
            line-height: 1;
            color: var(--blue-light);
            margin-bottom: 8px;
        }

        .date-month {
            font-size: 11px;
            letter-spacing: .15em;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        /* ================= INFO ================= */
        .card-info {
            padding: 38px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-tag {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: .22em;
            text-transform: uppercase;
            color: var(--blue-mid);
            margin-bottom: 12px;
        }

        .card-preacher {
            font-family: 'Libre Baskerville', serif;
            font-size: 34px;
            line-height: 1.2;
            color: var(--blue-light);
            margin-bottom: 18px;
            word-break: break-word;
        }

        .card-divider {
            width: 45px;
            height: 2px;
            background: var(--blue-mid);
            opacity: .6;
            margin-bottom: 18px;
        }

        .card-tema {
            font-family: 'Libre Baskerville', serif;
            font-style: italic;
            font-size: 16px;
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 22px;
        }

        .card-verse {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: rgba(38, 108, 169, 0.12);
            border: 1px solid var(--border-strong);
            border-radius: 40px;
            padding: 10px 18px;
            font-size: 12px;
            color: var(--blue-light);
            width: fit-content;
            flex-wrap: wrap;
        }

        /* ================= TEAM ================= */
        .card-team {
            background: rgba(255, 255, 255, 0.025);
            border-left: 1px solid var(--border);

            padding: 28px 24px;

            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .team-heading {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: .20em;
            text-transform: uppercase;
            color: var(--blue-mid);
        }

        /* ================= SUB TEAM ================= */
        .sub-team {
            background: rgba(255, 255, 255, 0.035);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 16px;
        }

        .sub-team-head {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }

        .sub-team-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .sub-team-icon.worship {
            background: rgba(38, 108, 169, 0.15);
            color: var(--blue-light);
        }

        .sub-team-icon.media {
            background: rgba(15, 37, 115, 0.15);
            color: #7FB9FF;
        }

        .sub-team-icon.liturgi {
            background: rgba(173, 225, 251, 0.12);
            color: var(--blue-mid);
        }

        .sub-team-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--blue-light);
        }

        .sub-team-desc {
            font-size: 11px;
            color: var(--text-muted);
        }

        .member-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;

            padding: 10px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .member-name {
            font-size: 12px;
            color: var(--blue-light);
            word-break: break-word;
        }

        .member-badge {
            font-size: 10px;
            font-weight: 500;
            border-radius: 40px;
            padding: 4px 12px;
            white-space: nowrap;
        }

        .member-badge.worship {
            background: rgba(38, 108, 169, 0.15);
            color: var(--blue-light);
        }

        .member-badge.media {
            background: rgba(15, 37, 115, 0.15);
            color: #7FB9FF;
        }

        .member-badge.liturgi {
            background: rgba(173, 225, 251, 0.12);
            color: var(--blue-mid);
        }

        /* ================= FOOTER ================= */
        .page-footer {
            margin-top: 80px;
            border-top: 1px solid var(--border);
            padding-top: 45px;
            text-align: center;
        }

        .footer-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            border: 1px solid var(--border-strong);

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 18px;

            font-size: 20px;
            color: var(--blue-mid);
        }

        .footer-quote {
            font-family: 'Libre Baskerville', serif;
            font-style: italic;
            font-size: 17px;
            color: var(--text-muted);
            line-height: 1.8;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:1200px) {

            .kegiatan-card {
                grid-template-columns: 150px 1fr 320px;
            }

            .card-preacher {
                font-size: 30px;
            }
        }

        @media(max-width:992px) {

            .kegiatan-card {
                grid-template-columns: 1fr;
            }

            .card-date {
                border-right: none;
                border-bottom: 1px solid var(--border);

                flex-direction: row;
                justify-content: center;
                gap: 18px;

                padding: 26px;
            }

            .date-num {
                font-size: 48px;
                margin-bottom: 0;
            }

            .card-team {
                border-left: none;
                border-top: 1px solid var(--border);
            }
        }

        @media(max-width:768px) {

            .hero {
                min-height: 360px;
                padding: 100px 20px 90px;
            }

            .hero h1 {
                font-size: clamp(30px, 10vw, 48px);
            }

            .hero-sub {
                font-size: 14px;
                line-height: 1.8;
            }

            .page-wrap {
                width: 94%;
                padding: 55px 0 80px;
            }

            .section-eyebrow {
                margin-bottom: 36px;
            }

            .card-info {
                padding: 24px 20px;
            }

            .card-preacher {
                font-size: 24px;
            }

            .card-tema {
                font-size: 15px;
                line-height: 1.7;
            }

            .card-team {
                padding: 20px;
            }

            .sub-team {
                padding: 14px;
            }
        }

        @media(max-width:576px) {

            .hero {
                min-height: 320px;
            }

            .hero-eyebrow {
                font-size: 9px;
                padding: 7px 14px;
                letter-spacing: .18em;
            }

            .hero-sub {
                font-size: 13px;
            }

            .card-date {
                flex-direction: column;
                gap: 6px;
                padding: 22px 18px;
            }

            .date-weekday {
                font-size: 9px;
            }

            .date-num {
                font-size: 42px;
            }

            .date-month {
                font-size: 10px;
            }

            .card-info {
                padding: 22px 18px;
            }

            .card-preacher {
                font-size: 21px;
            }

            .card-tema {
                font-size: 14px;
            }

            .card-team {
                padding: 18px;
            }

            .sub-team-head {
                align-items: flex-start;
            }

            .member-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .member-badge {
                margin-top: 4px;
            }

            .card-verse {
                width: 100%;
                justify-content: center;
                text-align: center;
            }

            .footer-quote {
                font-size: 15px;
            }
        }
    </style>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">

            <div class="hero-eyebrow">
                <i class="fa-solid fa-hands-praying" style="font-size:10px;"></i>
                Gereja Bethel Indonesia
            </div>

            <h1>
                Kegiatan <em>Pelayanan</em>
            </h1>

            <p class="hero-sub">
                Daftar kegiatan pelayanan gereja bersama seluruh tim dan jemaat
            </p>

        </div>
    </section>

    <!-- CONTENT -->
    <div class="page-wrap">

        <div class="section-eyebrow">
            <span>Kegiatan Mendatang</span>
        </div>

        @foreach($kegiatans as $item)

            <article class="kegiatan-card">

                <!-- DATE -->
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

                <!-- INFO -->
                <div class="card-info">

                    <div class="card-tag">
                        Pengkhotbah
                    </div>

                    <h2 class="card-preacher">
                        {{ $item->pengkhotbah }}
                    </h2>

                    <div class="card-divider"></div>

                    <div class="card-tema">
                        "{{ $item->tema }}"
                    </div>

                    <div class="card-verse">
                        <i class="fa-solid fa-book-open"></i>
                        {{ $item->ayat }}
                    </div>

                </div>

                <!-- TEAM -->
                <div class="card-team">

                    <div class="team-heading">
                        Tim yang Melayani
                    </div>

                    <!-- WORSHIP -->
                    <div class="sub-team">

                        <div class="sub-team-head">

                            <div class="sub-team-icon worship">
                                <i class="fa-solid fa-microphone-lines"></i>
                            </div>

                            <div>
                                <div class="sub-team-name">
                                    Worship Team
                                </div>

                                <div class="sub-team-desc">
                                    Pujian & Penyembahan
                                </div>
                            </div>

                        </div>

                        @foreach(explode(',', $item->worship_team) as $m)
                            <div class="member-row">
                                <span class="member-name">{{ trim($m) }}</span>
                                <span class="member-badge worship">Worship</span>
                            </div>
                        @endforeach

                    </div>

                    <!-- MULTIMEDIA -->
                    <div class="sub-team">

                        <div class="sub-team-head">

                            <div class="sub-team-icon media">
                                <i class="fa-solid fa-video"></i>
                            </div>

                            <div>
                                <div class="sub-team-name">
                                    Multimedia
                                </div>

                                <div class="sub-team-desc">
                                    Media & Operator
                                </div>
                            </div>

                        </div>

                        @foreach(explode(',', $item->multimedia_team) as $m)
                            <div class="member-row">
                                <span class="member-name">{{ trim($m) }}</span>
                                <span class="member-badge media">Multimedia</span>
                            </div>
                        @endforeach

                    </div>

                    <!-- LITURGI -->
                    <div class="sub-team">

                        <div class="sub-team-head">

                            <div class="sub-team-icon liturgi">
                                <i class="fa-solid fa-scroll"></i>
                            </div>

                            <div>
                                <div class="sub-team-name">
                                    Liturgi
                                </div>

                                <div class="sub-team-desc">
                                    Penyambutan & Liturgi
                                </div>
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