@extends('layouts.content')
@section('title', 'Sistem Pengaduan Masyarakat | Buat Pengaduan')
@section('title_content')
    <h3>Buat Laporan</h3>
    <p>Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</p>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tulis Pengaduan Anda</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('upload.pengaduan') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Isi Laporan Anda</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <textarea name="isi_laporan" class="form-control @error('isi_laporan') @enderror" id="" cols="30"
                                    rows="10"></textarea>
                            </div>
                            @error('isi_laporan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="col-md-4">
                                <label>Foto / Berkas Pendukung</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="file" name="foto" accept="image/*" id="contact-info"
                                    class="form-control @error('foto') is-invalid @enderror" fdprocessedid="xizfys">
                            </div>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" fdprocessedid="zekj8j">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
