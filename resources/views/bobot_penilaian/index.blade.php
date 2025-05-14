@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Daftar Bobot Penilaian</h1>

    <!-- Tombol Tambah -->
    @can('bobotpenilaian.create')
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('bobot_penilaian.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Bobot Penilaian
        </a>
    </div>
    @endcan

    <!-- Card untuk Filter dan Tabel -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Filter dan Daftar Bobot Penilaian</h5>
        </div>
        <div class="card-body">
            <!-- Filter -->
            <form method="GET" action="{{ route('bobot_penilaian.index') }}" class="mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                            <option value="">-- Pilih Tahun Ajaran --</option>
                            @foreach ($tahunAjaranOptions as $tahun)
                                <option value="{{ $tahun }}" {{ request('tahun_ajaran') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="semester">Semester</label>
                        <select name="semester" id="semester" class="form-control">
                            <option value="">-- Pilih Semester --</option>
                            @foreach ($semesterOptions as $semester)
                                <option value="{{ $semester }}" {{ request('semester') == $semester ? 'selected' : '' }}>{{ $semester }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </form>

            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>CPL</th>
                            <th>MK</th>
                            <th>CPMK</th>
                            <th>MBKM</th>
                            <th>Partisipasi</th>
                            <th>Observasi</th>
                            <th>Untuk Kerja</th>
                            <th>Tes Tulis UTS</th>
                            <th>Tes Tulis UAS</th>
                            <th>Tes Lisan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bobot_penilaians as $bobot_penilaian)
                        <tr>
                            <td>{{ $bobot_penilaian->cpl->code }}</td>
                            <td>{{ $bobot_penilaian->mk->nama }}</td>
                            <td>{{ $bobot_penilaian->cpmk->code }}</td>
                            <td>{{ $bobot_penilaian->mbkm ?? '-' }}</td>
                            <td>{{ $bobot_penilaian->partisipasi }}</td>
                            <td>{{ $bobot_penilaian->observasi }}</td>
                            <td>{{ $bobot_penilaian->untuk_kerja }}</td>
                            <td>{{ $bobot_penilaian->tes_tulis_UTS }}</td>
                            <td>{{ $bobot_penilaian->tes_tulis_UAS }}</td>
                            <td>{{ $bobot_penilaian->tes_lisan_Tugas_Kelompok }}</td>
                            <td>{{ $bobot_penilaian->total }}</td>
                            <td>
                                @can('bobotpenilaian.edit')
                                <a href="{{ route('bobot_penilaian.edit', $bobot_penilaian->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endcan
                                
                                @can('bobotpenilaian.delete')
                                <form action="{{ route('bobot_penilaian.destroy', $bobot_penilaian->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
