@extends('layouts.app')

@section('content')

    @include('layouts.LOForm')

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
                            <input type="text" name="no_kk" maxlength="16" value="{{ old('no_kk') }}"
                                class="jm-input @error('no_kk') jm-invalid @enderror" placeholder="No. Kartu Keluarga"
                                inputmode="numeric" pattern="[0-9]+" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                            @error('no_kk')<div class="jm-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="jm-group">
                            <label class="jm-label">Nama Keluarga</label>
                            <input type="text" name="nama_keluarga" maxlength="50" value="{{ old('nama_keluarga') }}"
                                class="jm-input @error('nama_keluarga') jm-invalid @enderror" placeholder="Nama keluarga">
                            @error('nama_keluarga')<div class="jm-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="jm-group">
                        <label class="jm-label">Alamat Domisili</label>
                        <textarea name="alamat_domisili" maxlength="100"
                            class="jm-textarea @error('alamat_domisili') jm-invalid @enderror"
                            placeholder="Alamat tinggal sekarang">{{ old('alamat_domisili') }}</textarea>
                        @error('alamat_domisili')<div class="jm-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="jm-group">
                        <label class="jm-label">Alamat KTP</label>
                        <textarea name="alamat_ktp" maxlength="100"
                            class="jm-textarea @error('alamat_ktp') jm-invalid @enderror"
                            placeholder="Alamat sesuai KTP">{{ old('alamat_ktp') }}</textarea>
                        @error('alamat_ktp')<div class="jm-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="jm-divider"></div>
                    <div class="jm-section-title">Data Pribadi</div>

                    <div class="jm-row">
                        <div class="jm-group">
                            <label class="jm-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" maxlength="50" value="{{ old('nama_lengkap') }}"
                                class="jm-input @error('nama_lengkap') jm-invalid @enderror" placeholder="Nama sesuai KTP">
                            @error('nama_lengkap')<div class="jm-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="jm-group">
                            <label class="jm-label">NIK</label>
                            <input type="text" name="nik" maxlength="16" value="{{ old('nik') }}"
                                class="jm-input @error('nik') jm-invalid @enderror" placeholder="16 digit NIK"
                                inputmode="numeric" pattern="[0-9]+" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                            @error('nik')<div class="jm-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="jm-row">
                        <div class="jm-group">
                            <label class="jm-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" maxlength="100" value="{{ old('tempat_lahir') }}"
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
                            <input type="text" name="handphone" maxlength="15" value="{{ old('handphone') }}"
                                class="jm-input @error('handphone') jm-invalid @enderror" placeholder="08xxxxxxxxxx"
                                inputmode="numeric" pattern="[0-9]+" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                            @error('handphone')<div class="jm-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="jm-group">
                            <label class="jm-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" maxlength="50" value="{{ old('pekerjaan') }}"
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