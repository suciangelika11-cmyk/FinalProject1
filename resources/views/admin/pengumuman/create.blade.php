@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAPengumuman.PengumumanCreate')

    <div class="pengumuman-page">
        <div class="pengumuman-header">
            <div>
                <h1>Tambah Pengumuman</h1>
            </div>
        </div>

        <div class="pengumuman-card">
            <div class="pengumuman-card-top">
                <h2>Form Tambah Pengumuman</h2>
                <p>Isi judul, isi pengumuman, tanggal, gambar, dan status publikasi.</p>
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

                <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group full">
                            <label>Judul Pengumuman</label>
                            <input type="text" name="title" class="form-control-custom" value="{{ old('title') }}" required>
                        </div>

                        <div class="form-group full">
                            <label>Isi Pengumuman</label>
                            <textarea name="content" class="form-textarea-custom" required>{{ old('content') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Publish</label>
                            <input type="date" name="publish_date" class="form-control-custom"
                                value="{{ old('publish_date') }}" min="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="is_active" class="form-select-custom" required>
                                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>

                        <div class="form-group full">
                            <label>Gambar Pengumuman</label>
                            <input type="file" name="image" class="form-control-custom">
                        </div>
                    </div>

                    <div class="action-row">
                        <a href="{{ route('pengumuman.index') }}" class="btn-cancel">Batal</a>
                        <button type="submit" class="btn-save">Simpan Pengumuman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection