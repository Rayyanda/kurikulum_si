@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit CPMK</h1>
    <form method="POST" action="{{ route('cpmk.update', $cpmk->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="code" class="form-label">CPMK Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $cpmk->code }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">CPMK Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $cpmk->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="cpl_id" class="form-label">CPL</label>
            <select class="form-control" id="cpl_id" name="cpl_id" required>
                @foreach ($cpl as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $cpmk->cpl_id ? 'selected' : '' }}>
                        {{ $item->code }} - {{ $item->deskripsi }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="mk_id" class="form-label">MK</label>
            <select class="form-control" id="mk_id" name="mk_id" required>
                @foreach ($mk as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $cpmk->mk_id ? 'selected' : '' }}>
                        {{ $item->kode }} - {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
            <select class="form-control" id="tahun_ajaran" name="tahun_ajaran" required>
                @foreach ($tahunAjaranOptions as $option)
                    <option value="{{ $option }}" {{ $option == $cpmk->tahun_ajaran ? 'selected' : '' }}>
                        {{ $option }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <select class="form-control" id="semester" name="semester" required>
                @foreach ($semesterOptions as $option)
                    <option value="{{ $option }}" {{ $option == $cpmk->semester ? 'selected' : '' }}>
                        {{ ucfirst($option) }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
