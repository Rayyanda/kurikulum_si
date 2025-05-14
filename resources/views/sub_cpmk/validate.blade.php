@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Validate Sub-CPMK</h1>
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('sub_cpmk.index') }}">Sub CPMK List</a></li>
          <li class="breadcrumb-item active" aria-current="page">Validate</li>
        </ol>
    </nav>
    <form action="{{ route('sub_cpmk.process_validation', $subcpmk->id) }}" method="POST">
        @csrf
        <input type="hidden" name="cpmk_id" value="{{ $subcpmk->cpmk_id }}">
        <div class="form-group">
            <label for="validation_status">Validation Status</label>
            <select name="validation_status" id="validation_status" class="form-control">
                <option value="revisi" {{ $subcpmk->validation_status == 'revisi' ? 'selected' : '' }}>Revisi</option>
                <option value="ubah" {{ $subcpmk->validation_status == 'ubah' ? 'selected' : '' }}>Ubah</option>
            </select>
        </div>
        <div class="form-group">
            <label for="validation_note">Validation Note</label>
            <textarea name="validation_note" id="validation_note" class="form-control">{{ $subcpmk->validation_note }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Validation</button>
    </form>
</div>
@endsection
