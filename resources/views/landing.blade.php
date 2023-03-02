<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="assets/css/main/app.css" />
    <link rel="stylesheet" href="assets/css/pages/error.css" />
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png" />
</head>

<body>
    <script src="assets/js/initTheme.js"></script>
    @if (session('status'))
            <div class="alert alert-success d-flex justify-content-end position-fixed">{{ session('status') }}</div>
        @endif
    <div id="error">
        <div class="error-page container">
            <div class="col-sm-8 col-12 offset-sm-2">
                <div class="text-center">
                    <h1 class="error-title">Pengaduan Masyarakat</h1>
                    <p class="fs-6 text-gray-600 mt-5">
                        Sampaikan laporan masyarakat kepada pemerintah atas pelayanan yang tidak sesuai dengan standar
                        pelayanan, atau pengabaian kewajiban dan/atau pelanggaran larangan.
                    </p>
                    <a href="{{ route('login.masyarakat') }}" class="btn btn-lg btn-outline-primary mt-5">Login Sebagai Pelapor</a>
                    <a href="{{ route('login.petugas') }}" class="btn btn-lg btn-outline-success mt-5"> Login Sebagai Petugas</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
