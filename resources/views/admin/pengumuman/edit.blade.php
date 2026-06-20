@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAPengumuman.PengumumanEdit')

    <div class="pengumuman-page">
        <div class="pengumuman-header">
            <div>
                <h1>Edit</h1>
            </div>
        </div>

        <div class="pengumuman-card">
            <div class="pengumuman-card-top">
                <h2>Form Edit Pengumuman</h2>
                <p>Pastikan informasi yang diperbarui sudah sesuai sebelum dipublikasikan.</p>
            </div>

            <div class="pengumuman-card-body">
                @if ($errors->any())
                    <div class="alert-danger-custom">
                        <strong>Terjadi kesalahan.</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-grid">
                        <div class="form-group full">
                            <label>Judul Pengumuman</label>
                            <input type="text" name="judul" class="form-control-custom"
                                value="{{ old('judul', $pengumuman->judul) }}" required maxlength="100">
                        </div>

                        <div class="form-group full">
                            <label>Isi Pengumuman</label>
                            <textarea name="deksripsi" class="form-textarea-custom" required maxlength="250"
                                required>{{ old('deksripsi', $pengumuman->deksripsi) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Publish</label>
                            <input type="date" name="tanggal_liris" class="form-control-custom"
                                value="{{ old('tanggal_liris', $pengumuman->tanggal_liris) }}" min="{{ date('Y-m-d') }}"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="is_active" class="form-select-custom" required>
                                <option value="1" {{ old('is_active', $pengumuman->is_active) == 1 ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="0" {{ old('is_active', $pengumuman->is_active) == 0 ? 'selected' : '' }}>
                                    Nonaktif</option>
                            </select>
                        </div>

                        <div class="form-group full">
                            <label>Gambar Pengumuman</label>
                            <input type="file" name="foto" class="form-control-custom">

                            @if($pengumuman->foto)
                                <img src="{{ asset('storage/' . $pengumuman->foto) }}" alt="Gambar pengumuman"
                                    class="preview-img">
                            @endif
                        </div>
                    </div>

                    <div class="action-row">
                        <a href="{{ route('pengumuman.index') }}" class="btn-cancel">Batal</a>
                        <button type="submit" class="btn-save">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection