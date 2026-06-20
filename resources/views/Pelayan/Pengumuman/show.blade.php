@extends('Pelayan.layouts.pelayan')

@section('content')

@include('Pelayan.layouts.LOPPengumumanShow')

    <section class="hero">
        <div class="container">
            <h1>{{ $pengumuman->judul }}</h1>
            <p>
                <i class="bi bi-calendar3"></i>
                {{ $pengumuman->tanggal_liris ? \Carbon\Carbon::parse($pengumuman->tanggal_liris)->translatedFormat('d F Y') : '—' }}
            </p>
        </div>
    </section>

    <section class="section-container">
        <div class="container">
            <div class="detail-card">

                @if($pengumuman->foto)
                    <img src="{{ asset('storage/' . $pengumuman->foto) }}" alt="{{ $pengumuman->judul }}" class="detail-image">
                @endif

                <div class="detail-content">
                    {!! nl2br(e($pengumuman->deksripsi)) !!}
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