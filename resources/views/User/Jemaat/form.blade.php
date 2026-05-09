@extends('layouts.app')

@section('content')

<div class="container py-4" style="max-width: 850px;">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <h4 class="fw-bold mb-4 text-center">
                FORM PENDAFTARAN JEMAAT
            </h4>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('jemaat.store') }}" method="POST">
                @csrf

                {{-- No KK --}}
                <div class="mb-3">
                    <label class="form-label">No KK *</label>
                    <input type="text"
                           name="no_kk"
                           class="form-control @error('no_kk') is-invalid @enderror"
                           value="{{ old('no_kk') }}"
                           placeholder="Masukkan nomor KK"
                           required>

                    @error('no_kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Nama Keluarga --}}
                <div class="mb-3">
                    <label class="form-label">Nama Keluarga *</label>
                    <input type="text"
                           name="nama_keluarga"
                           class="form-control @error('nama_keluarga') is-invalid @enderror"
                           value="{{ old('nama_keluarga') }}"
                           placeholder="Masukkan nama keluarga"
                           required>

                    @error('nama_keluarga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Alamat Domisili --}}
                <div class="mb-3">
                    <label class="form-label">Alamat Domisili *</label>
                    <textarea name="alamat_domisili"
                              class="form-control @error('alamat_domisili') is-invalid @enderror"
                              rows="3"
                              placeholder="Masukkan alamat domisili"
                              required>{{ old('alamat_domisili') }}</textarea>

                    @error('alamat_domisili')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Alamat KTP --}}
                <div class="mb-3">
                    <label class="form-label">Alamat KTP</label>
                    <textarea name="alamat_ktp"
                              class="form-control @error('alamat_ktp') is-invalid @enderror"
                              rows="3"
                              placeholder="Masukkan alamat KTP">{{ old('alamat_ktp') }}</textarea>

                    @error('alamat_ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Kolom --}}
                <div class="mb-3">
                    <label class="form-label">Kolom *</label>

                    <select name="kolom"
                            class="form-select @error('kolom') is-invalid @enderror"
                            required>

                        <option value="">-- Pilih Kolom --</option>

                        <option value="Kolom 1" {{ old('kolom') == 'Kolom 1' ? 'selected' : '' }}>
                            Kolom 1
                        </option>

                        <option value="Kolom 2" {{ old('kolom') == 'Kolom 2' ? 'selected' : '' }}>
                            Kolom 2
                        </option>

                        <option value="Kolom 3" {{ old('kolom') == 'Kolom 3' ? 'selected' : '' }}>
                            Kolom 3
                        </option>

                    </select>

                    @error('kolom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Nama Lengkap --}}
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap *</label>
                    <input type="text"
                           name="nama_lengkap"
                           class="form-control @error('nama_lengkap') is-invalid @enderror"
                           value="{{ old('nama_lengkap') }}"
                           placeholder="Masukkan nama lengkap"
                           required>

                    @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- NIK --}}
                <div class="mb-3">
                    <label class="form-label">NIK *</label>
                    <input type="text"
                           name="nik"
                           class="form-control @error('nik') is-invalid @enderror"
                           value="{{ old('nik') }}"
                           placeholder="Masukkan NIK"
                           required>

                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Tempat Lahir --}}
                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text"
                           name="tempat_lahir"
                           class="form-control"
                           value="{{ old('tempat_lahir') }}"
                           placeholder="Masukkan tempat lahir">
                </div>

                {{-- Tanggal Lahir --}}
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date"
                           name="tanggal_lahir"
                           class="form-control"
                           value="{{ old('tanggal_lahir') }}">
                </div>

                {{-- Jenis Kelamin --}}
                <div class="mb-3">
                    <label class="form-label d-block">Jenis Kelamin</label>

                    @php $jk = old('jenis_kelamin'); @endphp

                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                               type="radio"
                               name="jenis_kelamin"
                               value="Laki"
                               {{ $jk == 'Laki' ? 'checked' : '' }}>

                        <label class="form-check-label">
                            Laki-laki
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                               type="radio"
                               name="jenis_kelamin"
                               value="Perempuan"
                               {{ $jk == 'Perempuan' ? 'checked' : '' }}>

                        <label class="form-check-label">
                            Perempuan
                        </label>
                    </div>
                </div>

                {{-- Handphone --}}
                <div class="mb-3">
                    <label class="form-label">Handphone / WA</label>
                    <input type="text"
                           name="handphone"
                           class="form-control"
                           value="{{ old('handphone') }}"
                           placeholder="Masukkan nomor HP / WhatsApp">
                </div>

                {{-- Pekerjaan --}}
                <div class="mb-3">
                    <label class="form-label">Pekerjaan</label>
                    <input type="text"
                           name="pekerjaan"
                           class="form-control"
                           value="{{ old('pekerjaan') }}"
                           placeholder="Masukkan pekerjaan">
                </div>

                {{-- Status Pernikahan --}}
                <div class="mb-4">
                    <label class="form-label d-block">
                        Status Pernikahan *
                    </label>

                    @php $statusPernikahan = old('status_pernikahan'); @endphp

                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                               type="radio"
                               name="status_pernikahan"
                               value="Sudah Menikah"
                               {{ $statusPernikahan == 'Sudah Menikah' ? 'checked' : '' }}
                               required>

                        <label class="form-check-label">
                            Sudah Menikah
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                               type="radio"
                               name="status_pernikahan"
                               value="Belum Menikah"
                               {{ $statusPernikahan == 'Belum Menikah' ? 'checked' : '' }}
                               required>

                        <label class="form-check-label">
                            Belum Menikah
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Kirim Pendaftaran
                </button>

            </form>

        </div>
    </div>
</div>

@endsection