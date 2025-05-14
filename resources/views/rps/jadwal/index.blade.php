@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2 class="text-center">Atur Jadwal RPS {{ $rps->mk->nama }}</h2>
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('rps.index') }}">RPS</a></li>
              <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
            </ol>
        </nav>

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal !!</strong>{{ session('error') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil !!</strong>{{ session('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card mb-3 shadow">
            <div class="card-header">
                <h5 class="mb-0">Data RPS</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Kode Dokumen</th>
                                <td>:</td>
                                <td>{{ $rps->kode_dokumen }}</td>
                                <th>Nama MK</th>
                                <th>:</th>
                                <td>{{ $rps->mk->nama }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <td>:</td>
                                <td>{{ $rps->tahun_ajaran }}</td>
                                <th>Semester</th>
                                <td>:</td>
                                <td>{{ $rps->semester }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <a href="#" data-bs-target="#newDataModal" data-bs-toggle="modal" class="btn btn-success mb-3"><i class="fa fa-plus" aria-hidden="true" ></i> Tambah Jadwal</a>

        <a href="{{ route('rps.jadwal.index', $rps->id) }}" class="btn btn-warning mb-3">Refresh</a>


        <div class="card mb-5 shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center align-items-center">
                                <th class="week-col">Minggu Ke-</th>
                                <th class="ability-col">Kemampuan aktivit tiap tahapan belajar (Sub-CPMK)</th>
                                <th class="indicator-col">Indikator</th>
                                <th class="criteria-col">Kriteria & Bentuk Penilaian</th>
                                <th colspan="2">Bentuk Pembelajaran; Metode Pembelajaran; Penugasan Mahasiswa; [Estimasi Waktu]</th>
                                <th class="material-col">Materi Pembelajaran [Pustaka]</th>
                                <th class="weight-col">Bobot Penilaian (%)</th>
                                <th>Aksi</th>
                            </tr>
                            <tr class="text-center" >
                                <th>(1)</th>
                                <th>(2)</th>
                                <th>(3)</th>
                                <th>(4)</th>
                                <th>(5)</th>
                                <th>(6)</th>
                                <th>(7)</th>
                                <th>(8)</th>
                                <th>(9)</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($jadwal as $item)
                               <tr>
                                <td>{{ $item->minggu_ke }}</td>
                                <td>{{ $item->sub_cpmk->description }}</td>
                                <td>{{ $item->indikator }}</td>
                                <td>

                                    @foreach ($item->kriteria as $rubrik)
                                        <ul>
                                            <li>{{ $rubrik->jenis_rubrik }}</li>
                                        </ul>
                                    @endforeach
                                </td>
                                <td>{{ $item->bentuk_pembelajaran }}</td>
                                <td>{{ $item->metode_pembelajaran }}</td>
                                <td>{{ $item->materi_pembelajaran }}</td>
                                <td>{{ $item->bobot_penilaian }}</td>
                                <td>
                                    <a href="{{ route('rps.jadwal.edit',[$item->rps_id,$item->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                    <form action="{{ route('rps.jadwal.delete',[$item->rps_id,$item->id]) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                               </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="newDataModal" tabindex="-1" aria-labelledby="newDataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <form action="{{ route('rps.jadwal.store') }}" method="post">
                @csrf
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="newDataModalLabel">Jadwal Baru</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="number" name="rps_id" value="{{ $rps->id }}" id="rps_id" hidden>
                    <div class="row mb-2 align-items-center">
                        <label for="mingguKe" class="col-form-label col-md-2">Minggu Ke-</label>
                        <div class="col-md-2">
                            <div class="form-floating">
                                <select name="minggu_ke" id="mingguKe" class="form-select">
                                    @for ($a =1;$a <= 16;$a++)
                                    @if ($a !== 8 || $a != 16)
                                    <option value="{{ $a }}">{{ $a }}</option>
                                    @endif
                                    @endfor
                                </select>
                                <label for="mingguKe">Minggu Ke-</label>
                            </div>
                        </div>
                        <label for="subCpmk" class="col-form-label col-md-2">Sub-CPMK</label>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="sub_cpmk_id" id="subCpmkId" class="form-select">
                                    @foreach ($rps->rpscpl as $item)
                                    @foreach ($item->cpl->cpmk as $cpmk)
                                    @foreach ($cpmk->subcpmks as $subcpmk)
                                    @if ($subcpmk->mk_id === $rps->mk_id)
                                    <option value="{{ $subcpmk->id }}">{{ $subcpmk->description }}</option>
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
                                <option value="Rubrik Analitik">Rubrik Analitik</option>
                                <option value="Rubrik Holistik">Rubrik Holistik</option>
                                <option value="Rubrik Skala Persepsi">Rubrik Skala Persepsi</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <label for="indikator" class="col-md-2 col-form-label">Indikator</label>
                        <div class="col-md-10">
                            <div class="form-floating">
                                <textarea name="indikator" id="indikator" placeholder="Indikator" class="form-control"></textarea>
                                <label for="indikator">Indikator</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <label for="bentukPembelajaran" class="col-form-label col-md-2">Bentuk Pembelajaran</label>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="bentuk_pembelajaran" id="bentukPembelajaran" placeholder="Bentuk Pembelajaran" required class="form-control">
                                <label for="bentukPembelajaran">Bentuk Pembelajaran</label>
                            </div>
                        </div>
                        <label for="metodePembelajaran" class="col-form-label col-md-2">Metode Pembelajaran</label>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="metode_pembelajaran" id="metodePembelajaran" placeholder="Metode Pembelajaran" class="form-control">
                                <label for="metodePembelajaran">Metode Pembelajaran</label>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-3 align-items-center">
                        <label for="materiPembelajaran" class="col-md-2 col-form-label">Materi Pembelajaran</label>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <textarea name="materi_pembelajaran" id="materiPembelajaran" placeholder="Materi Pembelajaran" class="form-control"></textarea>
                                <label for="materiPembelajaran">Materi Pembelajaran</label>
                            </div>
                        </div>
                        <label for="bobotPenilaian" class="col-form-label col-md-2">Bobot Penilaian</label>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="number" name="bobot_penilaian" id="bobotPenliaian" placeholder="5" class="form-control">
                                <label for="bobotPenliaian">Bobot Penilaian</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
          </div>
        </div>
    </div>

@endsection
