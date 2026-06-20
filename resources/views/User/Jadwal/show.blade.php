@extends('layouts.app')

@php
    $hideNavbar = true;
    $hideFooter = true;
@endphp

@section('content')

    @include('layouts.LOJadwalShow')

    <div class="jd-detail">

        <div class="jd-detail-container">

            <h1 class="jd-detail-title">
                {{ $jadwal->judul }}
            </h1>

            <div class="jd-info-card">

                <div class="jd-info-item">
                    <div class="jd-info-label">Hari</div>
                    <div>{{ $jadwal->hari }}</div>
                </div>

                <div class="jd-info-item">
                    <div class="jd-info-label">Waktu</div>
                    <div>
                        {{ $jadwal->jam_mulai }}
                        -
                        {{ $jadwal->jam_selesai }}
                        WIB
                    </div>
                </div>

                <div class="jd-info-item">
                    <div class="jd-info-label">Lokasi</div>
                    <div>{{ $jadwal->lokasi }}</div>
                </div>

                <div class="jd-info-desc">
                    <strong>Deskripsi</strong><br><br>
                    {!! nl2br(e($jadwal->deksripsi)) !!}
                </div>

            </div>

            <a href="{{ route('user.jadwal') }}" class="jd-back">
                {{ "\u{2190}" }} Kembali ke Jadwal
            </a>

        </div>

    </div>

@endsection