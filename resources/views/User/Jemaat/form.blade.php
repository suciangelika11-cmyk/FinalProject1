@extends('layouts.app')

@section('content')
    <style>
        /* ==================================
       WRAPPER
    ================================== */
        .jm-outer {
            min-height: 100vh;
            padding: 80px 20px 100px;
            background:
                radial-gradient(circle at top,
                    rgba(118, 159, 205, .15),
                    transparent 40%),
                #F7FBFC;
        }

        .jm-wrap {
            max-width: 760px;
            margin: auto;
        }

        /* ==================================
       HEADER
    ================================== */
        .jm-head {
            text-align: center;
            margin-bottom: 50px;
        }

        .jm-head h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(34px, 5vw, 48px);
            font-weight: 700;
            color: #2C3E50;
            margin-bottom: 14px;
            animation: fadeUp .8s ease .25s both;
        }

        .jm-head p {
            color: #6B7C93;
            font-size: 15px;
            line-height: 1.8;
            max-width: 600px;
            margin: auto;
            animation: fadeUp .8s ease .4s both;
        }

        /* ==================================
       ALERT
    ================================== */
        .jm-alert {
            border-radius: 14px;
            padding: 14px 20px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .jm-alert-ok {
            background: #e8faf1;
            border: 1px solid #b7ebd2;
            color: #228b5a;
        }

        .jm-alert-err {
            background: #fff0f1;
            border: 1px solid #f3c8ce;
            color: #c0394b;
        }

        /* ==================================
       CARD
    ================================== */
        .jm-card {
            background: #ffffff;
            border-radius: 28px;
            padding: 40px;
            border: 1px solid rgba(118, 159, 205, .15);

            box-shadow:
                0 20px 45px rgba(118, 159, 205, .08);

            animation: fadeUp .8s ease .3s both;
        }

        /* ==================================
       SECTION TITLE
    ================================== */
        .jm-section-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;
            color: #769FCD;
            margin-bottom: 22px;

            display: flex;
            align-items: center;
            gap: 10px;
        }

        .jm-section-title::before {
            content: '';
            width: 4px;
            height: 20px;
            border-radius: 999px;
            background: linear-gradient(to bottom,
                    #769FCD,
                    #B9D7EA);
        }

        /* ==================================
       FORM
    ================================== */
        .jm-group {
            margin-bottom: 20px;
        }

        .jm-label {
            display: block;
            margin-bottom: 8px;

            font-size: 14px;
            font-weight: 600;
            color: #44556B;
        }

        .jm-input,
        .jm-textarea,
        .jm-select {
            width: 100%;
            padding: 13px 16px;

            border-radius: 12px;

            border: 1px solid #D6E6F2;
            background: #F7FBFC;

            color: #2C3E50;

            font-size: 14px;
            font-family: 'DM Sans', sans-serif;

            transition: .25s ease;
        }

        .jm-input:focus,
        .jm-textarea:focus,
        .jm-select:focus {
            border-color: #769FCD;
            background: #fff;

            outline: none;

            box-shadow:
                0 0 0 4px rgba(118, 159, 205, .12);
        }

        .jm-input::placeholder,
        .jm-textarea::placeholder {
            color: #9BAFC4;
        }

        .jm-select option {
            background: #fff;
            color: #2C3E50;
        }

        .jm-textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* ==================================
       ERROR
    ================================== */
        .jm-invalid {
            border-color: #dc3545 !important;
        }

        .jm-feedback {
            margin-top: 6px;
            font-size: 12px;
            color: #dc3545;
        }

        /* ==================================
       GRID
    ================================== */
        .jm-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        /* ==================================
       RADIO
    ================================== */
        .jm-radio-group {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .jm-radio-label {
            display: flex;
            align-items: center;
            gap: 8px;

            color: #5E7187;
            font-size: 14px;
            cursor: pointer;
        }

        .jm-radio-label input[type="radio"] {
            accent-color: #769FCD;
            width: 16px;
            height: 16px;
        }

        /* ==================================
       DIVIDER
    ================================== */
        .jm-divider {
            margin: 32px 0;

            height: 1px;

            background: linear-gradient(to right,
                    transparent,
                    #D6E6F2,
                    transparent);
        }

        /* ==================================
       BUTTON
    ================================== */
        .jm-submit {
            width: 100%;

            padding: 15px;

            border: none;
            border-radius: 14px;

            background: linear-gradient(135deg,
                    #769FCD,
                    #5F89B8);

            color: white;

            font-size: 15px;
            font-weight: 600;

            cursor: pointer;

            transition: .3s ease;
        }

        .jm-submit:hover {
            transform: translateY(-3px);

            box-shadow:
                0 15px 30px rgba(118, 159, 205, .25);
        }

        /* ==================================
       ANIMATION
    ================================== */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ==================================
       MOBILE
    ================================== */
        @media (max-width: 560px) {

            .jm-row {
                grid-template-columns: 1fr;
            }

            .jm-card {
                padding: 26px 20px;
            }
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
                        <textarea name="alamat_domisili" class="jm-textarea @error('alamat_domisili') jm-invalid @enderror"
                            placeholder="Alamat tinggal sekarang">{{ old('alamat_domisili') }}</textarea>
                        @error('alamat_domisili')<div class="jm-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="jm-group">
                        <label class="jm-label">Alamat KTP</label>
                        <textarea name="alamat_ktp" class="jm-textarea @error('alamat_ktp') jm-invalid @enderror"
                            placeholder="Alamat sesuai KTP">{{ old('alamat_ktp') }}</textarea>
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