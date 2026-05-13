@extends('layouts.app')

@section('content')
<style>
.jm-outer {
    min-height: 100vh;
    padding: 64px 20px 96px;
    background: linear-gradient(160deg, #0f2444 0%, #102a52 40%, #0d1e3a 100%);
}

.jm-wrap { max-width: 720px; margin: auto; }

/* HEADER */
.jm-head { text-align: center; margin-bottom: 44px; }

.jm-head h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(30px, 5vw, 42px);
    font-weight: 700;
    color: #fff;
    line-height: 1.18;
    margin-bottom: 12px;
    animation: fadeUp 0.8s ease 0.25s both;
}

.jm-head p {
    color: rgba(255,255,255,0.68);
    font-size: 15px;
    font-weight: 300;
    line-height: 1.7;
    animation: fadeUp 0.8s ease 0.4s both;
}

/* ALERTS */
.jm-alert {
    border-radius: 12px;
    padding: 14px 20px;
    margin-bottom: 20px;
    font-size: 14px;
    font-weight: 500;
}
.jm-alert-ok { background: rgba(26,158,96,0.15); border: 1px solid rgba(26,158,96,0.3); color: #7ee8b6; }
.jm-alert-err { background: rgba(220,53,69,0.15); border: 1px solid rgba(220,53,69,0.28); color: #f8a4ad; }

/* CARD */
.jm-card {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(93,146,232,0.16);
    border-radius: 22px;
    padding: 38px 34px;
    backdrop-filter: blur(10px);
    animation: fadeUp 0.8s ease 0.3s both;
}

.jm-section-title {
    font-family: 'Playfair Display', serif;
    font-size: 17px; font-weight: 600;
    color: #93bef8; margin-bottom: 20px;
    display: flex; align-items: center; gap: 10px;
}

.jm-section-title::before {
    content: '';
    width: 3px; height: 18px;
    background: linear-gradient(to bottom, #2d65c8, #93bef8);
    border-radius: 2px;
    flex-shrink: 0;
}

.jm-group { margin-bottom: 18px; }

.jm-label {
    display: block;
    margin-bottom: 7px;
    font-size: 13.5px;
    font-weight: 500;
    color: rgba(255,255,255,0.78);
}

.jm-input,
.jm-textarea,
.jm-select {
    width: 100%;
    padding: 11px 15px;
    border-radius: 10px;
    border: 1px solid rgba(93,146,232,0.2);
    background: rgba(255,255,255,0.06);
    color: #fff;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    outline: none;
    transition: border-color 0.25s, background 0.25s;
}

.jm-input:focus,
.jm-textarea:focus,
.jm-select:focus {
    border-color: #5592e8;
    background: rgba(255,255,255,0.09);
}

.jm-input::placeholder,
.jm-textarea::placeholder { color: rgba(255,255,255,0.3); font-weight: 300; }

.jm-select option { background: #0f2040; color: #fff; }

.jm-textarea { min-height: 88px; resize: vertical; }

.jm-invalid { border-color: #f87171 !important; }

.jm-feedback {
    margin-top: 5px;
    color: #fca5a5;
    font-size: 12.5px;
}

.jm-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.jm-radio-group { display: flex; gap: 18px; flex-wrap: wrap; }

.jm-radio-label {
    display: flex; align-items: center; gap: 8px;
    font-size: 14px; color: rgba(255,255,255,0.78);
    cursor: pointer;
}

.jm-radio-label input[type="radio"] {
    accent-color: #5592e8;
    width: 16px; height: 16px;
}

.jm-divider {
    margin: 28px 0;
    height: 1px;
    background: rgba(93,146,232,0.12);
}

.jm-submit {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #1a4a9e, #2d65c8);
    color: #fff;
    font-family: 'DM Sans', sans-serif;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 8px 24px rgba(26,74,158,0.38);
    transition: opacity 0.25s, transform 0.2s, box-shadow 0.2s;
}

.jm-submit:hover {
    opacity: 0.92;
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(26,74,158,0.48);
}

@media (max-width: 560px) {
    .jm-row { grid-template-columns: 1fr; }
    .jm-card { padding: 26px 20px; }
}
</style>

<div class="jm-outer">
    <div class="jm-wrap">

        <div class="jm-head">
            <div class="eyebrow" style="animation: fadeUp .7s ease .1s both; margin-bottom: 22px;">
                <span class="eyebrow-dot"></span>Pendaftaran Jemaat<span class="eyebrow-dot"></span>
            </div>
            <h1>Bergabung Bersama<br>Keluarga GBI Tambunan</h1>
            <p>Isi formulir di bawah ini untuk mendaftar sebagai jemaat resmi gereja kami.</p>
        </div>

        @if(session('success'))
            <div class="jm-alert jm-alert-ok">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="jm-alert jm-alert-err">{{ session('error') }}</div>
        @endif

        <div class="jm-card">
            <form action="{{ route('jemaat.store') }}" method="POST">
                @csrf

                <div class="jm-section-title">Data Keluarga</div>

                <div class="jm-row">
                    <div class="jm-group">
                        <label class="jm-label">No KK</label>
                        <input type="text" name="no_kk" value="{{ old('no_kk') }}"
                               class="jm-input @error('no_kk') jm-invalid @enderror" placeholder="No. Kartu Keluarga">
                        @error('no_kk')<div class="jm-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="jm-group">
                        <label class="jm-label">Nama Keluarga</label>
                        <input type="text" name="nama_keluarga" value="{{ old('nama_keluarga') }}"
                               class="jm-input @error('nama_keluarga') jm-invalid @enderror" placeholder="Nama keluarga">
                        @error('nama_keluarga')<div class="jm-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="jm-group">
                    <label class="jm-label">Alamat Domisili</label>
                    <textarea name="alamat_domisili" class="jm-textarea @error('alamat_domisili') jm-invalid @enderror" placeholder="Alamat tinggal sekarang">{{ old('alamat_domisili') }}</textarea>
                    @error('alamat_domisili')<div class="jm-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="jm-group">
                    <label class="jm-label">Alamat KTP</label>
                    <textarea name="alamat_ktp" class="jm-textarea @error('alamat_ktp') jm-invalid @enderror" placeholder="Alamat sesuai KTP">{{ old('alamat_ktp') }}</textarea>
                    @error('alamat_ktp')<div class="jm-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="jm-divider"></div>
                <div class="jm-section-title">Data Pribadi</div>

                <div class="jm-row">
                    <div class="jm-group">
                        <label class="jm-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                               class="jm-input @error('nama_lengkap') jm-invalid @enderror" placeholder="Nama sesuai KTP">
                        @error('nama_lengkap')<div class="jm-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="jm-group">
                        <label class="jm-label">NIK</label>
                        <input type="text" name="nik" value="{{ old('nik') }}"
                               class="jm-input @error('nik') jm-invalid @enderror" placeholder="16 digit NIK">
                        @error('nik')<div class="jm-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="jm-row">
                    <div class="jm-group">
                        <label class="jm-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                               class="jm-input @error('tempat_lahir') jm-invalid @enderror" placeholder="Kota kelahiran">
                        @error('tempat_lahir')<div class="jm-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="jm-group">
                        <label class="jm-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                               class="jm-input @error('tanggal_lahir') jm-invalid @enderror">
                        @error('tanggal_lahir')<div class="jm-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="jm-group">
                    <label class="jm-label">Jenis Kelamin</label>
                    <div class="jm-radio-group">
                        <label class="jm-radio-label">
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                            Laki-laki
                        </label>
                        <label class="jm-radio-label">
                            <input type="radio" name="jenis_kelamin" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                            Perempuan
                        </label>
                    </div>
                </div>

                <div class="jm-row">
                    <div class="jm-group">
                        <label class="jm-label">Handphone / WA</label>
                        <input type="text" name="handphone" value="{{ old('handphone') }}"
                               class="jm-input @error('handphone') jm-invalid @enderror" placeholder="+62 xxx-xxxx-xxxx">
                        @error('handphone')<div class="jm-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="jm-group">
                        <label class="jm-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}"
                               class="jm-input @error('pekerjaan') jm-invalid @enderror" placeholder="Jenis pekerjaan">
                        @error('pekerjaan')<div class="jm-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="jm-group">
                    <label class="jm-label">Status Pernikahan</label>
                    <div class="jm-radio-group">
                        <label class="jm-radio-label">
                            <input type="radio" name="status_pernikahan" value="Sudah Menikah" {{ old('status_pernikahan') == 'Sudah Menikah' ? 'checked' : '' }}>
                            Sudah Menikah
                        </label>
                        <label class="jm-radio-label">
                            <input type="radio" name="status_pernikahan" value="Belum Menikah" {{ old('status_pernikahan') == 'Belum Menikah' ? 'checked' : '' }}>
                            Belum Menikah
                        </label>
                    </div>
                </div>

                <input type="hidden" name="status" value="pending">

                <div class="jm-divider"></div>

                <button type="submit" class="jm-submit">
                    <i class="bi bi-send me-2"></i>Kirim Pendaftaran
                </button>
            </form>
        </div>
    </div>
</div>
@endsection