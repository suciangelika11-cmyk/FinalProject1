@extends('layouts.app')

@section('content')
<?php $whatsapp = "6281384871163"; ?>
<style>
/* HERO */
.kt-hero-wrap {
    position: relative;
    padding: 110px 0 90px;
    text-align: center;
    overflow: hidden;
    background: linear-gradient(160deg, #0f2444 0%, #102a52 50%, #0d1e3a 100%);
    border-bottom: 1px solid rgba(93,146,232,0.1);
}

.kt-hero-wrap::before {
    content: '';
    position: absolute; top: -120px; left: 50%; transform: translateX(-50%);
    width: 680px; height: 680px; border-radius: 50%;
    background: radial-gradient(circle, rgba(45,101,200,0.14) 0%, transparent 70%);
    pointer-events: none;
}

.kt-hero-inner { position: relative; z-index: 1; }

.kt-hero-wrap h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(32px, 5.5vw, 52px);
    font-weight: 700; color: #fff; margin-bottom: 12px;
    animation: fadeUp 0.8s ease 0.25s both;
}

.kt-hero-wrap p {
    font-size: 16px; font-weight: 300;
    color: rgba(255,255,255,0.70);
    max-width: 450px; margin: 0 auto; line-height: 1.75;
    animation: fadeUp 0.8s ease 0.4s both;
}

