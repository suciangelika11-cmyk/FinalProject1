@extends('layouts.app')

@section('content')

    <style>
        html,
        body {
            background: #0b1f44;
        }

        .jd-detail {
            min-height: 100vh;
            padding: 90px 0;
            background:
                radial-gradient(circle at top, rgba(32, 74, 155, .28), transparent 45%),
                #0b1f44;
        }

        .jd-detail-container {
            max-width: 900px;
            margin: auto;
            padding: 0 20px;
        }

        .jd-detail-title {
            font-family: 'Playfair Display', serif;
            font-size: 56px;
            font-weight: 700;
            color: white;
            margin-bottom: 18px;
        }

        .jd-detail-meta {
            color: rgba(255, 255, 255, .7);
            font-size: 15px;
            margin-bottom: 12px;
        }

        .jd-detail-desc {
            margin-top: 40px;
            color: rgba(255, 255, 255, .82);
            line-height: 2;
            font-size: 17px;
        }

        .jd-back {
            margin-top: 50px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 999px;
            text-decoration: none;
            color: #93bef8;
            border: 1px solid rgba(93, 146, 232, .28);
            transition: .3s;
        }

        .jd-back:hover {
            background: #1a4a9e;
            color: white;
        }
    </style>

    <div class="jd-detail">

        <div class="jd-detail-container">

            <h1 class="jd-detail-title">
                {{ $jadwal->title }}
            </h1>

            <div class="jd-detail-meta">
                {{ $jadwal->day }}
            </div>

            <div class="jd-detail-meta">
                {{ $jadwal->start_time }}
                -
                {{ $jadwal->end_time }}
                WIB
            </div>

            <div class="jd-detail-meta">
                {{ $jadwal->location }}
            </div>

            <div class="jd-detail-desc">
                {!! nl2br(e($jadwal->description)) !!}
            </div>

            <a href="{{ route('user.jadwal') }}" class="jd-back">
                ← Kembali ke Jadwal
            </a>

        </div>

    </div>

@endsection