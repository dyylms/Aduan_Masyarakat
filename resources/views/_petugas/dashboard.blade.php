@extends('layouts.content')
<title>Dashboard Petugas</title>

<body>
    @section('title_content')
        <h3>Selamat datang, {{ \Auth::guard('petugas')->user()->nama_petugas }}</h3>
    @endsection

    @section('content')
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <h5 class="font-extrabold mb-0">Total Pengaduan</h5>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <hr>
                                        <h6 class="font-semibold mb-0">Jumlah Pengaduan : {{ ($pengaduan) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <h5 class="font-extrabold mb-0">Dalam Proses</h5>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <hr>
                                        <h6 class="font-semibold mb-0">Jumlah Pengaduan dalam Proses : {{ $process }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-5 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <h5 class="font-extrabold mb-0">Belum Terverifikasi</h5>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <hr>
                                        <h6 class="font-semibold mb-0">Jumlah Pengaduan Perlu di Tanggapi : {{ $unverified }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-7 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <h5 class="font-extrabold mb-0">Sudah Selesai</h5>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <hr>
                                        <h6 class="font-semibold mb-0">Jumlah Pengaduan yang sudah selesai : {{ $verified }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
