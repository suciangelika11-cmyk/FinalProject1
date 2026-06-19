@extends('admin.layouts.main')

@section('content')

@include('admin.layouts.LOAHome')

@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\Jemaat;

    $authUser = Auth::user();
    $pendingJemaatCount = Jemaat::where('status', 'pending')->count();
  @endphp

  <div class="container-fluid py-4">
    <div class="welcome-hero">
      <div class="hero-tag">✦ Panel Admin</div>

      <h2>
        Selamat Datang,<br>
        <span class="hero-admin-name">{{ $authUser->name }}</span> &#128075;
      </h2>

      <p>Kelola seluruh konten website gereja dari sini. Perubahan yang kamu buat akan langsung terlihat oleh jemaat dan
        pengunjung umum.</p>

      <div class="hero-stats">
        <div class="hero-logo-wrap">
          <div class="hero-logo-circle">
            <img src="{{ $authUser->foto_url }}" alt="{{ $authUser->name }}">
          </div>

          <div class="hero-logo-name">{{ $authUser->role_label }}</div>
        </div>
      </div>
    </div>

    <div class="section-title">Kelola Konten Website</div>

    <div class="grid">
      <a href="{{ route('tentang.index') }}" style="text-decoration:none">
        <div class="card white">
          <div class="card-icon-wrap"><span class="ico"><i class="ri-information-line"></i></span></div>
          <div class="card-title">Tentang Kami</div>
          <div class="card-desc">Edit visi, misi, sejarah, dan profil gereja yang tampil di halaman publik.</div>
          <div class="card-arrow">→</div>
        </div>
      </a>

      <a href="{{ route('jadwal.index') }}" style="text-decoration:none">
        <div class="card white">
          <div class="card-icon-wrap"><span class="ico"><i class="ri-calendar-line"></i></span></div>
          <div class="card-title">Jadwal Ibadah</div>
          <div class="card-desc">Tambah atau ubah jadwal pelayanan, kebaktian, dan acara khusus.</div>
          <div class="card-arrow">→</div>
        </div>
      </a>

      <a href="{{ route('absensi.index') }}" style="text-decoration:none">
        <div class="card white">
          <div class="card-icon-wrap"><span class="ico"><i class="ri-checkbox-circle-line"></i></span></div>
          <div class="card-title">Absensi</div>
          <div class="card-desc">Kelola dan lihat data absensi ibadah untuk seluruh sesi.</div>
          <div class="card-arrow">→</div>
        </div>
      </a>

      <a href="{{ route('galeri.index') }}" style="text-decoration:none">
        <div class="card white">
          <div class="card-icon-wrap"><span class="ico"><i class="ri-image-line"></i></span></div>
          <div class="card-title">Galeri</div>
          <div class="card-desc">Upload foto dan video dokumentasi kegiatan gereja untuk ditampilkan publik.</div>
          <div class="card-arrow">→</div>
        </div>
      </a>

      <a href="{{ route('khotbah.index') }}" style="text-decoration:none">
        <div class="card white">
          <div class="card-icon-wrap"><span class="ico"><i class="ri-book-line"></i></span></div>
          <div class="card-title">Khotbah</div>
          <div class="card-desc">Kelola rekaman dan ringkasan khotbah yang bisa diakses jemaat kapan saja.</div>
          <div class="card-arrow">→</div>
        </div>
      </a>

      <a href="{{ route('pelayanan.index') }}" style="text-decoration:none">
        <div class="card white">
          <div class="card-icon-wrap"><span class="ico"><i class="ri-service-line"></i></span></div>
          <div class="card-title">Pelayanan</div>
          <div class="card-desc">Atur informasi departemen pelayanan, komsel, dan kegiatan komunitas gereja.</div>
          <div class="card-arrow">→</div>
        </div>
      </a>

      <a href="{{ route('kegiatan.index') }}" style="text-decoration:none">
        <div class="card white">
          <div class="card-icon-wrap"><span class="ico"><i class="ri-calendar-event-line"></i></span></div>
          <div class="card-title">Kegiatan Pelayanan</div>
          <div class="card-desc">Atur informasi kegiatan pelayanan, komsel, dan komunitas gereja.</div>
          <div class="card-arrow">→</div>
        </div>
      </a>

      <a href="{{ route('kontak.index') }}" style="text-decoration:none">
        <div class="card white">
          <div class="card-icon-wrap"><span class="ico"><i class="ri-phone-line"></i></span></div>
          <div class="card-title">Kontak</div>
          <div class="card-desc">Perbarui nomor telepon, alamat, email, dan tautan media sosial gereja.</div>
          <div class="card-arrow">→</div>
        </div>
      </a>

      <a href="{{ route('pengumuman.index') }}" style="text-decoration:none">
        <div class="card white">
          <div class="card-icon-wrap"><span class="ico"><i class="ri-notification-3-line"></i></span></div>
          <div class="card-title">Pengumuman</div>
          <div class="card-desc">Kelola pengumuman penting yang akan ditampilkan di halaman publik.</div>
          <div class="card-arrow">→</div>
        </div>
      </a>

      <a href="{{ route('jemaat.index') }}" style="text-decoration:none">
        <div class="card white">
          <div class="card-icon-wrap"><span class="ico"><i class="ri-group-line"></i></span></div>
          <div class="card-title">Jemaat</div>
          <div class="card-desc">Lihat pendaftaran jemaat baru dan konfirmasi data pendaftaran yang masuk.</div>
          <div class="card-arrow">→</div>
        </div>
      </a>

      <a href="{{ route('accounts.index') }}" style="text-decoration:none">
        <div class="card white">
          <div class="card-icon-wrap"><span class="ico"><i class="ri-lock-line"></i></span></div>
          <div class="card-title">Akun</div>
          <div class="card-desc">Kelola akun pelayanan.</div>
          <div class="card-arrow">→</div>
        </div>
      </a>
    </div>
  </div>

@endsection