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
                        <a class="nav-link text-gray" href="{{ route('Kursus.index') }}">Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('Riwayat.index') }}">Riwayat Pendaftaran</a>
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
    <div class="container">
        <div class="title-kursus col-lg-6 col-md-8 mx-auto align-self-center text-center">
            <h1 class="text-dark fw-bolder">Riwayat Pendaftaran</h1>
            <p class="text-gray mt-3">Berikut merupakan riwayat pendaftaran {{ Auth::user()->nama }}</p>
        </div>
        <div style="background-color: #f0f2f5" class="card border-0">
            <div class="card-body text-center p-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" class="text-start ps-4">Nama Kursus</th>
                            <th scope="col">Mulai Kurus</th>
                            <th scope="col">Selesai Kursus</th>
                            <th scope="col">Download Kartu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendaftaranKursus as $pendaftaran)
                            <tr>
                                <td>{{ $loop->iteration }}</ed>
                                <td class="text-start ps-4">{{ $pendaftaran->kursus->nama_kursus }}</td>
                                <td>{{ date('d M Y', strtotime($pendaftaran->kursus->mulai_kursus)) }}</td>
                                <td>{{ date('d M Y', strtotime($pendaftaran->kursus->selesai_kursus)) }}</td>
                                @if ($pendaftaran->status == 'Menunggu Konfirmasi')
                                    <td>{{ $pendaftaran->status }}</td>
                                @else
                                    <td><a href="">Kartu</a></td>
                                @endif
                            </tr>
                        @empty
                            <div class="card-body p-5 text-center">
                                <h5 class="card-title">Hello, {{ Auth::user()->nama }}</h5>
                                <p class="card-text text-danger"><strong>Anda belum melakukan pendaftaran</strong></p>
                            </div>
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection