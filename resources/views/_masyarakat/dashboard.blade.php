@extends('layouts.content')
<title>Dashboard Masyarkat</title>

<body>
    @section('title_content')
        <h3>Selamat datang, {{ \Auth::guard('masyarakat')->user()->nama }}</h3>
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
                                        <h5 class="font-extrabold mb-0">Pengaduan</h5>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <hr>
                                        <h6 class="font-semibold mb-0">Jumlah Pengaduan : {{ number_format($pengaduan) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
