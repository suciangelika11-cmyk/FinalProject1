@extends('layouts.app')

@section('content')

    @include('layouts.LOKontak')

    @php
        $gereja = "GBI Tambunan";
        $whatsapp = $kontak && $kontak->no_hp
            ? preg_replace('/[^0-9]/', '', $kontak->no_hp)
            : '081632228286';
    @endphp

    {{-- HERO --}}
    <section class="hero">
        <div class="hero-bg-grid"></div>
        <div class="hero-orb hero-orb-1"></div>
        <div class="hero-orb hero-orb-2"></div>
        <div>
            <div class="hero-badge">Hubungi Kami</div>
            <h1 class="hero-title">Mari <span>Terhubung</span><br>Bersama Kami</h1>
            <p class="hero-sub">Kami senang mendengar dari Anda. Jangan ragu untuk menghubungi kami kapan saja.</p>
            <div class="hero-divider"></div>
        </div>
    </section>

    {{-- VERSE --}}
    <section class="verse-section">
        <div class="kontak-container">
            <div class="verse-card">
                <div class="verse-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                    </svg>
                </div>
                <p class="verse-text">
                    "Sebab itu sejak waktu kami mendengarnya, kami tidak berhenti-henti berdoa untuk kamu.
                    Kami meminta, supaya kamu menerima segala hikmat dan pengertian yang benar,
                    untuk mengetahui kehendak Tuhan."
                </p>
                <div class="verse-ref">Kolose 1:9 (TB)</div>
            </div>
        </div>
    </section>

    {{-- KONTAK --}}
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">

                {{-- INFO --}}
                <div class="info-col">
                    <div class="info-header">
                        <span class="section-label">Informasi</span>
                        <h2 class="section-title">Detail Kontak</h2>
                        <div class="section-rule"></div>
                    </div>

                    @if($kontak)

                        <div class="info-card ic-blue">
                            <div class="info-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>
                            <div>
                                <div class="info-label">Alamat</div>
                                <div class="info-value">{!! nl2br(e($kontak->alamat)) !!}</div>
                            </div>
                        </div>

                        <div class="info-card ic-green">
                            <div class="info-icon">
                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.18 2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.72a16 16 0 0 0 6.29 6.29l.89-.89a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                            </div>
                            <div>
                                <div class="info-label">Telepon</div>
                                <div class="info-value">{{ $kontak->no_hp ?: '-' }}</div>
                            </div>
                        </div>

                        <div class="info-card ic-orange">
                            <div class="info-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                            </div>
                            <div>
                                <div class="info-label">Email</div>
                                <div class="info-value">{{ $kontak->email ?: '-' }}</div>
                            </div>
                        </div>

                        <div class="info-card ic-purple">
                            <div class="info-icon">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg>
                            </div>
                            <div>
                                <div class="info-label">Jam Sekretariat</div>
                                <div class="info-value">{!! nl2br(e($kontak->jam_kerja ?: '-')) !!}</div>
                            </div>
                        </div>

                    @else
                        <div class="info-card">
                            <div class="info-value" style="color:var(--text-muted);">Data kontak belum tersedia.</div>
                        </div>
                    @endif
                </div>

                {{-- FORM --}}
                <div class="form-col">
                    <div class="form-card">
                        <h3 class="form-title">Kirim Pesan</h3>
                        <p class="form-subtitle">Isi formulir di bawah dan pesan akan dikirim langsung via WhatsApp.</p>

                        <form onsubmit="kirimWA(); return false;">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" placeholder="Masukkan nama Anda" required maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="subjek">Kategori Pesan</label>
                                <select id="subjek" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Permohonan Doa">Permohonan Doa</option>
                                    <option value="Konseling">Konseling</option>
                                    <option value="Informasi Ibadah">Informasi Ibadah</option>
                                    <option value="Pelayanan">Pelayanan</option>
                                    <option value="Pendaftaran Jemaat">Pendaftaran Jemaat</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pesan">Pesan Anda</label>
                                <textarea id="pesan" placeholder="Tuliskan pesan Anda di sini..." required
                                    maxlength="250"></textarea>
                            </div>
                            <button type="submit" class="btn-wa">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z" />
                                </svg>
                                Kirim via WhatsApp
                            </button>
                        </form>
                    </div>
                </div>

            </div>
            {{-- MAPS --}}
            <div class="map-section">
                <div class="map-card">
                    <iframe src="https://www.google.com/maps?q=GBI%20Tambunan-Laguboti&output=embed" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <script>
        const whatsappNumber = "{{ $whatsapp }}";
        const homeUrl = "{{ route('home') }}";
    </script>

    <script src="{{ asset('js/User/Kontak.js') }}"></script>

@endsection