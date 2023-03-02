@extends('layouts.top')
@include('layouts.top')
<!DOCTYPE html>
<html lang="en">

<head>
    @section('css')
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login - Dashboard</title>
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
        <div class="row">
            <div class="col-sm-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <img src="{{ asset('assets/images/logo/apple.png') }}" alt="Logo" />
                    </div>
                    <h1 class="card-title mb-3">Log in.</h1>
                    <p>
                        Login untuk membuat pengaduan masyarakat.
                    </p>
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif
                        @if (session('danger'))
                            <div class="alert alert-danger">{{ session('danger') }}</div>
                        @endif
                    </div>
                    <form action="{{ route('login.post.masyarakat') }}" method="post">
                        @csrf
                        <div class="form-group position-relative">
                            <input type="text" name="username"
                                class="form-control form-control-mb @error('username') is-invalid @enderror"
                                placeholder="Username" />
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group position-relative">
                            <input type="password" name="password"
                                class="form-control form-control-mb @error('password') @enderror"
                                placeholder="Password" />
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-block btn-md shadow-lg mt-5">
                            Log in
                        </button>
                    </form>
                    <div class="text-center mt-5 text-md fs-6">
                        <p class="text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register.masyarakat') }}" class="font-bold">Sign up</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-7 d-none d-lg-block">
                <div id="auth-right">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('assets/images/logo/apple.png') }}" style="position:relative; top:60px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
