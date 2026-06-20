@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAKontak.KontakEdit')

  <div class="form-wrap">
    <div class="form-card">
      <h2>{{ "\u{270F}\u{FE0F}" }} Edit Informasi Kontak</h2>

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

      <form action="{{ route('kontak.update', $kontak->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="fg">
          <label>Alamat</label>
          <input type="text" name="alamat" value="{{ old('alamat', $kontak->alamat) }}" required maxlength="150">
        </div>

        <div class="fg">
          <label>Telepon</label>
          <input type="text" name="no_hp" value="{{ old('no_hp', $kontak->no_hp ?? '') }}" pattern="[0-9]+" inputmode="numeric" required maxlength="15">
        </div>

        <div class="fg">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email', $kontak->email) }}" required maxlength="100">
        </div>

        <div class="fg">
          <label>Jam Sekretariat</label>
          <textarea name="jam_kerja" rows="3" required maxlength="250">{{ old('jam_kerja', $kontak->jam_kerja) }}</textarea>
        </div>

        <div class="btn-row">
          <a href="{{ route('kontak.index') }}" class="btn-back">{{ "\u{2190}" }} Batal</a>
          <button type="submit" class="btn-submit">{{ "\u{2705}" }} Update</button>
        </div>
      </form>
    </div>
  </div>

@endsection