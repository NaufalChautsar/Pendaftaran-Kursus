@extends('AppAdmin')
@section('sidebar')
    <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">Kursus</span>
                </a>
                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>
            <div class="menu-inner-shadow"></div>
            <ul class="menu-inner py-1">
                <li class="menu-item">
                    <a href="{{ route('dashboard.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Master</span>
                </li>
                <li class="menu-item">
                    <a href="{{ route('mahasiswa.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-table"></i>
                        <div data-i18n="Analytics">Mahasiswa</div>
                    </a>
                </li>
                <li class="menu-item active">
                    <a href="{{ route('kursus.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-table"></i>
                        <div data-i18n="Analytics">Kursus</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('pendaftaranKursus.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Analytics">Pendaftaran Kursus</div>
                    </a>
                </li>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Setting</span>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.logout') }}" class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"">
                        <i class='menu-icon tf-icons bx bx-log-out' ></i>
                        <div data-i18n="Analytics">Logout</div>
        
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </aside>
    <!-- / Menu -->
@endsection
@section('content')
    <!-- Basic Layout -->
        <div class="layout-page">
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4">Ubah Kursus</h4>
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Form Ubah Kursus</h5>
                                    <a href="{{ route('kursus.index') }}" class="btn btn-secondary">
                                        <i class="menu-icon tf-icons bx bx-arrow-back"></i>Kembali
                                    </a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('kursus.update', $kursus->kursus_id) }}" method="POST" enctype="multipart/form-data">
                                        @method('put')  
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-fullname">Nama Kursus</label>
                                            <input type="text" name="nama_kursus" class="form-control" id="basic-default-fullname" value="{{ old('nama_kursus', $kursus->nama_kursus) }}" autofocus/>
                                            @error('nama_kursus')
                                                <div id="defaultFormControlHelp" class="form-text text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-company">Mulai Kursus</label>
                                                    <input type="date" name="mulai_kursus" class="form-control" id="basic-default-company" value="{{ old('mulai_kursus', $kursus->mulai_kursus) }}"/>
                                                    @error('mulai_kursus')
                                                        <div id="defaultFormControlHelp" class="form-text text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-company">Selesai Kursus</label>
                                                    <input type="date" name="selesai_kursus" class="form-control" id="basic-default-company" value="{{ old('selesai_kursus', $kursus->selesai_kursus) }}"/>
                                                    @error('selesai_kursus')
                                                        <div id="defaultFormControlHelp" class="form-text text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                        <label class="form-label" for="basic-default-message">Keterangan</label>
                                        <textarea id="basic-default-message" name="keterangan" class="form-control">{{ old('keterangan', $kursus->keterangan) }}</textarea>
                                        @error('keterangan')
                                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>

                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Basic Layout -->
@endsection