@extends('layouts.app')

@section('content')

    @include('layouts.LOPokokDoa')

    @if ($errors->any())
        <div class="error-alert">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <section class="prayer-section">

        <div class="prayer-wrapper">

            {{-- KIRI --}}
            <div class="prayer-info">

                <div class="prayer-badge">
                    🙏 Pelayanan Doa
                </div>

                <h1>
                    Kami Siap<br>
                    Mendoakan Anda
                </h1>

                <p>
                    Setiap pergumulan tidak perlu dijalani sendirian.
                    Tuliskan pokok doa Anda dan biarkan kami
                    bersama-sama membawa setiap harapan,
                    kebutuhan, dan ucapan syukur ke dalam doa.
                </p>

                <div class="verse-card">
                    <p>
                        "Berdoalah seorang untuk yang lain,
                        supaya kamu sembuh."
                    </p>

                    <strong>Yakobus 5:16</strong>
                </div>

            </div>

            {{-- KANAN --}}
            <div class="prayer-form-card">

                @if(session('success'))
                    <div class="success-alert">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                <div class="form-header">

                    <div class="icon-circle">
                        🙏
                    </div>

                    <h2>Sampaikan Pokok Doa</h2>

                    <p>
                        Semua pokok doa akan diterima
                        dan didoakan oleh tim pelayanan gereja.
                    </p>

                </div>

                <form action="{{ route('pokokdoa.store') }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label>Nama Lengkap</label>

                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Pokok Doa</label>

                        <textarea name="isi_pokok_doa" rows="6" placeholder="Tuliskan pokok doa Anda di sini..."
                            required>{{ old('isi_pokok_doa') }}</textarea>
                    </div>

                    <div class="privacy-note">
                        🔒 Semua pokok doa akan dijaga
                        kerahasiaannya dan hanya dapat
                        dilihat oleh admin gereja.
                    </div>

                    <button type="submit" class="btn-kirim">
                        Sampaikan Pokok Doa
                    </button>

                </form>

            </div>

        </div>

    </section>

@endsection