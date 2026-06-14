@extends('layouts.app')

@section('content')

    @include('layouts.LOPelayanan')

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

                            @php
                                $title = strtolower($tim->title);
                            @endphp

                            @if(str_contains($title, 'singer'))
                                <i class="bi bi-mic-fill"></i>

                            @elseif(str_contains($title, 'worship'))
                                <i class="bi bi-megaphone-fill"></i>

                            @elseif(str_contains($title, 'tamborin'))
                                <i class="bi bi-stars"></i>

                            @elseif(str_contains($title, 'multimedia'))
                                <i class="bi bi-camera-video-fill"></i>

                            @elseif(str_contains($title, 'musik'))
                                <i class="bi bi-music-note-beamed"></i>

                            @elseif(str_contains($title, 'sekolah minggu'))
                                <i class="bi bi-book-fill"></i>

                            @else
                                <i class="bi bi-people-fill"></i>
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