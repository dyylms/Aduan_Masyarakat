@extends('layouts.content')
@section('title', 'Add Petugas')

@section('title_content', 'Tambahkan Petugas')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('petugas.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nama Petugas</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror"
                                    name="nama_petugas" maxlength="35" placeholder="Masukan Nama Petugas"
                                    value="{{ old('nama_petugas') }}">
                                @error('nama_petugas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Username</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" placeholder="Masukan Username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>No Telepon</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="number" class="form-control @error('telp') is-invalid @enderror"
                                    name="telp" maxlength="13" placeholder="Masukan No Telp anda" value="{{ old('telp') }}">
                                @error('telp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Password</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Masukan Password Anda">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Konfirmasi Password</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Masukan Password Sekali Lagi">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Pilih Role</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select name="level" class="form-control @error('level') is-invalid @enderror"
                                    id="">
                                    <option value="">--Pilih Role--</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                                @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
