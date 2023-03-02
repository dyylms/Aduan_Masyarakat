@extends('layouts.top')
@include('layouts.top')
<!DOCTYPE html>
<html lang="en">

<head>
    @section('css')
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Register - Pengaduan Masyarakat</title>
        <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}" />
        <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon" />
        <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png" />
    @endsection
</head>

<body>
    <script src="{{ asset('assets/js/initTheme.js') }}"></script>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo" /></a>
                    </div>
                    <h1 class="card-title mb-3">Sign Up</h1>
                    <p>
                        Daftar Sekarang untuk membuat pengaduan.
                    </p>
                    <form action="{{ route('register.post.masyarakat') }}" method="post">
                        @csrf
                        <div class="form-group position-relative">
                            <input type="number"
                                class="form-control form-control-mb @error('nik') is-invalid @enderror" size="16"
                                name="nik" placeholder="NIK" maxlength="16" value="{{ old('nik') }}" />
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group position-relative">
                            <input type="text"
                                class="form-control form-control-mb @error('nama') is-invalid @enderror" name="nama"
                                placeholder="Nama Lengkap" max="35" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group position-relative">
                            <input type="text"
                                class="form-control form-control-mb @error('username') is-invalid @enderror"
                                name="username" placeholder="Username" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group position-relative">
                            <input type="password"
                                class="form-control form-control-mb @error('password') is-invalid @enderror"
                                name="password" placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group position-relative">
                            <input type="password"
                                class="form-control form-control-mb @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" placeholder="Password Confirmation">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group position-relative">
                            <input type="number"
                                class="form-control form-control-mb @error('telp') is-invalid @enderror" name="telp"
                                placeholder="No. Telp" value="{{ old('telp') }}">
                            @error('telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-block btn-md shadow-lg mt-2">
                            Register
                        </button>
                </div>
                <div class="text-center text-md fs-6">
                    <p class="text-gray-600">
                        Already have an account?
                        <a href="{{ route('login.masyarakat') }}" class="font-bold">Log in</a>.
                    </p>
                </div>
                </form>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
</body>

</html>
