@extends('layouts.app')

@section('content')

    <style>
        :root {
            --c1: #769FCD;
            --c2: #B9D7EA;
            --c3: #D6E6F2;
            --c4: #F7FBFC;

            --text: #4B6584;
            --text-soft: #6E7E91;
        }

        /* =========================
       BODY
    ========================= */

        html,
        body {
            background: #F7FBFC;
        }

        /* =========================
       WRAPPER
    ========================= */

        .detail-wrapper {
            position: relative;
            overflow: hidden;

            min-height: 100vh;
            padding: 90px 0;

            background:
                linear-gradient(135deg,
                    #F7FBFC 0%,
                    #D6E6F2 60%,
                    #B9D7EA 100%);
        }

        .detail-wrapper::before {
            content: '';
            position: absolute;
            inset: 0;

            background-image:
                linear-gradient(rgba(118, 159, 205, .08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(118, 159, 205, .08) 1px, transparent 1px);

            background-size: 60px 60px;

            mask-image: radial-gradient(ellipse 80% 70% at 50% 50%,
                    black 0%,
                    transparent 100%);

            pointer-events: none;
        }

        .detail-wrapper::after {
            content: '';
            position: absolute;

            top: -150px;
            right: -120px;

            width: 450px;
            height: 450px;

            border-radius: 50%;

            background:
                radial-gradient(circle,
                    rgba(118, 159, 205, .25),
                    transparent 70%);

            pointer-events: none;
        }

        /* =========================
       CONTAINER
    ========================= */

        .detail-container {
            position: relative;
            z-index: 2;

            max-width: 950px;
            margin: auto;
            padding: 0 24px;
        }

        /* =========================
       BADGE
    ========================= */

        .detail-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 10px 18px;

            border-radius: 999px;

            background: rgba(255, 255, 255, .75);

            border: 1px solid #D6E6F2;

            color: #769FCD;

            font-size: 13px;
            font-weight: 700;

            margin-bottom: 26px;

            backdrop-filter: blur(10px);
        }

        /* =========================
       TITLE
    ========================= */

        .detail-title {
            font-family: 'Playfair Display', serif;

            font-size: clamp(38px, 6vw, 64px);
            font-weight: 800;

            line-height: 1.1;

            color: #4B6584;

            margin-bottom: 14px;
        }

        /* =========================
       DATE
    ========================= */

        .detail-date {
            color: #6E7E91;

            font-size: 18px;
            font-weight: 500;

            margin-bottom: 40px;
        }

        /* =========================
       IMAGE CARD
    ========================= */

        .detail-image {
            width: 100%;
            max-width: 450px;

            border-radius: 22px;
            overflow: hidden;

            margin-bottom: 40px;

            border: 1px solid #D6E6F2;

            background: #fff;

            box-shadow:
                0 15px 40px rgba(118, 159, 205, .15);
        }

        .detail-image img {
            width: 100%;
            display: block;
            object-fit: cover;
        }

        /* =========================
       CONTENT CARD
    ========================= */

        .detail-content {
            background: rgba(255, 255, 255, .75);

            border: 1px solid #D6E6F2;

            border-radius: 24px;

            padding: 32px;

            color: #5F738B;

            font-size: 16px;
            line-height: 2;

            margin-bottom: 40px;

            backdrop-filter: blur(10px);

            box-shadow:
                0 10px 30px rgba(118, 159, 205, .08);
        }

        .detail-content p:last-child {
            margin-bottom: 0;
        }

        /* =========================
       BUTTON
    ========================= */

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            padding: 13px 26px;

            border-radius: 999px;

            text-decoration: none;

            background:
                linear-gradient(135deg,
                    #769FCD,
                    #B9D7EA);

            color: white;

            font-weight: 700;

            transition: .3s;

            box-shadow:
                0 10px 25px rgba(118, 159, 205, .25);
        }

        .back-btn:hover {
            color: white;

            transform: translateY(-3px);

            box-shadow:
                0 16px 35px rgba(118, 159, 205, .35);
        }

        /* =========================
       MOBILE
    ========================= */

        @media(max-width:768px) {

            .detail-wrapper {
                padding: 70px 0;
            }

            .detail-title {
                font-size: 42px;
            }

            .detail-date {
                font-size: 15px;
            }

            .detail-content {
                padding: 22px;
                font-size: 15px;
                line-height: 1.9;
            }

            .detail-image {
                max-width: 100%;
            }
        }
    </style>

    <div class="detail-wrapper">

        <div class="detail-container">

            <div class="detail-badge">
                • WARTA JEMAAT •
            </div>

            <h1 class="detail-title">
                {{ $pengumuman->title }}
            </h1>

            <div class="detail-date">
                {{ $pengumuman->publish_date ?: '-' }}
            </div>

            @if($pengumuman->image)
                <div class="detail-image">
                    <img src="{{ asset('storage/' . $pengumuman->image) }}" alt="{{ $pengumuman->title }}">
                </div>
            @endif

            <div class="detail-content">
                {!! nl2br(e($pengumuman->content)) !!}
            </div>

            <a href="{{ route('user.pengumuman') }}" class="back-btn">
                ← Kembali ke Pengumuman
            </a>

        </div>

    </div>

@endsection