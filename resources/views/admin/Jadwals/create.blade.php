@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAJadwal.JadwalCreate')

    <div class="form-wrap">
        <div class="form-card">
            <h2>📅 Tambah Jadwal Pelayan & Kegiatan</h2>

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
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Ibadah Sesi 1" required maxlength="100">
                </div>

                <div class="form-row-2">
                    <div class="fg">
                        <label>Hari</label>

                        <select name="day" required>
                            <option value="">-- Pilih Hari --</option>
                            <option value="Senin" {{ old('day') == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ old('day') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ old('day') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ old('day') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ old('day') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ old('day') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            <option value="Minggu" {{ old('day') == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                        </select>
                    </div>

                    <div class="fg">
                        <label>Kategori</label>

                        <select name="category" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="mingguan" {{ old('category') == 'mingguan' ? 'selected' : '' }}>Jadwal Mingguan
                            </option>
                            <option value="acara_khusus" {{ old('category') == 'acara_khusus' ? 'selected' : '' }}>Acara
                                Khusus</option>
                        </select>
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="fg">
                        <label>Jam Mulai</label>
                        <input type="time" name="start_time" value="{{ old('start_time') }}" required>
                    </div>

                    <div class="fg">
                        <label>Jam Selesai</label>
                        <input type="time" name="end_time" value="{{ old('end_time') }}">
                    </div>
                </div>

                <div class="fg">
                    <label>Lokasi</label>
                    <input type="text" name="location" value="{{ old('location') }}" placeholder="Contoh: GBI Tambunan" required maxlength="100">
                </div>

                <div class="fg">
                    <label>Deskripsi</label>
                    <textarea name="description" rows="3" required maxlength="200"
                        placeholder="Masukkan deskripsi kegiatan">{{ old('description') }}</textarea>
                </div>

                <div class="btn-row">
                    <a href="{{ route('jadwal.index') }}" class="btn-back">← Batal</a>
                    <button type="submit" class="btn-submit">💾 Simpan Jadwal</button>
                </div>
            </form>
        </div>
    </div>

@endsection