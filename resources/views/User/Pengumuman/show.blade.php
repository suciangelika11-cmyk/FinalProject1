@extends('layouts.app')

@section('content')

    @include('layouts.LOPengumumanShow')

    <div class="detail-wrapper">

        <div class="detail-container">

            <div class="detail-badge">
                • WARTA JEMAAT •
            </div>

            <h1 class="detail-title">
                {{ $pengumuman->judul }}
            </h1>

            <div class="detail-date">
                {{ $pengumuman->tanggal_liris?: '-' }}
            </div>

            <div class="detail-body">

                @if($pengumuman->foto)
                    <div class="detail-image">
                        <img src="{{ asset('storage/' . $pengumuman->foto) }}" alt="{{ $pengumuman->judul }}">
                    </div>
                @endif

                <div class="detail-content">
                    {!! nl2br(e($pengumuman->deksripsi)) !!}
                </div>

            </div>

            <a href="{{ route('user.pengumuman') }}" class="back-btn">
                {{ "\u{2190}" }} Kembali ke Pengumuman
            </a>

        </div>

    </div>

@endsection