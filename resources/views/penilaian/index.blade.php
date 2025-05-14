@extends('layouts.app')

@section('content')
<style>
    #dataTable thead th{
        background-color: orange;
        text-align: center;
    }
</style>
<div class="container">
    <h1>Penilaian CPMK</h1>
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Penilaian</li>
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

    <div class="mb-3">
        <button type="button" data-bs-target="#createModal" data-bs-toggle="modal" class="btn btn-success mr-2" ><i class="fa fa-plus"></i> Tambah Teknik Penilaian</button>
        <a href="{{ route('penilaian.matriks') }}" class="btn btn-primary mr-2">Matriks</a>
        <a href="{{ route('penilaian.nilai_akhir') }}" class="btn btn-warning">Nilai AKhir</a>
    </div>

    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Export
                </button>
                <ul class="dropdown-menu">
                  <li><button class="dropdown-item " id="btn-export-xlsx">Excel</button></li>
                  <li><a class="dropdown-item " id="btn-export-pdf" href="#">PDF</a></li>
                  <li><a class="dropdown-item" id="btn-export-csv" href="#">CSV</a></li>
                </ul>
            </div>
            <div class="table-responsive p-2">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>CPL</th>
                            <th>MK</th>
                            <th>CPMK</th>
                            <th>Tahap Penilaian</th>
                            <th>Teknik Penilaian</th>
                            <th>Instrumen</th>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($tps as $tp)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tp->cpmk->cpl->code }}</td>
                                <td>{{ $tp->cpmk->mk->kode }}-{{ $tp->cpmk->mk->nama }}</td>
                                <td>{{ $tp->cpmk->code }}</td>
                                <td>{{ $tp->tahap_penilaian }}</td>
                                <td>
                                    @foreach ($tp->cpmk->jenis_penilaian as $item)
                                    {{ $item->name }};
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($tp->instrumen as $item)
                                        {{ $item }},
                                    @endforeach
                                </td>
                                <td>{{ $tp->kriteria }}</td>
                                <td>{{ $tp->bobot }}</td>
                                <td>
                                    <div class="d-flex flex-row">
                                        <a href="{{ route('penilaian.edit',$tp->id) }}" class="btn btn-warning btn-sm mr-1"><i class="fa fa-pencil-alt"></i></a>
                                        <form action="{{ route('penilaian.delete',$tp->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Apakah anda yakin ingin menhapus ini?')" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('penilaian.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModalLabel">Pilih CPMK</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3 align-items-center">
                        <label for="cpmkId" class="col-form-label col-md-2">Pilih CPMK</label>
                        <div class="col-md-10">
                            <div class="form-floating">
                                <select name="cpmk_id" id="cpmkId" class="form-select">
                                    @foreach ($cpmks as $cpmk)
                                        <option value="{{ $cpmk->id }}">{{ $cpmk->code }} - {{ $cpmk->mk->nama }}</option>
                                    @endforeach
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
                                    <option> <-- Pilih Tahap Penilaian --> </option>
                                    <option value="Awal - Akhir Semester">Awal-Akhir Semester</option>
                                    <option value="Awal - Tengah Semester">Awal-Tengah Semester</option>
                                    <option value="Tengah - Akhir Semester">Tengah-Akhir Semester</option>
                                </select>
                                <label for="tahapPenilaian">Tahap Penilaian</label>
                            </div>
                        </div>
                        <label for="instrumenPenilaian" class="col-form-label col-md-2">Instrumen Penilaian</label>
                        <div class="col-md-4 d-flex flex-row justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" name="instrumen[]" type="checkbox" value="Rubrik Skala Persepsi" id="rubrikSkalaPersepsi">
                                <label class="form-check-label" for="rubrikSkalaPersepsi">
                                  Rubrik Skala Persepsi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="instrumen[]" type="checkbox" value="Rubrik Analitik" id="rubrikAnalitik">
                                <label class="form-check-label" for="rubrikAnalitik">
                                  Rubrik Analitik
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="instrumen[]" type="checkbox" value="Rubrik Holistik" id="rubrikHolistik">
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
                                <textarea name="kriteria" id="kriteriaPenilaian" placeholder="Kriteria" class="form-control"></textarea>
                                <label for="kriteriaPenilaian">Kriteria</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label for="bobotPenilaian" class="col-form-label col-md-2">Bobot</label>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" name="bobot" placeholder="8" required id="bobotPenilaian" class="form-control">
                                <label for="bobotPenilaian">Bobot</label>
                            </div>
                            <small class="text-danger"><i class="fa fa-info-circle"></i> Bobot sesuai dengan skor pada matriks setiap CPMK</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest/export.js"></script>
<script>
    document.getElementById('cpmkId').addEventListener('change',function(){
        var bobot = document.getElementById('bobotPenilaian');
        let cpmk_id = this.value;
        $.ajax({
            url : `{{ url('penilaian') }}/skor/` + cpmk_id,
            method : 'GET',
            success : function(response){
                bobot.value = response.score;
            }
        });
    });
    document.getElementById("btn-export-csv").addEventListener("click", function(){
            dataTable.export({
                type: "csv",
                download: true
            });
        });
        document.querySelector("#btn-export-xlsx").addEventListener("click", () => {
            dataTable.export({
                type: "xlsx",
                download: true
            });
        });
        document.querySelector("#btn-export-pdf").addEventListener("click", () => {
            dataTable.export({
                type: "pdf",
                download: true
            });
        });
</script>

@endsection
