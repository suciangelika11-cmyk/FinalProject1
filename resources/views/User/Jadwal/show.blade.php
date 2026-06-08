@extends('layouts.app')

@php
    $hideNavbar = true;
    $hideFooter = true;
@endphp

@section('content')

    <style>
        html,
        body {
            background: #F7FBFC;
        }

        /* ===============================
           DETAIL PAGE
        ================================= */
        .jd-detail {
            min-height: 100vh;
            padding: 100px 0;
            background:
                radial-gradient(circle at top,
                    rgba(118, 159, 205, .18),
                    transparent 45%),
                #F7FBFC;
        }

        .jd-detail-container {
            max-width: 920px;
            margin: auto;
            padding: 0 20px;
        }

        /* TITLE */
        .jd-detail-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(36px, 5vw, 60px);
            font-weight: 700;
            color: #2c3e50;
            line-height: 1.15;
            margin-bottom: 20px;
        }

        /* META */
        .jd-detail-meta {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            background: rgba(118, 159, 205, .12);
            border: 1px solid rgba(118, 159, 205, .25);

            padding: 10px 18px;
            border-radius: 999px;

            color: #5c7695;
            font-size: 14px;
            font-weight: 500;
        }

        /* DESCRIPTION */
        .jd-detail-desc {
            margin-top: 40px;

            background: white;
            border-radius: 24px;
            padding: 35px;

            border: 1px solid rgba(118, 159, 205, .15);

            box-shadow:
                0 15px 40px rgba(118, 159, 205, .08);

            color: #4a5f75;
            line-height: 2;
            font-size: 17px;
        }

        /* BACK BUTTON */
        .jd-back {
            margin-top: 40px;

            display: inline-flex;
            align-items: center;
            gap: 10px;

            padding: 13px 26px;

            border-radius: 999px;

            background: #769FCD;
            color: white;

            text-decoration: none;
            font-weight: 600;

            transition: all .3s ease;
        }

        .jd-back:hover {
            background: #5f89b8;
            color: white;

            transform: translateY(-3px);

            box-shadow:
                0 12px 25px rgba(118, 159, 205, .25);
        }

        /* DECORATIVE LINE */
        .jd-detail-container::after {
            content: '';
            display: block;

            width: 90px;
            height: 4px;

            margin-top: 25px;

            background: linear-gradient(90deg,
                    #769FCD,
                    #B9D7EA);

            border-radius: 999px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {

            .jd-detail {
                padding: 80px 0;
            }

            .jd-detail-desc {
                padding: 25px;
                font-size: 15px;
            }

            .jd-back {
                width: 100%;
                justify-content: center;
            }
        }

        .jd-info-card {
            background: white;
            border: 1px solid rgba(118, 159, 205, .15);
            border-radius: 24px;
            padding: 35px;
            margin-top: 30px;

            box-shadow:
                0 15px 40px rgba(118, 159, 205, .08);
        }

        .jd-info-item {
            display: flex;
            gap: 15px;
            margin-bottom: 18px;
            color: #4a5f75;
        }

        .jd-info-label {
            min-width: 90px;
            font-weight: 700;
            color: #769FCD;
        }

        .jd-info-desc {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid rgba(118, 159, 205, .15);

            color: #4a5f75;
            line-height: 1.9;
        }
    </style>

    <div class="jd-detail">

        <div class="jd-detail-container">

            <h1 class="jd-detail-title">
                {{ $jadwal->title }}
            </h1>

            <div class="jd-info-card">

                <div class="jd-info-item">
                    <div class="jd-info-label">Hari</div>
                    <div>{{ $jadwal->day }}</div>
                </div>

                <div class="jd-info-item">
                    <div class="jd-info-label">Waktu</div>
                    <div>
                        {{ $jadwal->start_time }}
                        -
                        {{ $jadwal->end_time }}
                        WIB
                    </div>
                </div>

                <div class="jd-info-item">
                    <div class="jd-info-label">Lokasi</div>
                    <div>{{ $jadwal->location }}</div>
                </div>

                <div class="jd-info-desc">
                    <strong>Deskripsi</strong><br><br>
                    {!! nl2br(e($jadwal->description)) !!}
                </div>

            </div>

            <a href="{{ route('user.jadwal') }}" class="jd-back">
                ← Kembali ke Jadwal
            </a>

        </div>

    </div>

@endsection