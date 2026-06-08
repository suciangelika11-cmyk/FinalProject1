@extends('layouts.app')

@section('content')

    @include('layouts.LOPengumumanShow')

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