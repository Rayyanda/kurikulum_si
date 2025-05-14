<!-- resources/views/transaksi/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Transaksi OMK</h1>
    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="text" name="semester" class="form-control" value="{{ $transaksi->semester }}">
        </div>
        <div class="form-group">
            <label for="sks">SKS</label>
            <input type="text" name="sks" class="form-control" value="{{ $transaksi->sks }}">
        </div>
        <div class="form-group">
            <label for="jumlah_mk">Jumlah MK</label>
            <input type="text" name="jumlah_mk" class="form-control" value="{{ $transaksi->jumlah_mk }}">
        </div>
        <div class="form-group">
            <label for="mk_wajib">MK Wajib</label>
            <input type="text" name="mk_wajib" class="form-control" value="{{ $transaksi->mk_wajib }}">
        </div>
        <div class="form-group">
            <label for="mk_pilihan">MK Pilihan</label>
            <input type="text" name="mk_pilihan" class="form-control" value="{{ $transaksi->mk_pilihan }}">
        </div>
        <div class="form-group">
            <label for="mk_wajib_umum">MK Wajib Umum</label>
            <input type="text" name="mk_wajib_umum" class="form-control" value="{{ $transaksi->mk_wajib_umum }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
