@extends('layouts.content')
@section('title', ' Daftar Petugas | Sistem Pengaduan Masyarakat')
@section('title_content', ' Daftar Data Petugas')
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
                        <th>Nama Petugas</th>
                        <th>No Hp</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_petugas }}</td>
                            <td>{{ $item->telp }}</td>
                            <td>
                                <form action="{{ route('petugas.delete', $item->id_petugas) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
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
