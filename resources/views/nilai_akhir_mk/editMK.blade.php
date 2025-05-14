@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Nilai Akhir MK</h2>
    <form method="POST" action="{{ route('nilai_akhir_mk.updateMK', $nilaiAkhirMk->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="mk">MK</label>
            <input type="text" class="form-control" id="mk" name="mk" value="{{ $nilaiAkhirMk->mk }}" required>
        </div>
        <div class="form-group">
            <label for="cpl">CPL</label>
            <input type="text" class="form-control" id="cpl" name="cpl" value="{{ $nilaiAkhirMk->cpl }}" required>
        </div>
        <div class="form-group">
            <label for="cpmk">CPMK</label>
            <input type="text" class="form-control" id="cpmk" name="cpmk" value="{{ $nilaiAkhirMk->cpmk }}" required>
        </div>
        <div class="form-group">
            <label for="skor">Skor</label>
            <input type="number" class="form-control" id="skor" name="skor" value="{{ $nilaiAkhirMk->skor }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <a href="{{ route('nilai_akhir_mk.indexMK') }}" class="btn btn-secondary">Kembali ke daftar</a>
</div>
@endsection
