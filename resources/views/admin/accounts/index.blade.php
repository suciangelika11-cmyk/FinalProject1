@extends('admin.layouts.main')

@section('content')

    @include('admin.layouts.LOAAccount.AkunIndex')

    <div class="account-page">
        <div class="account-header">
            <div>
                <h1>Manajemen Akun</h1>
                <p>Kelola akun admin dan pelayan yang memiliki akses ke dashboard.</p>
            </div>

            <a href="{{ route('accounts.create') }}" class="btn-add">
                {{ "\u{002B}" }} Tambah
            </a>
        </div>

        @if(session('success'))
            <div class="alert-success-custom">
                {{ session('success') }}
            </div>
        @endif

        <div class="account-card">
            <div class="account-card-top">
                <h2>Daftar Akun</h2>
                <span>Total: {{ $users->count() }} akun</span>
            </div>

            <div class="table-wrap">
                <table class="account-table">
                    <thead>
                        <tr>
                            <th>Pengguna</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>
                                    <div class="user-name">{{ $user->name }}</div>
                                    <div class="user-username">{{ '@' . $user->username }}</div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge-role {{ $user->role }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge-status {{ $user->is_active ? 'active' : 'inactive' }}">
                                        {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('accounts.edit', $user->id) }}" class="btn-edit">
                                            Edit
                                        </a>

                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('accounts.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn-delete btn-hapus" data-id="{{ $user->id }}"
                                                data-name="{{ $user->name }}" data-role="{{ ucfirst($user->role) }}">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <h3>Belum ada akun</h3>
                                        <p>Tambahkan akun admin atau pelayan baru untuk mulai mengelola akses dashboard.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')

        <script src="{{ asset('js/Admin/AkunIndex.js') }}"></script>

    @endpush
@endsection