/* VERSE SECTION */
.kt-verse-section { background: #102040; padding: 52px 0; }

.kt-verse-card {
    max-width: 660px; margin: 0 auto;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(93,146,232,0.16);
    border-left: 3px solid #2d65c8;
    border-radius: 18px; padding: 34px 38px;
    text-align: center; backdrop-filter: blur(8px);
}

.kt-verse-icon { color: #93bef8; font-size: 26px; margin-bottom: 14px; }
.kt-verse-text { font-size: 15.5px; font-weight: 300; color: rgba(255,255,255,0.80); line-height: 1.85; font-style: italic; margin-bottom: 12px; }
.kt-verse-ref { font-size: 13px; font-weight: 600; color: #5592e8; letter-spacing: .06em; }

/* MAIN SECTION */
.kt-main { background: #0f2040; padding: 80px 0 96px; border-top: 1px solid rgba(93,146,232,0.1); }

.kt-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: start; }

@media (max-width: 768px) { .kt-grid { grid-template-columns: 1fr; gap: 32px; } }

/* SECTION HEADING */
.kt-section-h {
    font-family: 'Playfair Display', serif;
    font-size: 22px; font-weight: 700; color: #fff; margin-bottom: 22px;
}

/* INFO CARD */
.kt-info-card {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(93,146,232,0.12);
    border-radius: 14px; padding: 18px 20px; margin-bottom: 13px;
    display: flex; align-items: flex-start; gap: 15px;
    transition: border-color 0.25s;
}

.kt-info-card:hover { border-color: rgba(93,146,232,0.28); }

.kt-info-icon {
    width: 40px; height: 40px; border-radius: 11px;
    background: rgba(26,74,158,0.18);
    border: 1px solid rgba(93,146,232,0.2);
    display: flex; align-items: center; justify-content: center;
    font-size: 15px; color: #93bef8; flex-shrink: 0; margin-top: 1px;
}

.kt-info-label { font-size: 11.5px; font-weight: 600; letter-spacing: .07em; text-transform: uppercase; color: #5592e8; margin-bottom: 4px; }
.kt-info-val { font-size: 13.5px; color: rgba(255,255,255,0.72); line-height: 1.65; font-weight: 300; }

/* MAP EMBED */
.kt-map {
    margin-top: 22px;
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid rgba(93,146,232,0.14);
}

.kt-map iframe { display: block; width: 100%; height: 190px; border: none; }

/* FORM CARD */
.kt-form-card {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(93,146,232,0.16);
    border-radius: 20px; padding: 32px;
    backdrop-filter: blur(8px);
}

.kt-form-title {
    font-family: 'Playfair Display', serif;
    font-size: 17px; font-weight: 600; color: #fff; margin-bottom: 22px;
}

.kt-group { margin-bottom: 16px; }

.kt-label { display: block; font-size: 13.5px; font-weight: 500; color: rgba(255,255,255,0.75); margin-bottom: 6px; }

.kt-input, .kt-textarea {
    width: 100%;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(93,146,232,0.18);
    border-radius: 10px;
    padding: 11px 15px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px; color: #fff; outline: none;
    transition: border-color 0.25s, background 0.25s;
}

.kt-input::placeholder, .kt-textarea::placeholder { color: rgba(255,255,255,0.26); font-weight: 300; }
.kt-input:focus, .kt-textarea:focus { border-color: #5592e8; background: rgba(255,255,255,0.09); }
.kt-textarea { resize: vertical; min-height: 100px; }

.kt-btn-wa {
    display: flex; align-items: center; justify-content: center; gap: 10px;
    width: 100%; padding: 13px;
    background: linear-gradient(135deg, #1a5c2e, #25a244, #1a5c2e);
    background-size: 200% auto;
    border: none; border-radius: 11px;
    font-family: 'DM Sans', sans-serif; font-size: 15px; font-weight: 600; color: #fff;
    cursor: pointer; box-shadow: 0 8px 24px rgba(37,162,68,0.3);
    transition: background-position 0.4s, transform 0.2s, box-shadow 0.2s;
}
.kt-btn-wa:hover { background-position: right center; transform: translateY(-2px); box-shadow: 0 12px 32px rgba(37,162,68,0.4); }
.kt-btn-wa i { font-size: 18px; }
</style>

<div class="kt-hero-wrap">
    <div class="container kt-hero-inner">
        <div class="eyebrow" style="animation: fadeUp .7s ease .1s both;">
            <span class="eyebrow-dot"></span>Hubungi Kami<span class="eyebrow-dot"></span>
        </div>
        <h1>Kami Senang Mendengar<br>dari Anda</h1>
        <p>Jangan ragu untuk menghubungi kami kapan saja. Tim kami siap melayani Anda.</p>
    </div>
</div>

<section class="kt-verse-section">
    <div class="global-container">
        <div class="kt-verse-card">
            <div class="kt-verse-icon"><i class="bi bi-book"></i></div>
            <p class="kt-verse-text">"Sebab itu sejak waktu kami mendengarnya, kami tidak berhenti-henti berdoa untuk kamu. Kami meminta, supaya kamu menerima segala hikmat dan pengertian yang benar, untuk mengetahui kehendak Tuhan."</p>
            <span class="kt-verse-ref">Kolose 1:9 (TB)</span>
        </div>
    </div>
</section>

<section class="kt-main">
    <div class="global-container">
        <div class="kt-grid">

            <!-- INFO -->
            <div>
                <h4 class="kt-section-h">Informasi Kontak</h4>

                <div class="kt-info-card">
                    <div class="kt-info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    <div>
                        <div class="kt-info-label">Alamat</div>
                        <div class="kt-info-val">Jl. Pasar Tambunan Desa No.4<br>Lumban Pea, Kec. Balige<br>Toba, Sumatera Utara</div>
                    </div>
                </div>

                <div class="kt-info-card">
                    <div class="kt-info-icon"><i class="bi bi-telephone-fill"></i></div>
                    <div>
                        <div class="kt-info-label">Telepon</div>
                        <div class="kt-info-val">+62 813-8487-1163</div>
                    </div>
                </div>

                <div class="kt-info-card">
                    <div class="kt-info-icon"><i class="bi bi-envelope-fill"></i></div>
                    <div>
                        <div class="kt-info-label">Email</div>
                        <div class="kt-info-val">gbitambunan01@gmail.com</div>
                    </div>
                </div>

                <div class="kt-info-card">
                    <div class="kt-info-icon"><i class="bi bi-clock-fill"></i></div>
                    <div>
                        <div class="kt-info-label">Jam Sekretariat</div>
                        <div class="kt-info-val">Senin – Jumat: 09.00 – 17.00 WIB<br>Sabtu: 09.00 – 15.00 WIB<br>Minggu: Setelah ibadah</div>
                    </div>
                </div>

                <div class="kt-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.7!2d99.063!3d2.333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMsKwMjAnMDAuMCJOIDk5wrAwMycwMC4wIkU!5e0!3m2!1sid!2sid!4v1"
                        allowfullscreen loading="lazy">
                    </iframe>
                </div>
            </div>

            <!-- FORM -->
            <div>
                <div class="kt-form-card">
                    <p class="kt-form-title"><i class="bi bi-chat-dots me-2" style="color:#5592e8;"></i>Kirim Pesan</p>
                    <form onsubmit="sendWA(); return false;">
                        <div class="kt-group">
                            <label class="kt-label">Nama Lengkap</label>
                            <input type="text" id="kt-nama" class="kt-input" placeholder="Nama Anda" required>
                        </div>
                        <div class="kt-group">
                            <label class="kt-label">Email</label>
                            <input type="email" id="kt-email" class="kt-input" placeholder="email@contoh.com" required>
                        </div>
                        <div class="kt-group">
                            <label class="kt-label">Pesan</label>
                            <textarea id="kt-pesan" class="kt-textarea" placeholder="Tulis pesan Anda di sini…" required></textarea>
                        </div>
                        <button type="submit" class="kt-btn-wa">
                            <i class="bi bi-whatsapp"></i>
                            Kirim via WhatsApp
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
function sendWA() {
    var n = document.getElementById('kt-nama').value;
    var e = document.getElementById('kt-email').value;
    var p = document.getElementById('kt-pesan').value;
    var t = "Shalom 🙏%0A%0ANama: " + n + "%0AEmail: " + e + "%0APesan: " + p;
    window.open("https://wa.me/<?= $whatsapp ?>?text=" + t, '_blank');
}
</script>
@endsection