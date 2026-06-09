@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAKontak.KontakEdit')

  <div class="form-wrap">
    <div class="form-card">
      <h2>✏️ Edit Informasi Kontak</h2>

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
          <input type="text" name="address" value="{{ old('address', $kontak->address) }}" required maxlength="150">
        </div>

        <div class="fg">
          <label>Telepon</label>
          <input type="text" name="phone" value="{{ old('phone', $kontak->phone) }}" required maxlength="15">
        </div>

        <div class="fg">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email', $kontak->email) }}" required maxlength="100">
        </div>

        <div class="fg">
          <label>Jam Sekretariat</label>
          <textarea name="office_hours" rows="3" maxlength="250">{{ old('office_hours', $kontak->office_hours) }}</textarea>
        </div>

        <div class="btn-row">
          <a href="{{ route('kontak.index') }}" class="btn-back">← Batal</a>
          <button type="submit" class="btn-submit">✅ Update Kontak</button>
        </div>
      </form>
    </div>
  </div>

@endsection