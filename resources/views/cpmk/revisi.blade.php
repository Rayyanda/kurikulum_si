@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Revisi CPMK</h1>
    <form action="{{ route('cpmk.process_revisi', $cpmk->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="mk_name">MK: {{ $cpmk->mk->nama }}</label>
        </div>
        <div class="form-group">
            <label for="cpl_code">CPL Kode: {{ $cpmk->cpl->code }}</label>
        </div>
        <div class="form-group">
            <label for="cpmk_code">CPMK Kode: {{ $cpmk->code }}</label>
        </div>
        <div class="form-group">
            <label for="cpmk_description">CPMK Deskripsi: {{ $cpmk->description }}</label>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi CPMK Baru</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
        </div>
        
        
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
