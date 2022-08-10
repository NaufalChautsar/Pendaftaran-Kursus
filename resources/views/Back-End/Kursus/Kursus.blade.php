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
    <!-- Basic Bootstrap Table -->
        <div class="layout-page">
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- Notification -->
                        @if (session('info'))
                            <div class="alert alert-success alert-dismissible text-dark" role="alert">
                                {{ session('info') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    <!-- Notification -->
                    <h4 class="fw-bold py-3 mb-4">Data Kursus</h4>
                    <div class="card">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-header">Table Kursus</h5>
                            <a href="{{ route('kursus.create') }}" class="btn btn-success me-4 my-3">
                                <i class="menu-icon tf-icons bx bx-plus"></i>Tambah
                            </a>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kursus</th>
                                        <th>Keterangan</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($kursus as $kursus)
                                        <tr>
                                            <td>
                                                <i class="fab fa-angular fa-lg text-danger me-2"></i> 
                                                <strong>{{ $loop->iteration }}</strong>
                                            </td>
                                            <td>
                                                <i class="fab fa-angular fa-lg text-danger"></i> 
                                                <strong>{{ $kursus->nama_kursus }}</strong>
                                            </td>
                                            <td>
                                                <i class="fab fa-angular fa-lg text-danger"></i> 
                                                <strong>{{ $kursus->keterangan }}</strong>
                                            </td>
                                            <td>
                                                <i class="fab fa-angular fa-lg text-danger"></i> 
                                                <strong>{{ date('d M Y', strtotime($kursus->mulai_kursus)) }}</strong>
                                            </td>
                                            <td>
                                                <i class="fab fa-angular fa-lg text-danger"></i> 
                                                <strong>{{ date('d M Y', strtotime($kursus->selesai_kursus)) }}</strong>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow me-3" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('kursus.edit', $kursus->kursus_id ) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--/ Basic Bootstrap Table -->
@endsection