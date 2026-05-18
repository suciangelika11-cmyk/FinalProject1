@extends('layouts.app')

@section('content')

    <style>
        html,
        body {
            background: #0b1f44;
        }

        .detail-wrapper {
            background:
                radial-gradient(circle at top, rgba(32, 74, 155, .35), transparent 45%),
                #0b1f44;
            min-height: 100vh;
            padding: 80px 0;
            color: white;
        }

        .detail-container {
            max-width: 900px;
            margin: auto;
            padding: 0 20px;
        }

        .detail-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .1);
            color: #c9d8ff;
            font-size: 13px;
            margin-bottom: 24px;
        }

        .detail-title {
            font-size: 64px;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 12px;
            color: white;
        }

        .detail-date {
            color: rgba(255, 255, 255, .7);
            font-size: 20px;
            margin-bottom: 50px;
        }

        .detail-image {
            width: 260px;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 40px;
        }

        .detail-image img {
            width: 100%;
            display: block;
        }

        .detail-content {
            color: rgba(255, 255, 255, .8);
            line-height: 2;
            font-size: 17px;
            margin-bottom: 40px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
            border-radius: 999px;
            border: 1px solid rgba(93, 146, 232, .3);
            color: #9ec5ff;
            text-decoration: none;
            transition: .3s;
        }

        .back-btn:hover {
            background: #1f4ea3;
            color: white;
        }

        @media(max-width:768px) {

            .detail-title {
                font-size: 42px;
            }

            .detail-date {
                font-size: 16px;
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