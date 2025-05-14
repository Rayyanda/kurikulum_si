@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Data Dosen</h1>
    <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">Tambah Data <i class="fa fa-plus" aria-hidden="true"></i></a>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ session('success') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="table-responsive p-2">
                <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Jabatan Fungsional</th>
                            <th scope="col">Sertifikasi Dosen</th>
                            <th scope="col">Bidang Pengajaran</th>
                            <th scope="col">QR Sign</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($dosen as $item)
                            <tr class="align-items-center" >
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jabatan_fungsional }}</td>
                                <td>{{ $item->sertifikasi_dosen == 1 ? 'Memiliki' : 'Belum'}}</td>
                                <td>{{ $item->bidang_pengajaran }}</td>
                                <td>
                                    <img src="{{ asset('storage/penyimpanan/dosen/sign/'.$item->qr_sign) }}" width="100" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('dosen.edit',$item->id) }}" class="btn btn-success btn-sm m-1"><i class="fa fa-pencil-alt" aria-hidden="true" ></i></a>
                                    <form action="{{ route('dosen.delete',$item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm('Yakin akan mengahpus')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
