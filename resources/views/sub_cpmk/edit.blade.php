@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit SubCPMK</h1>
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('sub_cpmk.index') }}">Sub CPMK List</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="card mb-3 shadow">
        <div class="card-body">
            <form action="{{ route('sub_cpmk.update', $subcpmk->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="mk_id">MK:</label>
                        <input type="text" class="form-control" value="{{ $subcpmk->mk->nama }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="tahun_ajaran">Tahun Ajaran:</label>
                        <!-- Dropdown untuk memilih tahun ajaran -->
                        <select name="tahun_ajaran" class="form-control" required>
                            <option value="{{ $subcpmk->tahun_ajaran }}" selected>{{ $subcpmk->tahun_ajaran }}</option>
                            @foreach ($tahunAjaranOptions as $tahunAjaran)
                                <option value="{{ $tahunAjaran }}">{{ $tahunAjaran }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cpmk_id">CPMK:</label>
                        <input type="text" class="form-control" value="{{ $subcpmk->cpmk->code }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="semester">Semester:</label>
                        <!-- Dropdown untuk memilih semester -->
                        <select name="semester" class="form-control" required>
                            <option value="{{ $subcpmk->semester }}" selected>{{ ucfirst($subcpmk->semester) }}</option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="code">Kode CPMK:</label>
                    <input type="text" name="code" class="form-control" value="{{ $subcpmk->code }}" readonly>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" rows="5" required>{{ $subcpmk->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
