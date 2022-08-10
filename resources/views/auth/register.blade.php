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
                        <a class="nav-link text-white" href="{{ route('Kursus.index') }}">Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('Riwayat.index') }}">Riwayat Pendaftaran</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn border-0 text-white">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary text-primary px-lg-3 ms-lg-3">Register</a>
                </div>
            </div>
        </div>
    </nav>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="title-kursus col-lg-6 col-md-8 mx-auto align-self-center text-center">
            <h1 class="text-white">Register</h1>
            <p class="text-secondary">Silahkan mengisi data dibawah ini dengan benar</p>
        </div>
        <div class="row justify-content-center align-items-center my-5">
            <div class="col-md-8">
                <div class="card bg-dark border border-primary">
                    <div class="card-body py-5 ps-xl-5 px-4 px-md-0">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="nama" class="col-md-4 col-form-label text-white text-md-end">{{ __('Nama') }}</label>
                                <div class="col-md-6 col-xl-5">
                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autofocus>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="npm" class="col-md-4 col-form-label text-white text-md-end">{{ __('NPM') }}</label>
                                <div class="col-md-6 col-xl-5">
                                    <input id="npm" type="number" class="form-control no-arrow @error('email') is-invalid @enderror" name="npm" value="{{ old('npm') }}" required>
                                    @error('npm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="kelas" class="col-md-4 col-form-label text-white text-md-end">{{ __('Kelas') }}</label>
                                <div class="col-md-6 col-xl-5">
                                    <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}" required autofocus>
                                    @error('kelas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-white text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-6 col-xl-5">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-white text-md-end">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6 col-xl-5">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 ps-md-0 ps-lg-3 offset-md-3 offset-lg-3 offset-xl-3 mt-4">
                                    <button type="submit" class="btn btn-outline-primary text-white w-100">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
