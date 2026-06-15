@extends('admin.layouts.main')

@section('content')

    @include('admin.layouts.LOAJadwal.JadwalCreate')

    <div class="form-wrap">
        <div class="form-card">
            <h2>{{ "\u{1F4C5}" }} Tambah Jadwal Pelayan & Kegiatan</h2>

            @if ($errors->any())
                <div
                    style="background:#fdf0f0;border:1px solid #f5c6cb;border-radius:8px;padding:14px;margin-bottom:18px;color:#e05555;font-size:13px;">
                    <strong>Terjadi kesalahan!</strong>

                    <ul style="margin:6px 0 0 16px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf

                <div class="fg">
                    <label>Nama Kegiatan</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Ibadah Sesi 1" required
                        maxlength="100">
                </div>

                <div class="form-row-2">
                    <div class="fg" id="hari-group">
                        <label>Hari</label>

                        <select name="day">
                            <option value="">-- Pilih Hari --</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>

                    <div class="fg">
                        <label>Kategori</label>

                        <select name="category" id="category" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="mingguan" {{ old('category') == 'mingguan' ? 'selected' : '' }}>
                                Jadwal Mingguan
                            </option>
                            <option value="acara_khusus" {{ old('category') == 'acara_khusus' ? 'selected' : '' }}>
                                Acara Khusus
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-row-2" id="jam-group">
                    <div class="fg">
                        <label>Jam Mulai</label>
                        <input type="time" name="start_time" value="{{ old('start_time') }}" required>
                    </div>

                    <div class="fg">
                        <label>Jam Selesai</label>
                        <input type="time" name="end_time" value="{{ old('end_time') }}">
                    </div>
                </div>

                <div class="fg" id="jadwal-khusus-group" style="display:none;">
                    <label>Jadwal Acara Khusus</label>
                    <input type="text" name="jadwal_khusus" value="{{ old('jadwal_khusus') }}"
                        placeholder="Contoh: Desember, Maret/April, Tahunan" maxlength="100">
                </div>

                <div class="fg">
                    <label>Lokasi</label>
                    <input type="text" name="location" value="{{ old('location') }}" placeholder="Contoh: GBI Tambunan"
                        required maxlength="100">
                </div>

                <div class="fg">
                    <label>Deskripsi</label>
                    <textarea name="description" rows="3" required maxlength="250"
                        placeholder="Masukkan deskripsi kegiatan">{{ old('description') }}</textarea>
                </div>

                <div class="btn-row">
                    <a href="{{ route('jadwal.index') }}" class="btn-back">← Batal</a>
                    <button type="submit" class="btn-submit">💾 Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/Admin/JadwalCreate.js') }}"></script>

@endsection