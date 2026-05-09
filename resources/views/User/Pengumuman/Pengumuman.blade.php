@extends('layouts.app')

@section('content')
<section class="py-5" style="background: radial-gradient(circle at top, rgba(59, 130, 246, 0.16), transparent 32%), linear-gradient(180deg, #071224 0%, #0c1934 100%);">
    <div class="container">
        <div class="text-center text-white mb-5">
            <p class="text-uppercase mb-2 fw-semibold" style="letter-spacing: .2em; color: rgba(255,255,255,.65); font-size: .85rem;">Warta Jemaat</p>
            <h1 class="display-5 fw-bold">Pengumuman Gereja</h1>
            <p class="text-white-50 fs-5">Informasi terbaru dan pengumuman resmi dari gereja.</p>
        </div>

        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
            <div>
                <span class="text-uppercase fw-semibold" style="letter-spacing: .18em; color: rgba(255,255,255,.72); font-size: .9rem;">Semua Pengumuman</span>
            </div>
            <div>
                <span class="badge rounded-pill px-3 py-2" style="background: rgba(255,255,255,.08); color: #f8fafc; border: 1px solid rgba(255,255,255,.14); font-size: .9rem;">
                    {{ $pengumuman->count() }} Pengumuman
                </span>
            </div>
        </div>

        <div class="row g-4">
            @forelse($pengumuman as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 overflow-hidden" style="background: rgba(7, 19, 42, 0.92); border: 1px solid rgba(255,255,255,0.08); box-shadow: 0 24px 45px rgba(0,0,0,0.25); transition: transform .3s ease, box-shadow .3s ease;">
                        <div class="position-relative" style="min-height: 220px; overflow: hidden;">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="w-100 h-100 object-fit-cover" alt="{{ $item->title }}" style="transition: transform .4s ease;">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(255,255,255,.04);">
                                    <i class="bi bi-image fs-1 text-white-50"></i>
                                </div>
                            @endif

                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge text-uppercase fw-semibold" style="background: rgba(255,255,255,.08); color: #fff; border: 1px solid rgba(255,255,255,.12); font-size: .8rem; letter-spacing: .06em;">{{ $item->publish_date ? \Carbon\Carbon::parse($item->publish_date)->format('d M Y') : '-' }}</span>
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <div class="mb-3">
                                <span class="badge rounded-pill px-3 py-2" style="background: rgba(99, 102, 241, 0.16); color: #eef2ff; border: 1px solid rgba(99, 102, 241, 0.25); font-size: .82rem; letter-spacing: .04em;">Pengumuman</span>
                            </div>

                            <h5 class="fw-bold text-white mb-3" style="min-height: 4.5rem;">{{ $item->title }}</h5>

                            <p class="text-white-50 flex-grow-1 mb-4" style="line-height: 1.6;">{{ \Illuminate\Support\Str::limit($item->content, 120) }}</p>

                            <a href="{{ route('user.pengumuman.show', $item->id) }}" class="btn btn-outline-light btn-sm align-self-start px-4 py-2" style="border-color: rgba(255,255,255,.22); color: #f8fafc;">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-white-50">Belum ada pengumuman.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection