<!-- resources/views/transaksi/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Transaksi OMK</h1>
    <a href="{{ route('transaksi.edit', 1) }}" class="btn btn-primary mb-3">Edit Transaksi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Semester</th>
                <th>SKS</th>
                <th>Jumlah MK</th>
                <th>MK Wajib</th>
                <th>MK Pilihan</th>
                <th>MKWU</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
                <tr>
                    <td>{{ $item->semester }}</td>
                    <td>{{ $item->sks }}</td>
                    <td>{{ $item->jumlah_mk }}</td>
                    <td>{{ $item->mk_wajib }}</td>
                    <td>{{ $item->mk_pilihan }}</td>
                    <td>{{ $item->mk_wajib_umum }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
