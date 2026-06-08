@extends('admin.layouts.main')

@push('styles')

@include('admin.layouts.LOAProfil.ProfilIndex')

@endpush

@section('content')
  <div class="page-head">
    <h1>Profil Saya</h1>
    <div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Home</a> / <span>Profil</span></div>
  </div>

  <div class="content">
    @if(session('success'))
      <div class="alert-success-custom">
        {{ session('success') }}
      </div>
    @endif

    <div class="profile-wrap">

      <div class="avatar-card">
        <div class="ava-circle">
          <img src="{{ $user->foto_url }}" alt="{{ $user->name }}">
        </div>

        <div class="ava-hint">Foto profil dikelola dari halaman edit profil</div>

        <div class="profile-name-display">
          {{ $user->name ?? '-' }}
        </div>

        <div class="profile-role-display">
          <span>●</span>
          <span>{{ $user->role_label }}</span>
        </div>

        <div class="profile-joined">
          Bergabung sejak {{ $user->created_at ? $user->created_at->format('F Y') : '-' }}
        </div>
      </div>

      <div class="data-card">
        <div class="card-header">
          <div class="card-header-left">
            <div class="ch-ico">👤</div>
            Data Pribadi
          </div>
          <a href="{{ route('profil.edit') }}" class="edit-toggle">✏ Edit</a>
        </div>

        <div class="field-row">
          <div class="field-label">Nama Lengkap</div>
          <div class="field-value {{ empty($user->name) ? 'empty' : '' }}">
            {{ $user->name ?: 'Belum diisi' }}
          </div>
        </div>

        <div class="field-row">
          <div class="field-label">Username</div>
          <div class="field-value {{ empty($user->username) ? 'empty' : '' }}">
            {{ $user->username ?: 'Belum diisi' }}
          </div>
        </div>

        <div class="field-row">
          <div class="field-label">Jabatan</div>
          <div class="field-value {{ empty($user->jabatan) ? 'empty' : '' }}">
            {{ $user->jabatan ?: 'Belum diisi' }}
          </div>
        </div>

        <div class="field-row">
          <div class="field-label">Email</div>
          <div class="field-value {{ empty($user->email) ? 'empty' : '' }}">
            {{ $user->email ?: 'Belum diisi' }}
          </div>
        </div>

        <div class="field-row">
          <div class="field-label">Telepon</div>
          <div class="field-value {{ empty($user->phone) ? 'empty' : '' }}">
            {{ $user->phone ?: 'Belum diisi' }}
          </div>
        </div>

        <div class="field-row">
          <div class="field-label">Alamat</div>
          <div class="field-value {{ empty($user->alamat) ? 'empty' : '' }}">
            {{ $user->alamat ?: 'Belum diisi' }}
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection