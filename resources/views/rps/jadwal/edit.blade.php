@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">Edit Jadwal RPS <span class="text-success">{{ $jadwal->rps->mk->nama }}</span> Minggu Ke-<span class="text-danger">{{ $jadwal->minggu_ke }}</span></h2>
    <nav aria-label="breadcrumb" class="mb-3">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('rps.jadwal.index',$jadwal->rps_id) }}">Jadwal RPS</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h2>Edit Jadwal</h2>
            <form action="{{ route('rps.jadwal.update',$jadwal->id) }}" method="post">
                @csrf
                <input type="number" name="rps_id" value="{{ $jadwal->rps->id }}" id="rps_id" hidden>
                <input type="number" name="minggu_ke" value="{{ $jadwal->minggu_ke }}" id="minggu_ke" hidden>
                <div class="row mb-2 align-items-center">
                    <label for="editMingguKe" class="col-form-label col-md-2">Minggu Ke-</label>
                    <div class="col-md-2">
                        <div class="form-floating">
                            <input type="number" name="minggu_ke" disabled value="{{ $jadwal->minggu_ke }}" id="editMingguKe" class="form-control">
                            <label for="editMingguKe">Minggu Ke-</label>
                        </div>
                    </div>
                    <label for="subCpmk" class="col-form-label col-md-2">Sub-CPMK</label>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="sub_cpmk_id" id="subCpmkId" class="form-select">
                                @foreach ($jadwal->rps->rpscpl as $item)
                                @foreach ($item->cpl->cpmk as $cpmk)
                                @foreach ($cpmk->subcpmks as $subcpmk)
                                @if ($subcpmk->mk_id === $jadwal->rps->mk_id)
                                <option value="{{ $subcpmk->id }}" {{ $subcpmk->id == $jadwal->sub_cpmk_id ? 'selected' : '' }}>{{ $subcpmk->description }}</option>
                                @endif
                                @endforeach
                                @endforeach
                                @endforeach
                            </select>
                            <label for="subCpmkId">Sub-CPMK</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2 align-items-center">
                    <label for="kriteria" class="col-form-label col-md-2">Kriteria Penilaian</label>
                    <div class="col-md-10">
                        <select name="kriteria" id="kriteria" class="form-control">
                            <option value="Rubrik Analitik" {{ $jadwal->rubrikrps->jenis_rubrik == 'Rubrik Analitik' ? 'selected' : '' }} >Rubrik Analitik</option>
                            <option value="Rubrik Holistik" {{ $jadwal->rubrikrps->jenis_rubrik == 'Rubrik Holistik' ? 'selected' : '' }} >Rubrik Holistik</option>
                            <option value="Rubrik Skala Persepsi" {{ $jadwal->rubrikrps->jenis_rubrik == 'Rubrik Skala Persepsi' ? 'selected' : '' }} >Rubrik Skala Persepsi</option>
                            {{-- @foreach ($rubriks as $item)
                                <option value="{{ $item->id }}" {{ $jadwal->rubrikrps->rubrik->id == $item->id ? 'selected' : ''}}>{{ $item->deskripsi_tambahan }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label for="indikator" class="col-md-2 col-form-label">Indikator</label>
                    <div class="col-md-10">
                        <div class="form-floating">
                            <textarea name="indikator" id="indikator" placeholder="Indikator" class="form-control">{{ $jadwal->indikator }}</textarea>
                            <label for="indikator">Indikator</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label for="bentukPembelajaran" class="col-form-label col-md-2">Bentuk Pembelajaran</label>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="bentuk_pembelajaran" id="bentukPembelajaran" value="{{ $jadwal->bentuk_pembelajaran }}" placeholder="Bentuk Pembelajaran" required class="form-control">
                            <label for="bentukPembelajaran">Bentuk Pembelajaran</label>
                        </div>
                    </div>
                    <label for="metodePembelajaran" class="col-form-label col-md-2">Metode Pembelajaran</label>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="metode_pembelajaran" id="metodePembelajaran" value="{{ $jadwal->metode_pembelajaran }}" placeholder="Metode Pembelajaran" class="form-control">
                            <label for="metodePembelajaran">Metode Pembelajaran</label>
                        </div>
                    </div>

                </div>

                <div class="row mb-3 align-items-center">
                    <label for="materiPembelajaran" class="col-md-2 col-form-label">Materi Pembelajaran</label>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <textarea name="materi_pembelajaran" id="materiPembelajaran" placeholder="Materi Pembelajaran" class="form-control">{{ $jadwal->materi_pembelajaran }}</textarea>
                            <label for="materiPembelajaran">Materi Pembelajaran</label>
                        </div>
                    </div>
                    <label for="bobotPenilaian" class="col-form-label col-md-2">Bobot Penilaian</label>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="number" value="{{ $jadwal->bobot_penilaian }}" name="bobot_penilaian" id="bobotPenliaian" placeholder="5" class="form-control">
                            <label for="bobotPenliaian">Bobot Penilaian</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
