@extends('layouts.content')
@section('title', ' Report | Sistem Pengaduan Masyarakat')
@section('title_content', ' Data Pengaduan ')
@section('content')
    <div class="container mt-5">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <strong>Cetak Laporan</strong>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('petugas.generate_report') }}" class="btn btn-primary my-2">Cetak</a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelapor</th>
                                        <th>Isi Laporan</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th>Foto</th>
                                        <th>Nama Petugas</th>
                                        <th>Tanggal Tanggapan</th>
                                        <th>isi Tanggapan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tanggapan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pengaduan->masyarakat->nama }}</td>
                                            <td>{{ $item->pengaduan->isi_laporan }}</td>
                                            <td>{{ $item->pengaduan->tgl_pengaduan }}</td>
                                            <td><img src="{{  asset('pengaduan/berkas_pengaduan/' . $item->pengaduan->foto) }}" width="200px"
                                                    alt=""></td>
                                            <td>{{ $item->petugas->nama_petugas }}</td>
                                            <td>{{ $item->tgl_tanggapan }}</td>
                                            <td>{{ $item->tanggapan }}</td>
                                            <td>
                                                @if ($item->pengaduan->status === '0')
                                                    <div class="badge badge-danger">Belum Terverifikasi</div>
                                            </td>
                                        @elseif($item->pengaduan->status == 'proses')
                                            <div class="badge badge-warning text-white">Sedang Di Proses</div>
                                            </td>
                                        @else
                                            <div class="badge badge-success">Selesai</div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
