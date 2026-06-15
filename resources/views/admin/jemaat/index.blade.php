@extends('admin.layouts.main')

@section('content')

    @include('admin.layouts.LOAJemaat.JemaatIndex')

    <div class="jemaat-page">

        <div class="jemaat-header">
            <div class="jemaat-label">Jemaat</div>

            <h1 class="jemaat-title">
                Daftar Pendaftaran Jemaat
            </h1>

            <p class="jemaat-desc">
                Kelola semua pendaftaran jemaat baru dan tandai sebagai telah dikonfirmasi setelah ditindaklanjuti.
            </p>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="jemaat-card">
            <div class="table-scroll">
                <table class="jemaat-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No KK</th>
                            <th>Nama Keluarga</th>
                            <th>Alamat Domisili</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($jemaats as $jemaat)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $jemaat->no_kk }}</td>

                                <td>{{ $jemaat->nama_keluarga }}</td>
                                
                                <td class="text-long">
                                    {{ $jemaat->alamat_domisili }}
                                </td>

                                <td>
                                    @if($jemaat->status === 'pending')
                                        <span class="badge-pending">
                                            Menunggu
                                        </span>
                                    @else
                                        <span class="badge-ok">
                                            Dikonfirmasi
                                        </span>
                                    @endif
                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <button type="button" class="btn-detail" onclick="openModal({{ $jemaat->id }})">
                                            Detail
                                        </button>

                                        @if($jemaat->status == 'pending')
                                            <form action="{{ route('jemaat.confirm', $jemaat->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <button type="submit" class="btn-confirm">
                                                    Konfirmasi
                                                </button>
                                            </form>
                                        @endif

                                        <form action="{{ route('jemaat.destroy', $jemaat->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Yakin ingin menghapus data jemaat ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-delete">
                                                <i class="bi bi-trash3"></i>
                                                Hapus
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>

                            <!-- MODAL DETAIL -->
                            <div class="detail-modal" id="modal-{{ $jemaat->id }}">

                                <div class="detail-content">

                                    <div class="detail-header">
                                        <h3>Detail Jemaat</h3>

                                        <button onclick="closeModal({{ $jemaat->id }})">
                                            {{ "\u{00D7}" }}
                                        </button>
                                    </div>

                                    <div class="detail-grid">

                                        <div>
                                            <label>Nama Lengkap</label>
                                            <p>{{ $jemaat->nama_lengkap }}</p>
                                        </div>

                                        <div>
                                            <label>NIK</label>
                                            <p>{{ $jemaat->nik }}</p>
                                        </div>

                                        <div>
                                            <label>Alamat KTP</label>
                                            <p>{{ $jemaat->alamat_ktp }}</p>
                                        </div>

                                        <div>
                                            <label>Tempat Lahir</label>
                                            <p>{{ $jemaat->tempat_lahir }}</p>
                                        </div>

                                        <div>
                                            <label>Tanggal Lahir</label>
                                            <p>{{ $jemaat->tanggal_lahir }}</p>
                                        </div>

                                        <div>
                                            <label>Jenis Kelamin</label>
                                            <p>{{ $jemaat->jenis_kelamin }}</p>
                                        </div>

                                        <div>
                                            <label>Handphone</label>
                                            <p>{{ $jemaat->handphone }}</p>
                                        </div>

                                        <div>
                                            <label>Email</label>
                                            <p>{{ $jemaat->email }}</p>
                                        </div>

                                        <div>
                                            <label>Pekerjaan</label>
                                            <p>{{ $jemaat->pekerjaan }}</p>
                                        </div>

                                        <div>
                                            <label>Status Pernikahan</label>
                                            <p>{{ $jemaat->status_pernikahan }}</p>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <tr>
                                <td colspan="6" class="empty">
                                    Belum ada pendaftaran jemaat.
                                </td>
                            </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Admin/JemaatIndex.js') }}"></script>

@endsection