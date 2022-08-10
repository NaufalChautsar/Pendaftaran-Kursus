@extends('App')
@section('navbar')
    <nav class="navbar navbar-expand-lg sticky-top bg-dark py-3">
        <div class="container">
            <a class="navbar-brand fs-4 text-white" href="{{ route('Beranda.index') }}">Kursus Programmer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 pt-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white ps-lg-4" aria-current="page" href="{{ route('Beranda.index') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('Kursus.index') }}">Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('Riwayat.index') }}">Riwayat Pendaftaran</a>
                    </li>
                </ul>
                @if (Route::has('login'))
                    @auth
                        <div class="d-flex">
                            <div class="text-white pt-2">Hello, {{ Auth::user()->nama }}</div>
                            <div href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-outline-primary text-white ms-3 px-4">
                                Keluar
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    @else
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="btn border-0 text-white">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary text-white px-lg-3 ms-lg-3">Register</a>
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
@endsection
@section('content')
    <div class="container">
        <div class="title-kursus col-lg-6 col-md-8 mx-auto align-self-center text-center">
            <h1 class="text-white">{{ $kursus->nama_kursus }}</h1>
            <p class="text-white">{{ $kursus->keterangan }}</p>
            <p class="text-white">Kursus akan dimulai pada <span class="text-primary">{{ date('d M Y', strtotime($kursus->mulai_kursus) ) }}</span> sampai dengan <span class="text-primary">{{ date('d M Y', strtotime($kursus->selesai_kursus) ) }}</span></p>
        </div>
        <div class="card">
            @php
                $pendaftaranKursus = \App\Models\PendaftaranKursus::where('user_id', Auth::user()->user_id)->where('kursus_id', $kursus->kursus_id)->first();
                if ($pendaftaranKursus == null) {
                    $pendaftaran = 0;
                } else {
                    $pendaftaran = 1;
                }
            @endphp
            @if ($pendaftaran == 0)
                <div class="card-body p-5">
                    <form action="{{ route('Kursus.store', $kursus->kursus_id) }}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="validationCustom02" class="form-label">Upload KRS <span class="text-secondary">(Krs semester sekarang)</span></label>
                            <input type="file" name="foto_krs" class="form-control" id="validationCustom02" required>
                            @error('foto_krs')
                                <div class="valid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                
                        <div class="col-12">
                            <button class="btn btn-primary px-5 mt-3" type="submit">Daftar</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="card-body p-5 text-center">
                    <h5 class="card-title">Hello, {{ Auth::user()->nama }}</h5>
                    <p class="card-text text-danger"><strong>Anda sudah mendaftar pada kurus ini</strong></p>
                </div>
            @endif
        </div>
    </div>
@endsection