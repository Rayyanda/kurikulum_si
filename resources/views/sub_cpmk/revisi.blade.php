@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Revisi Sub-CPMK</h1>
    <form action="{{ route('sub_cpmk.process_revisi', $subcpmk->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Gunakan metode PUT di sini -->
        <div class="form-group">
            <label for="mk_name">MK: {{ $subcpmk->cpmk->mk->nama }}</label>
        </div>
        <div class="form-group">
            <label for="cpmk_code">CPMK Kode: {{ $subcpmk->cpmk->code }}</label>
        </div>
        <div class="form-group">
            <label for="cpmk_description">CPMK Deskripsi: {{ $subcpmk->cpmk->description }}</label>
        </div>
        <div class="form-group">
            <label for="code">SUBCPMK Kode</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ $subcpmk->code }}" disabled>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi SubCPMK</label>
            <textarea name="description" id="description" class="form-control" required>{{ $subcpmk->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Revisi</button>
    </form>
</div>
@endsection
