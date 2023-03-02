<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan </title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}">
    @include('layouts.top')
</head>
<style>
    @media print {
        .btn {
          display: none;
        }
    }

</style>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Laporan Data Pengaduan</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelapor</th>
                                <th>Tanggal Pengaduan</th>
                                {{-- <th>Foto</th> --}}
                                <th>Nama Petugas</th>
                                <th>Tanggal Tanggapan</th>
                                <th class="col-3">Isi Laporan</th>
                                <th>isi Tanggapan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tanggapan as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->pengaduan->masyarakat->nama}}</td>
                                <td>{{$item->pengaduan->tgl_pengaduan}}</td>
                                {{-- <td><img src="{{asset('pengaduan/berkas_pengaduan/' . $item->pengaduan->foto)}}" width="100px" alt=""></td> --}}
                                <td>{{$item->petugas->nama_petugas}}</td>
                                <td>{{$item->tgl_tanggapan}}</td>
                                <td style="width: 100px">{{ $item->pengaduan->isi_laporan }}</td>
                                <td>{{$item->tanggapan}}</td>
                                <td>
                                    @if ($item->pengaduan->status === '0')
                                    <div class="badge badge-danger">Belum Terverifikasi</div>
                                </td>
                                @elseif($item->pengaduan->status == 'proses')
                                <div class="badge badge-warning">Sedang Di Proses</div>
                                </td>
                                @else
                                <div class="badge badge-success text-black">Selesai</div>
                                @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="6">Data Pengaduan Tidak tersedia</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{route('petugas.report')}}" class="btn btn-danger">kembali</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print()
    </script>
</body>

</html>
