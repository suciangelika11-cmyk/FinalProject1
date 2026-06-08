@extends('Pelayan.layouts.pelayan')

@section('content')

@include('Pelayan.layouts.LOPPengumumanShow')

    <section class="hero">
        <div class="container">
            <h1>{{ $pengumuman->title }}</h1>
            <p>
                <i class="bi bi-calendar3"></i>
                {{ $pengumuman->publish_date ? \Carbon\Carbon::parse($pengumuman->publish_date)->translatedFormat('d F Y') : '—' }}
            </p>
        </div>
    </section>

    <section class="section-container">
        <div class="container">
            <div class="detail-card">

                @if($pengumuman->image)
                    <img src="{{ asset('storage/' . $pengumuman->image) }}" alt="{{ $pengumuman->title }}" class="detail-image">
                @endif

                <div class="detail-content">
                    {!! nl2br(e($pengumuman->content)) !!}
                </div>

                <div class="detail-footer">
                    <a href="{{ route('pelayan.pengumuman') }}" class="btn-kembali">
                        <i class="bi bi-arrow-left"></i>
                        Kembali ke Pengumuman
                    </a>
                </div>

            </div>
        </div>
    </section>

@endsection