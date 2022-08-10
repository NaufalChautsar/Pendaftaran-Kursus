@extends('App')
@section('navbar')
    <nav class="navbar navbar-expand-lg sticky-top bg-dark py-3">
        <div class="container">
            <a class="navbar-brand fs-4 text-white" href="#">Kursus Programmer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 pt-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white ps-lg-4" aria-current="page" href="{{ route('beranda.index') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('kursus.index') }}">Kursus</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn border-0 text-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary text-white px-lg-3 ms-lg-3">Register</a>
                </div>
            </div>
        </div>
    </nav>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="title-kursus col-lg-6 col-md-8 mx-auto align-self-center text-center">
            <h1 class="text-white">Forgot Password</h1>
            <p class="text-secondary">Silahkan masukkan email anda yang sudah terdaftar</p>
        </div>
        <div class="row justify-content-center align-items-center my-5">
            <div class="col-md-8">
                <div class="card bg-dark border border-primary">
                    <div class="card-body py-5 ps-xl-5 px-4 px-md-">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-white text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6 col-xl-5">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 ps-md-0 ps-lg-3 offset-md-3 offset-lg-3 mt-3">
                                    <button type="submit" class="btn btn-outline-primary text-white w-100">
                                        {{ __('Send Password Reset Link') }}
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
