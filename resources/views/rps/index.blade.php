@extends('layouts.app')

@section('content')

<h1 class="text-center">Rencana Pembelajaran Semester</h1>

<div class="container-fluid">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> {{ session('error') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @can('rps.create')
        <button type="button" data-bs-target="#addModal" data-bs-toggle="modal" class="btn btn-success mb-2 mr-2" ><i class="fa fa-plus"></i>Tambah RPS</button>
        <button type="button" data-bs-target="#uploadPDFModal" data-bs-toggle="modal" class="btn btn-secondary mb-2 mr-2" ><i class="fa fa-plus"></i>PDF</button>
    @endcan

    <div class="card shadow">
        <div class="card-header bg-primary">
            <p class="text-white fw-bold mb-0">Filter dan Renacan Pembelajaran Semester</p>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('sub_cpmk.index') }}" class="mb-4">
                <div class="form-row">
                    <div class="col">
                        <select name="tahun_ajaran" class="form-control">
                            <option value="">Pilih Tahun Ajaran</option>
                            @for ($year = 2024; $year <= 2029; $year++)
                                <option value="{{ $year }}/{{ $year + 1 }}">{{ $year }}/{{ $year + 1 }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <select name="semester" class="form-control">
                            <option value="">Pilih Semester</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-filter"></i> Filter</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive p-2">
                <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Kode Dokumen</th>
                            <th scope="col">Mata Kuliah</th>
                            <th scope="col">Tanggal Penyusunan</th>
                            <th scope="col">Tahun Ajaran</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($rps as $item)
                            <tr>
                                <td>{{ $item->kode_dokumen }}</td>
                                <td>{{ $item->mk->nama }}</td>
                                <td>{{ $item->tanggal_penyusunan }}</td>
                                <td>{{ $item->tahun_ajaran }}</td>
                                <td>{{ $item->semester }}</td>
                                <td>
                                    @can('rps.edit')
                                    <a href="{{ route('rps.edit',$item->id) }}" class="btn btn-warning btn-sm m-1">Edit</a>
                                    @endcan
                                    <a target="_blank" href="{{ route('rps.gen.pdf',$item->id) }}" class="btn btn-secondary btn-sm m-1">PDF</a>
                                    @can('rps.destroy')
                                    <form action="{{ route('rps.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    @endcan
                                    <a href="{{ route('rps.jadwal.index',$item->id) }}" class="btn btn-sm btn-success">Atur Jadwal</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $rps->links() }}
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route('rps.create') }}" method="POST">
            @csrf
            @method('POST')
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addModalLabel">Pilih Mata Kuliah</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="selectMk" class="col-md-2 col-form-label">Mata Kuliah</label>
                    <div class="col-md-10">
                        <select class="form-select @error('mk_id') is-invalid @enderror" name="mk_id" id="selectMk" aria-label="Default select example">
                            <option selected value="" > <-- Pilih MK --> </option>
                            @foreach ($mk as $item)
                            <option value="{{ $item->id }}">{{ $item->kode }} - {{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('mk_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Lanjutkan</button>
            </div>
        </form>
      </div>
    </div>
</div>
<div class="modal fade" id="uploadPDFModal" tabindex="-1" aria-labelledby="uploadPDFModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route('rps.from-pdf') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('POST')
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="uploadPDFModalLabel">FROM PDF</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="selectMk" class="col-md-2 col-form-label">File PDF</label>
                    <div class="col-md-10">
                        <input type="file" name="pdf_rps" id="rpspdf" class="form-control">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Lanjutkan</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection
