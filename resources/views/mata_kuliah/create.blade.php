@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Mata Kuliah</h1>
    <form action="{{ route('mata-kuliah.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_mk">Kode MK:</label>
            <input type="text" class="form-control" id="kode_mk" name="kode_mk" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="sks">SKS:</label>
            <input type="number" class="form-control" id="sks" name="sks" required>
        </div>
        <div class="form-group">
            <label for="semester">Semester:</label>
            <input type="number" class="form-control" id="semester" name="semester" required>
        </div>
        <div class="form-group">
            <label for="dosen">Dosen:</label>
            <input type="text" class="form-control" id="dosen" name="dosen" >
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
