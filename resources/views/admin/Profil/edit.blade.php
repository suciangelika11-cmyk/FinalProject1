@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAProfil.ProfilEdit')

  <div class="form-wrap">
    <div class="form-card">
      <h2>{{ "\u{270F}" }} Edit Profil</h2>

      <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="fg">
          <label>Nama</label>
          <input type="text" name="name" value="{{ old('name', $user->name) }}" maxlength="100">
          @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="fg">
          <label>Username</label>
          <input type="text" name="username" value="{{ old('username', $user->username) }}" maxlength="50">
          @error('username') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="fg">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email', $user->email) }}" maxlength="100">
          @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="fg">
          <label>Telepon</label>
          <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" maxlength="20">
          @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="fg">
          <label>Alamat</label>
          <textarea name="alamat" maxlength="200">{{ old('alamat', $user->alamat) }}</textarea>
          @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="fg">
          <label>Jabatan</label>
          <input type="text" name="jabatan" value="{{ old('jabatan', $user->jabatan) }}" maxlength="50">
          @error('jabatan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="fg">
          <label>Foto Profil</label>
          <input type="file" name="foto" accept="image/*">
          @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
          <img src="{{ $user->foto_url }}" class="img-preview" alt="Foto Profil">
        </div>

        <div class="btn-row">
          <a href="{{ route('profil.index') }}" class="btn btn-back">{{ "\u{2190}" }} Kembali</a>
          <button type="submit" class="btn btn-save">{{ "\u{2705}" }} Simpan</button>
        </div>
      </form>
    </div>
  </div>
@endsection