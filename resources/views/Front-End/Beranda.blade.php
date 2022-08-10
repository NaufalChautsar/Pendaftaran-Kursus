@extends('App')
@section('navbar')
    <nav class="navbar navbar-expand-lg sticky-top py-3">
        <div class="container">
            <a class="navbar-brand fs-4 text-dark fw-bolder" href="{{ route('Beranda.index') }}">Pendaftaran Kursus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 pt-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-dark ps-lg-4" aria-current="page" href="{{ route('Beranda.index') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray" href="{{ route('Kursus.index') }}">Kursus</a>
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
        @if (session('info'))
            <div class="alert alert-success alert-dismissible fade show w-50 mx-auto my-5" role="alert">
                <strong>{{ session('info') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="landing-page row align-items-center py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto align-self-center text-center">
                <h1 class="text-dark fw-bolder">Pendaftaran Kursus</h1>
                <p class="text-gray px-5 my-3">Halo! mahasiswa 👋, selamat datang di website Kursus Programmer. Pada website ini anda dapat memilih dan melihat berbagai kursus programmer.</p>
                <p>
                    <a href="{{ route('Kursus.index') }}" class="btn border-1 border-dark text-dark px-5 my-4">Lihat Kurus</a>
                </p>
            </div>
        </div>
    </div>
@endsection