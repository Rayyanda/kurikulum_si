@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <span class="h6 mb-0 text-gray-800">Berikut adalah total dari data yang telah diisi dari perkiraan target
                total dari setiap data</span>
        </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Total SKS MK -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total MK</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSKSMK }}</div>
                            <div class="progress mt-3">
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width: {{ ($totalSKSMK / 144) * 100 }}%" aria-valuenow="{{ $totalSKSMK }}"
                                    aria-valuemin="0" aria-valuemax="144"></div>
                            </div>sudah terisi dengan total MK
                            <small class="mt-2">{{ $totalSKSMK }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Data BK -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total BK</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBK }}</div>
                            <div class="progress mt-3">
                                <div class="progress-bar bg-warning" role="progressbar"
                                    style="width: {{ ($totalBK / 6) * 100 }}%" aria-valuenow="{{ $totalBK }}"
                                    aria-valuemin="0" aria-valuemax="4"></div>
                            </div>
                            <small class="mt-2">{{ $totalBK }} dari 6 BK</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Data CPL -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total CPL</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCPL }}</div>
                            <div class="progress mt-3">
                                <div class="progress-bar bg-info" role="progressbar"
                                    style="width: {{ ($totalCPL / 13) * 100 }}%" aria-valuenow="{{ $totalCPL }}"
                                    aria-valuemin="0" aria-valuemax="33"></div>
                            </div>
                            <small class="mt-2">{{ $totalCPL }} dari 13 CPL</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Data PL -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total PL</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPL }}</div>
                            <div class="progress mt-3">
                                <div class="progress-bar bg-danger" role="progressbar"
                                    style="width: {{ ($totalPL / 5) * 100 }}%" aria-valuenow="{{ $totalPL }}"
                                    aria-valuemin="0" aria-valuemax="5"></div>
                            </div>
                            <small class="mt-2">{{ $totalPL }} dari 5 PL</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row align-items-center">
        <!-- Deskripsi OBE -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pendekatan Pembelajaran Berbasis Kompetensi (OBE)</h5>
                    <p class="card-text">
                        Sistem pendidikan tradisional memusatkan perhatian pada apa yang diajarkan, sementara OBE
                        menekankan pada apa yang dipelajari, dan perbedaan ini sangat penting. Yang terakhir adalah
                        model yang berorientasi pada siswa yang mencakup skenario dunia nyata ke dalam campuran.
                        Pengetahuan, keterampilan, dan atribut yang dimiliki siswa pada akhir program atau kursus lebih
                        berharga daripada apa yang atau bagaimana sesuatu diajarkan.
                    </p>
                    <p class="card-text">
                        <strong>OBE Versus Pendidikan Tradisional:</strong><br>
                        Fokus dalam beberapa tahun terakhir pada hasil pembelajaran mewakili pergeseran dari pendekatan
                        'berpusat pada guru' tradisional, di mana praktik umumnya adalah merancang kursus mulai dari
                        konten atau apa yang guru akan sampaikan dalam waktu tertentu, menjadi pendekatan 'berpusat pada
                        siswa'.
                    </p>
                </div>
            </div>
        </div> <!-- Gambar OBE -->
        <div class="col-md-6 mb-4">
            <img src="{{ asset('img/obe.png') }}" class="img-fluid"
                alt="Pendekatan Pembelajaran Berbasis Kompetensi (OBE)">
        </div>
    </div>
    </div>
@endsection