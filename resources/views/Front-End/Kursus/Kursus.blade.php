@extends('App')
@section('navbar')
    <nav class="navbar navbar-expand-lg sticky-top py-3">
        <div class="container">
            <a class="navbar-brand fs-4 text-dark fw-bolder" href="{{ route('Beranda.index') }}">Pendaftaran Kursus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 pt-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-gray ps-lg-4" aria-current="page" href="{{ route('Beranda.index') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('Kursus.index') }}">Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray" href="{{ route('Riwayat.index') }}">Riwayat Pendaftaran</a>
                    </li>
                </ul>
                @if (Route::has('login'))
                    @auth
                        <div class="d-flex">
                            <div class="dropdown">
                                <button type="button" class="btn border-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Hello, {{ Auth::user()->nama }} &nbsp;</button>
                                <ul style="background-color: #f0f2f5" class="dropdown-menu ms-2 mt-1 py-1 px-0">
                                    <!-- Dropdown menu links -->
                                    <button style="background-color: #f0f2f5" type="button" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item text-dark">Keluar</button>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="btn border-1 border-dark px-4 text-whte">Masuk</a>
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="title-kursus col-lg-6 col-md-8 mx-auto align-self-center text-center">
            <h1 class="text-dark fw-bolder">Kursus Programmer</h1>
            <p class="text-gray mt-3">Halo! mahasiswa 👋, selamat datang di website Kursus Programmer. Pada website ini anda dapat memilih dan melihat berbagai kursus programmer.</p>
        </div>
        <div class="kursus row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @forelse ($kursus as $kursus)
                <div class="col">
                    <div class="card shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold">{{ $kursus->nama_kursus }}</h5>
                            <p class="card-text text-secondary pt-2">{{ $kursus->keterangan }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Format Date -->
                                    @php
                                        $now = \Carbon\Carbon::now()->format('Y-m-d');
                                    @endphp
                                <!-- Format Date -->
                                @if ($now >= $kursus->mulai_kursus)
                                    <div class="btn-group mt-4">
                                        <button class="btn btn-outline-danger" disabled>Pendaftaran Ditutup</button>
                                    </div>
                                @else
                                    <div class="btn-group mt-4">
                                        <a href="{{ route('Kursus.show', $kursus->kursus_id) }}" class="btn border-1 border-dark">Lihat Detail Kursus</a>
                                    </div>
                                @endif
                                <!-- Format Date -->
                                    @php
                                        $dateNow = \Carbon\Carbon::now()->format('Y-m-d');
                                        $now = \Carbon\Carbon::now();
                                        $myDate = $now;
                                        $myDate2 = $kursus->mulai_kursus;
                                        
                                        $newDate = \Carbon\Carbon::parse($myDate2);
                                        $result = \Carbon\Carbon::parse($myDate)->diffForHumans($newDate);
                                    @endphp
                                <!-- Format Date -->
                                @if ($dateNow >= $kursus->mulai_kursus)

                                @else
                                    <small class="text-secondary mt-4">{{ $result }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                
            @endforelse
        </div>
    </div>
@endsection