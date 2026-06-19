@extends('admin.layouts.main')

@section('content')

    @include('admin.layouts.LOAPengumuman.PengumumanIndex')

    <div class="page-hero">
        <div class="hero-tag"><i class="ri-notification-2-line"></i> Pengumuman</div>
        <h2>Pengumuman</h2>
        <p> Kelola pengumuman penting untuk jemaat GBI Tambunan.</p>
        <div class="hero-actions">
            <a href="{{ route('pengumuman.create') }}" class="btn-hero-primary">{{ "\u{FF0B}" }} Tambah</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert-success-custom">
            {{ session('success') }}
        </div>
    @endif

    <div class="pengumuman-card">
        <div class="pengumuman-card-top">
            <h2>Daftar Pengumuman</h2>
            <span>Total: {{ $pengumuman->count() }} data</span>
        </div>

        <div class="table-wrap">
            <table class="pengumuman-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal Publish</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengumuman as $item)
                        <tr>
                            <td>
                                <div class="title-wrap">
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="thumb">
                                    @else
                                        <div class="thumb-placeholder">{{"\u{1F4E2}"}}</div>
                                    @endif

                                    <div>
                                        <div class="title-main">{{ $item->title }}</div>
                                        <div class="title-sub">
                                            {{ \Illuminate\Support\Str::limit($item->content, 60) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->publish_date ?: '-' }}</td>
                            <td>
                                <span class="badge-status {{ $item->is_active ? 'active' : 'inactive' }}">
                                    {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('pengumuman.edit', $item->id) }}" class="btn-edit">
                                        Edit
                                    </a>

                                    <form id="delete-form-{{ $item->id }}" action="{{ route('pengumuman.destroy', $item->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button" class="btn-delete btn-hapus" data-id="{{ $item->id }}">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <h3>Belum ada pengumuman</h3>
                                    <p>Tambahkan pengumuman baru agar informasi gereja bisa tampil di halaman user.</p>
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

        <script src="{{ asset('js/Admin/PengumumanIndex.js') }}"></script>

    @endpush
@endsection