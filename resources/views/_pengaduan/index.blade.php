@extends('layouts.content')
@section('title', 'Sistem Pengaduan Masyarakat | Buat Pengaduan')
@section('title_content')
    <h3>Data Pengaduan Masyarakat</h3>
@endsection
@section('content')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="card">
        <div class="card-header">Data Pengaduan Masyarakat</div>
        <div class="card-body">
            <table class="table table-striped" id="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelapor</th>
                        <th>Tanggal Pengaduan</th>
                        <th class="col-8">Isi Laporan</th>
                        <th>Status</th>
                        <th class="col-12">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->masyarakat->nama }}</td>
                            <td>{{ $item->tgl_pengaduan }}</td>
                            <td>{{ $item->isi_laporan }}</td>
                            <td>
                                @if ($item->status === '0')
                                    <div class="badge bg-danger">Belum Terverifikasi</div>
                                @elseif($item->status == 'proses')
                                    <div class="badge bg-warning text-white">Sedang Di Proses</div>
                                @else
                                    <div class="badge bg-success">Selesai</div>
                                @endif
                            </td>
                            <td>
                                @if (Auth::guard('petugas')->check())
                                    @if ($item->status === '0' || $item->status == 'proses')
                                        <a href="{{ route('pengaduan.show', Crypt::Encrypt($item->id_pengaduan)) }}"
                                            class="btn btn-sm btn-success mx-2 my-2 col-12">Tanggapi</a>
                                    @endif
                                @endif
                                <a href="{{ route('pengaduan.detail', Crypt::Encrypt($item->id_pengaduan)) }}"
                                    class="btn btn-sm btn-primary mx-2 my-2 col-12">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
        });
    </script>
@endsection
