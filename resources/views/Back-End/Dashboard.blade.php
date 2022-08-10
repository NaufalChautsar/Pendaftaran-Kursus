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
                <li class="menu-item active">
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
                <li class="menu-item">
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
    <!-- Layout container -->
        <div class="layout-page">
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-lg-12 mt-4 mb-4 order-0">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col-sm-7">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary">Selemat Datang! 🎉</h5>
                                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique voluptatem vero quam velit voluptas accusamus minima</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 text-center text-sm-left">
                                        <div class="card-body pb-0 px-0 px-md-4">
                                            <img src="{{ asset('assets/back-end/img/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- / Layout page -->
@endsection