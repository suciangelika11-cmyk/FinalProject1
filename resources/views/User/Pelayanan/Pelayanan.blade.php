@extends('layouts.app')

@section('content')

<style>
/* ===== Hero Section ===== */
.pelayanan-hero {
    background: linear-gradient(135deg, #0066cc 0%, #0085e6 50%, #00a3ff 100%);
    color: #ffffff;
    padding: 100px 0 80px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.pelayanan-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 500px;
    height: 500px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50%;
}

.pelayanan-hero::after {
    content: '';
    position: absolute;
    bottom: -30%;
    left: -5%;
    width: 400px;
    height: 400px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 50%;
}

.pelayanan-hero .container {
    position: relative;
    z-index: 1;
}

.pelayanan-hero h1 {
    font-size: 48px;
    font-weight: 900;
    letter-spacing: -0.02em;
    margin-bottom: 16px;
    line-height: 1.2;
    text-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.pelayanan-hero p {
    max-width: 700px;
    margin: 0 auto;
    color: rgba(255, 255, 255, 0.95);
    font-size: 16px;
    line-height: 1.8;
    font-weight: 500;
}

/* ===== Section Padding ===== */
.section-pelayanan {
    padding: 80px 0;
}

.section-pelayanan.bg-soft {
    background: linear-gradient(180deg, #f8fbff 0%, #f0f7ff 100%);
}

/* ===== Leadership Panel ===== */
.leadership-panel {
    background: #ffffff;
    border-radius: 28px;
    padding: 48px 42px;
    box-shadow: 0 20px 60px rgba(0, 102, 204, 0.08);
    max-width: 1100px;
    margin: 0 auto;
    border: 1px solid rgba(0, 102, 204, 0.05);
    transition: box-shadow 0.3s ease;
}

.leadership-panel:hover {
    box-shadow: 0 30px 80px rgba(0, 102, 204, 0.12);
}

.leadership-panel h2 {
    font-size: 28px;
    font-weight: 900;
    margin-bottom: 8px;
    background: linear-gradient(135deg, #0066cc, #0085e6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.leadership-panel p {
    color: #5a7a99;
    font-size: 15px;
    margin-bottom: 36px;
    font-weight: 500;
}

.leader-cards {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 28px;
}

.leader-card {
    background: linear-gradient(135deg, #fafbfc 0%, #f5f8fc 100%);
    border-radius: 24px;
    box-shadow: 0 10px 30px rgba(0, 102, 204, 0.06);
    padding: 36px 28px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 102, 204, 0.08);
}

.leader-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0, 102, 204, 0.12);
    border-color: rgba(0, 102, 204, 0.15);
}

.leader-avatar {
    width: 130px;
    height: 130px;
    border-radius: 50%;
    overflow: hidden;
    border: 5px solid #ffffff;
    display: grid;
    place-items: center;
    margin-bottom: 20px;
    background: linear-gradient(135deg, #0066cc, #0085e6);
    box-shadow: 0 12px 30px rgba(0, 102, 204, 0.25);
    position: relative;
}

.leader-avatar::after {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 50%;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
}

.leader-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: relative;
    z-index: 1;
}

.leader-title {
    font-size: 16px;
    font-weight: 800;
    color: #1a2d4d;
    margin-bottom: 6px;
}

.leader-name {
    font-size: 13px;
    color: #7a8fa3;
    font-weight: 600;
}

.team-section {
    padding-top: 60px;
}

.team-header {
    text-align: center;
    margin-bottom: 50px;
}

.team-header h2 {
    font-size: 32px;
    font-weight: 900;
    margin-bottom: 12px;
    background: linear-gradient(135deg, #0066cc, #0085e6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.team-header p {
    color: #5a7a99;
    font-size: 16px;
    max-width: 700px;
    margin: 0 auto;
    font-weight: 500;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 28px;
    margin-bottom: 50px;
}

.team-card {
    background: #ffffff;
    border-radius: 28px;
    padding: 36px 28px;
    box-shadow: 0 12px 40px rgba(0, 102, 204, 0.08);
    transition: all 0.3s ease;
    min-height: 420px;
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(0, 102, 204, 0.05);
    position: relative;
    overflow: hidden;
}

.team-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #0066cc, #0085e6, #00a3ff);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 24px 60px rgba(0, 102, 204, 0.15);
    border-color: rgba(0, 102, 204, 0.1);
}

.team-card:hover::before {
    opacity: 1;
}

.team-icon {
    width: 72px;
    height: 72px;
    border-radius: 18px;
    display: grid;
    place-items: center;
    margin-bottom: 20px;
    font-size: 28px;
    background: linear-gradient(135deg, #0066cc15, #0085e615);
    color: #0066cc;
    transition: all 0.3s ease;
    border: 2px solid rgba(0, 102, 204, 0.1);
}

.team-card:hover .team-icon {
    background: linear-gradient(135deg, #0066cc25, #0085e625);
    border-color: rgba(0, 102, 204, 0.2);
    transform: scale(1.1);
}

.team-title {
    font-size: 18px;
    font-weight: 900;
    margin-bottom: 12px;
    color: #1a2d4d;
    transition: color 0.3s ease;
}

.team-card:hover .team-title {
    color: #0066cc;
}

.team-desc {
    color: #5a7a99;
    font-size: 14px;
    line-height: 1.8;
    margin-bottom: 20px;
    flex-grow: 1;
    font-weight: 500;
}

.team-divider {
    border: none;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(0, 102, 204, 0.2), transparent);
    margin: 16px 0 20px;
}

.member-list {
    list-style: none;
    padding: 0;
    margin: 0;
    max-height: 180px;
    overflow-y: auto;
}

.member-list::-webkit-scrollbar {
    width: 6px;
}

.member-list::-webkit-scrollbar-track {
    background: rgba(0, 102, 204, 0.05);
    border-radius: 10px;
}

.member-list::-webkit-scrollbar-thumb {
    background: rgba(0, 102, 204, 0.2);
    border-radius: 10px;
}

.member-item {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    align-items: center;
    color: #4b5a74;
    font-size: 13px;
    margin-bottom: 10px;
    padding: 6px 0;
    transition: all 0.2s ease;
}

.member-item:hover {
    padding-left: 4px;
}

.member-item span:first-child {
    font-weight: 600;
    color: #2a3d5a;
    flex: 1;
    text-align: left;
}

.member-item span:last-child {
    color: #0066cc;
    font-weight: 700;
    background: rgba(0, 102, 204, 0.08);
    padding: 2px 8px;
    border-radius: 6px;
    white-space: nowrap;
}

/* ===== Join Button ===== */
.join-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: linear-gradient(135deg, #0066cc, #0085e6);
    color: #ffffff;
    padding: 14px 32px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 800;
    font-size: 15px;
    box-shadow: 0 12px 30px rgba(0, 102, 204, 0.3);
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.join-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 18px 45px rgba(0, 102, 204, 0.4);
    background: linear-gradient(135deg, #0052a3, #0070cc);
}

.join-btn:active {
    transform: translateY(0);
}

/* ===== No Data ===== */
.no-data {
    text-align: center;
    color: #7a8fa3;
    font-size: 15px;
    padding: 50px 20px;
    background: linear-gradient(135deg, #fafbfc 0%, #f5f8fc 100%);
    border-radius: 20px;
    border: 1px dashed rgba(0, 102, 204, 0.2);
}

/* ===== Responsive Design ===== */
@media (max-width: 1024px) {
    .team-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    
    .leader-cards {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 768px) {
    .pelayanan-hero {
        padding: 70px 0 60px;
    }
    
    .pelayanan-hero h1 {
        font-size: 36px;
    }
    
    .pelayanan-hero p {
        font-size: 14px;
    }
    
    .section-pelayanan {
        padding: 60px 0;
    }
    
    .leadership-panel {
        padding: 32px 24px;
    }
    
    .leader-cards,
    .team-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .team-header h2 {
        font-size: 24px;
    }
    
    .team-card {
        min-height: auto;
    }
    
    .leader-avatar {
        width: 110px;
        height: 110px;
    }
}
</style>

<section class="pelayanan-hero">
    <div class="container">
        <h1>Pelayanan & Komunitas</h1>
        <p>Bergabunglah dengan berbagai tim pelayanan dan temukan tempat Anda untuk melayani Tuhan.</p>
    </div>
</section>

<section class="section-pelayanan bg-soft">
    <div class="container">
        <div class="leadership-panel">
            <h2>Kepemimpinan</h2>
            <p>Gembala dan Ibu Gembala yang memimpin dengan kasih.</p>
            <div class="leader-cards">
                @forelse($kepemimpinan as $item)
                    <div class="leader-card">
                        <div class="leader-avatar">
                            @if($item->photo)
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->leader ?: $item->title }}">
                            @else
                                <span>{{ strtoupper(substr($item->leader ?: $item->title, 0, 2)) }}</span>
                            @endif
                        </div>
                        <div class="leader-title">{{ $item->leader ?: $item->title }}</div>
                        <div class="leader-name">{{ $item->title }}</div>
                    </div>
                @empty
                    <div class="no-data">Belum ada data kepemimpinan.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<section class="section-pelayanan team-section">
    <div class="container">
        <div class="team-header">
            <h2>Tim Pelayanan</h2>
            <p>Berbagai tim yang melayani dengan dedikasi dan kasih.</p>
        </div>
        <div class="team-grid">
            @forelse($timPelayanan as $tim)
                <div class="team-card">
                    <div class="team-icon">
                        @if($tim->icon && str_contains($tim->icon, 'fa-'))
                            <i class="fa {{ $tim->icon }}"></i>
                        @else
                            {{ $tim->icon ?: '🎵' }}
                        @endif
                    </div>
                    <div class="team-title">{{ $tim->title }}</div>
                    <div class="team-desc">{{ $tim->description ?: 'Melayani dengan penuh dedikasi dan kasih.' }}</div>
                    <div class="team-divider"></div>

                    @if($tim->anggotas->count())
                        <div class="member-list">
                            @foreach($tim->anggotas as $anggota)
                                <div class="member-item">
                                    <span>{{ $anggota->nama }}</span>
                                    <span>{{ $anggota->bagian ?: '-' }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="member-list">
                            <div class="member-item">
                                <span>{{ $tim->leader ?: 'Koordinator belum ditentukan' }}</span>
                                <span>Koordinator</span>
                            </div>
                        </div>
                    @endif
                </div>
            @empty
                <div class="no-data">Belum ada data tim pelayanan.</div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('jemaat.create') }}" class="join-btn">
                <i class="fa fa-user-plus"></i>
                Bergabung dengan Pelayanan
            </a>
        </div>
    </div>
</section>

@endsection