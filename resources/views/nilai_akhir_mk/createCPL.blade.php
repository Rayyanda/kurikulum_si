@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Nilai Akhir CPL</h2>
    <form method="POST" action="{{ route('nilai_akhir_mk.storeCPL') }}">
        @csrf
        <div class="form-group">
            <label for="cpl">CPL</label>
            <input type="text" class="form-control" id="cpl" name="cpl" required>
        </div>
        <div class="form-group">
            <label for="mk">MK</label>
            <input type="text" class="form-control" id="mk" name="mk" required>
        </div>
        <div class="form-group">
            <label for="cpmk">CPMK</label>
            <input type="text" class="form-control" id="cpmk" name="cpmk" required>
        </div>
        <div class="form-group">
            <label for="skor">Skor</label>
            <input type="number" class="form-control" id="skor" name="skor" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <a href="{{ route('nilai_akhir_mk.indexCPL') }}" class="btn btn-secondary">Kembali ke daftar</a>
</div>
@endsection
