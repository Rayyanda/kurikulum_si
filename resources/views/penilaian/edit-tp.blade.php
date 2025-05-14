@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Teknik Penilaian CPMK</h1>
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('penilaian.index') }}">Penilaian</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ session('success') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> {{ session('error') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> {{ $error }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
    @endif
    <div class="card mb-3 shadow">
        <div class="card-body">
            <form action="{{ route('penilaian.update',$tp->id) }}" method="post">
                @csrf
                <div class="row mb-3 align-items-center">
                    <label for="cpmkId" class="col-form-label col-md-2">Pilih CPMK</label>
                    <div class="col-md-10">
                        <div class="form-floating">
                            <select name="cpmk_id" id="cpmkId" class="form-select">
                                <option selected value="{{ $tp->cpmk->id }}">{{ $tp->cpmk->code }} - {{ $tp->cpmk->mk->nama }}</option>
                            </select>
                            <label for="cpmkId">Pilih CPMK</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label for="tahapPenilaian" class="col-form-label col-md-2">Tahap Penilaian</label>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select name="tahap_penilaian" id="tahapPenilaian" class="form-select">
                                <option value="Awal - Akhir Semester" {{ $tp->tahap_penilaian == 'Awal - Akhir Semester' ? 'selected' : '' }} >Awal-Akhir Semester</option>
                                <option value="Awal - Tengah Semester" {{ $tp->tahap_penilaian == 'Awal - Tengah Semester' ? 'selected' : '' }} >Awal-Tengah Semester</option>
                                <option value="Tengah - Akhir Semester" {{ $tp->tahap_penilaian == 'Tengah - Akhir Semester' ? 'selected' : '' }} >Tengah-Akhir Semester</option>
                            </select>
                            <label for="tahapPenilaian">Tahap Penilaian</label>
                        </div>
                    </div>
                    <label for="instrumenPenilaian" class="col-form-label col-md-2">Instrumen Penilaian</label>
                    <div class="col-md-4 d-flex flex-row justify-content-between">
                        @php
                            $selected = $tp->instrumen;
                        @endphp
                        <div class="form-check">
                            <input class="form-check-input" {{ in_array('Rubrik Skala Persepsi', $selected) ? 'checked' : '' }} name="instrumen[]" type="checkbox" value="Rubrik Skala Persepsi" id="rubrikSkalaPersepsi">
                            <label class="form-check-label" for="rubrikSkalaPersepsi">
                              Rubrik Skala Persepsi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" {{ in_array('Rubrik Analitik', $selected) ? 'checked' : '' }} name="instrumen[]" type="checkbox" value="Rubrik Analitik" id="rubrikAnalitik">
                            <label class="form-check-label" for="rubrikAnalitik">
                              Rubrik Analitik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" {{ in_array('Rubrik Holistik', $selected) ? 'checked' : '' }} name="instrumen[]" type="checkbox" value="Rubrik Holistik" id="rubrikHolistik">
                            <label class="form-check-label" for="rubrikHolistik">
                              Rubrik Holistik
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label for="kriteriaPenilaian" class="col-md-2 col-form-label">Kriteria</label>
                    <div class="col-md-10">
                        <div class="form-floating">
                            <textarea name="kriteria" id="kriteriaPenilaian" placeholder="Kriteria" class="form-control">{{ $tp->kriteria }}</textarea>
                            <label for="kriteriaPenilaian">Kriteria</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label for="bobotPenilaian" class="col-form-label col-md-2">Bobot</label>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" name="bobot" value="{{ $tp->bobot }}" placeholder="8" required id="bobotPenilaian" class="form-control">
                            <label for="bobotPenilaian">Bobot</label>
                        </div>
                        @if ($score != $tp->bobot)
                        <small class="text-danger"><i class="fa fa-exclamation"></i> Bobot belum sesuai dengan skor pada matriks CPMK. Silahkan diubah ke {{ $score }}</small>
                        @else
                        <small class="text-success"><i class="fa fa-info-circle"></i> Bobot sesuai dengan skor pada matriks CPMK</small>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 text-start">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
