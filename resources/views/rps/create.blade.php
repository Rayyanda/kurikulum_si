@extends('layouts.app')

@section('content')

<h1 class="text-center mb-3">Rencana Pembelajaran Semester</h1>

<div class="container">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('rps.index') }}">RPS</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    <button type="button" data-bs-target="#addModal" data-bs-toggle="modal" class="btn btn-success mb-2 mr-2" ><i class="fa fa-plus"></i> Ganti MK</button>
    <div class="card shadow mb-5">
        <div class="card-header bg-primary">
            <h3 class="text-center text-white mb-0">Tambah Rencana Pembelajaran Semester</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('rps.doc.store') }}">
                @csrf
                @method('POST')
                <div class="row mb-3">
                    <label for="kodeDokumen" class="col-md-2 col-form-label">Kode Dokumen<span class="text-danger">*</span> </label>
                    <div class="col-md-10">
                        <input type="text" name="kode_dokumen" id="kodeDokumen" required class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="selectMk" class="col-md-2 col-form-label">Mata Kuliah</label>
                    <div class="col-md-10">
                        <select class="form-select @error('mk_id') is-invalid @enderror" name="mk_id" id="selectMk" aria-label="Default select example">
                            <option selected value="{{ $mks->id }}" > {{ $mks->kode }} - {{ $mks->nama }} </option>
                        </select>
                        @error('mk_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-form-label col-md-2">CPL</label>
                    <div class="col-md-10 d-flex flex-wrap justify-content-start" style="max-height: 400px;overflow:scroll;" id="chk_cpmk">
                        @php
                            $counter = 0;
                        @endphp
                        @foreach ($mks->cpls as $item)
                            <div class="card m-1 shadow">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="cpl_id[]" value="{{ $item->id }}" id="{{ $item->code }}">
                                        <label class="form-check-label" for="{{ $item->code }}">
                                          {{ $item->code }}
                                        </label>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tahun Ajaran</th>
                                                <th scope="col">Semester</th>
                                                <th scope="col">CPMK</th>
                                                <th scope="col">SUB-CPMK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($item->cpmk as $cpmks)
                                            @if ($cpmks->mk_id == $mks->id)
                                            <tr>
                                                <td>{{ $cpmks->tahun_ajaran }}</td>
                                                <td>Semester {{ $cpmks->semester }}</td>
                                                <td>{{ $cpmks->code }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($cpmks->subcpmks as $sub)
                                                            <li>{{ $sub->code }} : {{ $sub->description }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="row mb-3">
                    <label for="selectMk" class="col-md-2 col-form-label">MK <span class="text-danger">*</span> </label>
                    <div class="col-md-10">
                        <select class="form-select @error('subcpmk_id') is-invalid @enderror" name="subcpmk_id" id="selectMk" aria-label="Default select example">
                            <option> <-- Pilih SUB CPMK --> </option>
                            @foreach ($subcpmk as $item)
                                <option value="{{ $item->id }}">{{ $item->mk->kode }} - {{ $item->mk->nama }}</option>
                            @endforeach
                        </select>
                        @error('subcpmk_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}
                <div class="row mb-3">
                    <label for="tahunAjaran" class="col-md-2 col-form-label">Tahun Ajaran <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        <select class="form-select @error('tahun_ajaran') is-invalid @enderror" required name="tahun_ajaran" id="tahunAjaran" aria-label="Default select example">
                            <option selected value="" > <-- Tahun Ajaran --> </option>
                            @for ($year = 2024; $year <= 2029; $year++)
                                <option value="{{ $year }}/{{ $year + 1 }}">{{ $year }}/{{ $year + 1 }}</option>
                            @endfor
                        </select>
                        @error('tahun_ajaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="semester" class="col-md-2 col-form-label">Semester <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        <select name="semester" id="semester" required class="form-select @error('semester') is-invalid @enderror">
                            <option value="">Pilih Semester</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                        @error('semester')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">Dosen Pengembang RPS <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select class="form-select @error('dosen_pengembang') is-invalid @enderror" required name="dosen_pengembang" id="dosenPengembangRPS">
                                <option selected>Open this select menu</option>
                                @foreach ($dosen as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <label for="dosenPengembangRPS">Dosen Pengembang RPS</label>
                        </div>
                        @error('dosen_pengembang')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label class="col-md-2 col-form-label">Dekan FT <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select class="form-select @error('dekanft') is-invalid @enderror" required name="dekanft" id="dekanFT">
                                <option selected>Open this select menu</option>
                                @foreach ($dosen as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <label for="dekanFT">Dekan FT</label>
                        </div>
                        @error('dekanft')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">Kepala Prodi <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select class="form-select @error('kaprodi') is-invalid @enderror" required name="kaprodi" id="kaprodi">
                                <option selected>Open this select menu</option>
                                @foreach ($dosen as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <label for="kaprodi">Kepala Prodi</label>
                        </div>
                        @error('kaprodi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label class="col-md-2 col-form-label">Deskripsi Singkat MK <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <textarea class="form-control @error('deskripsi_mk') is-invalid @enderror" required name="deskripsi_mk" placeholder="Deskripsi singkat" id="deskripsiSingkat"></textarea>
                            <label for="deskripsiSingkat">Deskripsi</label>
                        </div>
                        @error('deskripsi_mk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pustakaUtamaa" class="col-md-2 col-form-label">Pustaka Utama <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <div class="form-floating">
                            <textarea class="form-control @error('pustaka_utama') is-invalid @enderror" required name="pustaka_utama" placeholder="Pustaka Utama" id="pustakaUtama"></textarea>
                            <label for="pustakaUtama">Pustaka Utama</label>
                        </div>
                        @error('pustaka_utama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pustakaPendukungg" class="col-md-2 col-form-label">Pustaka Pendukung</label>
                    <div class="col-md-10">
                        <div class="form-floating">
                            <textarea class="form-control @error('pustaka_pendukung') is-invalid @enderror" name="pustaka_pendukung" placeholder="Pustaka Pendukung" id="pustakaPendukung"></textarea>
                            <label for="pustakaPendukung">Pustaka Pendukung</label>
                        </div>
                        @error('pustaka_pendukung')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">Dosen Pengampu <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <div class="form-floating">
                            <select class="form-select @error('dosen_pengampu') is-invalid @enderror" required name="dosen_pengampu" id="dosen_pengampu">
                                <option selected>Open this select menu</option>
                                @foreach ($dosen as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <label for="dosenPengampu">Dosen Pengampu</label>
                        </div>
                        <span class="fw-light text-secondary"><i class="fa fa-info-circle"></i> Jika dosen lebih dari satu, pisahkan dengan <code> ; </code></span>
                        @error('dosen_pengampu')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="selectMk" class="col-md-2 col-form-label">Mata Kuliah Prasyarat</label>
                    <div class="col-md-10">
                        <select class="form-select @error('pra_mk_id') is-invalid @enderror"  name="pra_mk_id" id="selectMk" aria-label="Default select example">
                            <option selected value="" > <-- Pilih MK --> </option>
                            @foreach ($mk as $item)
                                <option value="{{ $item->id }}">{{ $item->kode }} - {{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('pra_mk_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tglPenyusunan" class="col-form-label col-md-2">Tanggal Penyusunan</label>
                    <div class="col-md-10">
                        <input type="date" name="tanggal_penyusunan" id="tglPenyusunan" required class="form-control @error('tanggal_penyusunan') is-invalid @enderror">
                        @error('tanggal_penyusunan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route('rps.create') }}" method="POST">
            @csrf
            @method('POST')
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addModalLabel">Pilih Mata Kuliah</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="selectMk" class="col-md-2 col-form-label">Mata Kuliah</label>
                    <div class="col-md-10">
                        <select class="form-select @error('mk_id') is-invalid @enderror" name="mk_id" id="selectMk" aria-label="Default select example">
                            <option selected value="" > <-- Pilih MK --> </option>
                            @foreach ($mk as $item)
                            <option value="{{ $item->id }}">{{ $item->kode }} - {{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('mk_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Lanjutkan</button>
            </div>
        </form>
      </div>
    </div>
</div>
<script>


</script>

@endsection
