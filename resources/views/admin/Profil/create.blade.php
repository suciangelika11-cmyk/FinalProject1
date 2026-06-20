@extends('admin.layouts.main')

@section('content')
    <div class="form-wrap">
        <div class="form-card">
            <h2>{{"\u{2795}"}} Tambah User</h2>

            <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="fg">
                    <label>Nama</label>
                    <input type="text" name="name" maxlength="100">
                </div>

                <div class="fg">
                    <label>Username</label>
                    <input type="text" name="username" maxlength="50">
                </div>

                <div class="fg">
                    <label>Email</label>
                    <input type="email" name="email" maxlength="100">
                </div>

                <div class="fg">
                    <label>Password</label>
                    <input type="password" name="password" maxlength="20">
                </div>

                <div class="fg">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" maxlength="50">
                </div>

                <div class="fg">
                    <label>Foto</label>
                    <input type="file" name="foto">
                </div>

                <div class="btn-row">
                    <a href="{{ route('profil.index') }}" class="btn btn-back">{{ "\u{2190}" }} Kembali</a>
                    <button type="submit" class="btn btn-save">{{ "\u{1F4BE}" }} Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection