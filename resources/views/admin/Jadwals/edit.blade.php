@extends('admin.layouts.main')

@section('content')

    @include('admin.layouts.LOAJadwal.JadwalEdit')

    <div class="form-wrap">
        <div class="form-card">
            <h2>{{ "\u{270F}\u{FE0F}" }} Edit Jadwal Pelayan & Kegiatan</h2>

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

            <form action="{{ route('jadwal.update', $Jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="fg">
                    <label>Nama Kegiatan</label>
                    <input type="text" name="title" value="{{ old('title', $Jadwal->title) }}" required maxlength="100">
                </div>

                <div class="form-row-2">
                    <div class="fg" id="hari-group">
                        <label>Hari</label>

                        <select name="day">
                            <option value="Senin" {{ old('day', $Jadwal->day) == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ old('day', $Jadwal->day) == 'Selasa' ? 'selected' : '' }}>Selasa
                            </option>
                            <option value="Rabu" {{ old('day', $Jadwal->day) == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ old('day', $Jadwal->day) == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ old('day', $Jadwal->day) == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ old('day', $Jadwal->day) == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            <option value="Minggu" {{ old('day', $Jadwal->day) == 'Minggu' ? 'selected' : '' }}>Minggu
                            </option>
                        </select>
                    </div>

                    <div class="fg">
                        <label>Kategori</label>

                        <select name="category" id="category" required>
                            <option value="mingguan" {{ old('category', $Jadwal->category) == 'mingguan' ? 'selected' : '' }}>
                                Jadwal Mingguan</option>
                            <option value="acara_khusus" {{ old('category', $Jadwal->category) == 'acara_khusus' ? 'selected' : '' }}>Acara Khusus</option>
                        </select>
                    </div>
                </div>

                <div class="form-row-2" id="jam-group">
                    <div class="fg">
                        <label>Jam Mulai</label>
                        <input type="time" name="start_time" value="{{ old('start_time', substr($Jadwal->start_time,0,5)) }}">

                    </div>

                    <div class="fg">
                        <label>Jam Selesai</label>
                        <input type="time" name="end_time" value="{{ old('end_time', substr($Jadwal->end_time,0,5)) }}">
                    </div>
                </div>

                <div class="fg" id="jadwal-khusus-group" style="display:none;">
                    <label>Jadwal Acara Khusus</label>

                    <input type="text" name="jadwal_khusus" value="{{ old('jadwal_khusus', $Jadwal->jadwal_khusus) }}"
                        placeholder="Contoh: Desember, Maret/April, Tahunan" maxlength="100">
                </div>

                <div class="fg">
                    <label>Lokasi</label>
                    <input type="text" name="location" value="{{ old('location', $Jadwal->location) }}" required
                        maxlength="100">
                </div>

                <div class="fg">
                    <label>Deskripsi</label>
                    <textarea name="description" rows="3" required
                        maxlength="200">{{ old('description', $Jadwal->description) }}</textarea>
                </div>

                <div class="btn-row">
                    <a href="{{ route('jadwal.index') }}" class="btn-back">← Batal</a>
                    <button type="submit" class="btn-submit">{{ "\u{2705}" }} Update</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/Admin/JadwalEdit.js') }}"></script>

@endsection