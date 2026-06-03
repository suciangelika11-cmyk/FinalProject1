@extends('layouts.app')

@section('content')
    <style>
        :root {
            --c1: #769FCD;
            --c2: #B9D7EA;
            --c3: #D6E6F2;
            --c4: #F7FBFC;
        }

        /* HERO */
        .pl-hero {
            position: relative;
            padding: clamp(90px, 10vw, 130px) 16px;
            text-align: center;
            overflow: hidden;

            background:
                linear-gradient(135deg,
                    #F7FBFC 0%,
                    #D6E6F2 55%,
                    #B9D7EA 100%);
        }

        .pl-hero::before {
            content: '';
            position: absolute;
            inset: 0;

            background-image:
                linear-gradient(rgba(118, 159, 205, .10) 1px, transparent 1px),
                linear-gradient(90deg, rgba(118, 159, 205, .10) 1px, transparent 1px);

            background-size: 75px 75px;

            mask-image:
                radial-gradient(ellipse 80% 70% at center,
                    black,
                    transparent);
        }

        .pl-hero::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;

            background:
                radial-gradient(circle,
                    rgba(118, 159, 205, .18),
                    transparent 70%);

            top: -180px;
            right: -100px;
        }

        .pl-hero .wrap {
            position: relative;
            z-index: 1;
        }

        .pl-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(36px, 7vw, 64px);
            font-weight: 800;
            line-height: 1.1;

            color: #4B6584;

            margin-bottom: 20px;
        }

        .pl-hero h1 .accent {
            background:
                linear-gradient(135deg,
                    #769FCD,
                    #5E87B8,
                    #769FCD);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .pl-hero p {
            color: #5F738B;
            font-size: 16px;
            line-height: 1.9;
            max-width: 600px;
            margin: auto;
        }

        /* STATS */
        .pl-stats {
            background: #F7FBFC;
            border-top: 1px solid rgba(118, 159, 205, .15);
            border-bottom: 1px solid rgba(118, 159, 205, .15);
        }

        .pl-stats-inner {
            display: flex;
            justify-content: center;
            gap: clamp(20px, 5vw, 60px);
            flex-wrap: wrap;
            max-width: 1180px;
            margin: 0 auto;
        }

        .pl-stat {
            text-align: center;
        }

        .pl-stat-num {
            font-size: clamp(22px, 4vw, 30px);
            font-weight: 700;
            color: #769FCD;
            margin-bottom: 4px;
        }

        .pl-stat-label {
            font-size: 12px;
            color: #6E7E91;
        }

        /* SECTION */
        .pl-sec {
            padding: clamp(48px, 8vw, 80px) 0;
            background: #F7FBFC;
        }

        .pl-sec.alt {
            background: #F7FBFC;
        }

        .pl-sec-label {
            color: #769FCD;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .pl-sec-title {
            font-family: 'Playfair Display', serif;
            color: #4B6584;
            font-size: clamp(28px, 5vw, 40px);
        }

        .pl-sec-sub {
            color: #6E7E91;
        }

        /* LEADER */
        .pl-leader-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 18px;
            max-width: 880px;
            margin: 0 auto;
        }

        .pl-leader-card {
            background: #fff;
            border: 1px solid #D6E6F2;
            border-radius: 18px;
            padding: clamp(22px, 4vw, 34px) 20px;
            text-align: center;

            box-shadow:
                0 10px 30px rgba(118, 159, 205, .10);
        }

        .pl-leader-card:hover {
            border-color: #769FCD;
            box-shadow:
                0 25px 50px rgba(118, 159, 205, .20);
            transform: translateY(-8px);
        }

        .pl-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg,
                    #769FCD,
                    #B9D7EA);
            border: 3px solid #F7FBFC;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
            margin: 0 auto 16px;
            overflow: hidden;
        }

        .pl-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .pl-lc-name {
            font-size: 14px;
            font-weight: 600;
            color: #4B6584;
            margin-bottom: 8px;
        }

        .pl-lc-role {
            font-size: 11px;
            background: #D6E6F2;
            color: #769FCD;
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
        }

        /* TEAM */
        .pl-team-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .pl-team-card {
            background: #fff;
            border: 1px solid #D6E6F2;
            border-radius: 20px;
            box-shadow:
                0 10px 30px rgba(118, 159, 205, .08);
            padding: 24px;
            transition: .3s;
        }

        .pl-team-card:hover {
            transform: translateY(-8px);
            border-color: #769FCD;
            box-shadow:
                0 25px 50px rgba(118, 159, 205, .18);
        }

        .pl-team-card::after {
            content: '';
            display: block;
            height: 3px;
            margin-top: 18px;
            border-radius: 999px;
            background: linear-gradient(90deg,
                    #769FCD,
                    #B9D7EA,
                    #D6E6F2);
        }

        .pl-tc-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #D6E6F2;
            color: #769FCD;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .pl-tc-title {
            font-family: 'Playfair Display', serif;
            font-size: 15px;
            font-weight: 600;
            color: #4B6584;
            margin-bottom: 8px;
        }

        .pl-tc-desc {
            font-size: 13px;
            color: #6E7E91;
            line-height: 1.7;
            margin-bottom: 14px;
        }

        .pl-divider {
            height: 1px;
            background: rgba(118, 159, 205, .2);
            margin: 12px 0;
        }

        .pl-member-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pl-member-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            padding: 6px 0;
            border-bottom: 1px solid #EAF2F8;
        }

        .pl-member-item:last-child {
            border-bottom: none;
        }

        .pl-mi-name {
            font-size: 12.5px;
            color: #4B6584;
        }

        .pl-mi-role {
            font-size: 11px;
            color: #769FCD;;
            background: #D6E6F2;
            padding: 3px 10px;
            border-radius: 12px;
        }

        .pl-no-data {
            grid-column: 1/-1;
            text-align: center;
            color: #769FCD;
            padding: 44px 20px;
            background: rgba(247, 251, 252, .6);
            border-radius: 14px;
            border: 1px dashed rgba(118, 159, 205, .35);
        }

        /* CTA */
        .pl-cta {
            background: linear-gradient(180deg,
                    #F7FBFC,
                    #D6E6F2);
            padding: clamp(52px, 8vw, 80px) 16px;
            text-align: center;
        }

        .pl-cta h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(20px, 3vw, 27px);
            color: #4B6584;
            margin-bottom: 11px;
        }

        .pl-cta p {
            font-size: 15px;
            color: #6E7E91;
            max-width: 460px;
            margin: 0 auto 34px;
            line-height: 1.7;
        }

        .pl-join-btn {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: linear-gradient(135deg,
                    #769FCD,
                    #B9D7EA,);
            color: #fff;
            font-size: 14.5px;
            font-weight: 700;
            padding: 13px 28px;
            border-radius: 11px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(118,159,205,.25);
        }

        .pl-join-btn:hover {
            transform: translateY(-2px);
            0 20px 45px rgba(118,159,205,.35);
        }

        /* RESPONSIVE */
        @media(max-width:1024px) {
            .pl-team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width:640px) {
            .pl-team-grid {
                grid-template-columns: 1fr;
            }

            .pl-leader-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .pl-stat {
                min-width: 80px;
            }
        }

        @media(max-width:380px) {
            .pl-leader-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <section class="pl-hero">
        <div class="container wrap">
            <div class="eyebrow" style="animation: fadeUp .7s ease .1s both;">
                <span class="eyebrow-dot"></span>Gereja Beriman<span class="eyebrow-dot"></span>
            </div>
            <h1>Pelayanan &amp; <span class="accent">Komunitas</span></h1>
            <p>Bergabunglah dengan berbagai tim pelayanan dan temukan tempat Anda untuk melayani Tuhan bersama kami.</p>
        </div>
    </section>

    <section class="pl-sec alt">
        <div class="global-container">
            <div class="pl-sec-label">Kepemimpinan</div>
            <div class="pl-sec-title">Gembala &amp; Pemimpin</div>
            <div class="pl-sec-sub">Dipimpin dengan kasih, hikmat, dan dedikasi penuh.</div>
            <div class="pl-leader-grid">
                @forelse($kepemimpinan as $item)
                    <div class="pl-leader-card">
                        <div class="pl-avatar">
                            @if($item->photo)
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->leader ?: $item->title }}">
                            @else
                                {{ strtoupper(substr($item->leader ?: $item->title, 0, 2)) }}
                            @endif
                        </div>
                        <div class="pl-lc-name">{{ $item->leader ?: $item->title }}</div>
                        <div class="pl-lc-role">{{ $item->title }}</div>
                    </div>
                @empty
                    <div class="pl-no-data">Belum ada data kepemimpinan.</div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="pl-sec" style="background:#D6E6F2;">
        <div class="global-container">
            <div class="pl-sec-label">Tim Pelayanan</div>
            <div class="pl-sec-title">Tim Kami</div>
            <div class="pl-sec-sub">Berbagai tim yang melayani dengan dedikasi dan kasih.</div>
            <div class="pl-team-grid">
                @forelse($timPelayanan as $tim)
                    <div class="pl-team-card">
                        <div class="pl-tc-icon">
                            @if($tim->icon && str_contains($tim->icon, 'bi-'))
                                <i class="bi {{ $tim->icon }}"></i>
                            @else
                                {{ $tim->icon ?: '♪' }}
                            @endif
                        </div>
                        <div class="pl-tc-title">{{ $tim->title }}</div>
                        <div class="pl-tc-desc">{{ $tim->description ?: 'Melayani dengan penuh dedikasi dan kasih.' }}</div>
                        <div class="pl-divider"></div>
                        <ul class="pl-member-list">
                            @if($tim->anggotas->count())
                                @foreach($tim->anggotas as $anggota)
                                    <li class="pl-member-item">
                                        <span class="pl-mi-name">{{ $anggota->nama }}</span>
                                        <span class="pl-mi-role">{{ $anggota->bagian ?: '-' }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li class="pl-member-item">
                                    <span class="pl-mi-name">{{ $tim->leader ?: 'Koordinator belum ditentukan' }}</span>
                                    <span class="pl-mi-role">Koordinator</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                @empty
                    <div class="pl-no-data">Belum ada data tim pelayanan.</div>
                @endforelse
            </div>
        </div>
    </section>

@endsection