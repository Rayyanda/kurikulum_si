<!-- resources/views/cpmk/validate.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Validasi CPMK</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Validation Form -->
    <form action="{{ route('cpmk.validate.save', $cpmk->id) }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="validation_status">Status Validasi</label>
            <select name="validation_status" id="validation_status" class="form-control" required>
                <option value="revisi" {{ $cpmk->validation_status == 'revisi' ? 'selected' : '' }}>Revisi</option>
                <option value="ubah" {{ $cpmk->validation_status == 'ubah' ? 'selected' : '' }}>Ubah</option>
                
            </select>
        </div>

        <div class="form-group">
            <label for="validation_note">Catatan Validasi</label>
            <textarea name="validation_note" id="validation_note" class="form-control" rows="4">{{ old('validation_note', $cpmk->validation_note) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('cpmk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
