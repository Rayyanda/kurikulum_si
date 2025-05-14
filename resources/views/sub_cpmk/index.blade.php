@extends('layouts.app')

@section('content')

<style>
    .card * {
        font-size: 0.9rem; /* Ukuran font untuk semua elemen di dalam div .card */
    }

    .card h1 {
        font-size: 1.5rem; /* Ukuran font khusus untuk judul */
    }
</style>
<div class="container-fluid">
    <h1>Sub-CPMK List</h1>
    <div class="card shadow mb-4 m-2">
        <div class="card-body">

            <div class="mb-2">
                @can('subcpmk.create')
                    <a href="{{ route('sub_cpmk.create') }}" class="btn btn-primary mr-1">Create Sub-CPMK</a>
                @endcan
                <a href="{{ route('pdf.subcpmk') }}" class="btn btn-primary mr-1">Generate PDF</a>
            </div>


            <form method="GET" action="{{ route('sub_cpmk.index') }}" class="mb-4">
                <div class="form-row">
                    <div class="col">
                        <select name="tahun_ajaran" class="form-control">
                            <option value="">Pilih Tahun Ajaran</option>
                            @foreach ($tahunAjaranOptions as $tahunAjaran)
                                <option value="{{ $tahunAjaran }}" {{ request('tahun_ajaran') == $tahunAjaran ? 'selected' : '' }}>{{ $tahunAjaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select name="semester" class="form-control">
                            <option value="">Pilih Semester</option>
                            @foreach ($semesterOptions as $semester)
                                <option value="{{ $semester }}" {{ request('semester') == $semester ? 'selected' : '' }}>{{ ucfirst($semester) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>CPMK Code</th>
                            <th>CPMK Description</th>
                            <th>SubCPMK Code</th>
                            <th>SubCPMK Description</th>
                            <th>CPL Code</th>
                            <th>CPL Description</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Actions</th>
                            <th>Validation</th>
                            <th>Validation Note</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" >
                        @foreach ($subcpmks as $subcpmk)
                            <tr id="row{{ $subcpmk->id }}"
                                class="{{ $subcpmk->validation_status === 'telah direvisi' ? 'bg-success' : ($subcpmk->validation_status === 'revisi' ? 'bg-warning' : '') }}">
                                <td>{{ $subcpmk->cpmk ? $subcpmk->cpmk->code : 'N/A' }}</td>
                                <td>{{ $subcpmk->cpmk ? $subcpmk->cpmk->description : 'N/A' }}</td>
                                <td>{{ $subcpmk->code }}</td>
                                <td>{{ $subcpmk->description }}</td>
                                <td>{{ $subcpmk->cpmk && $subcpmk->cpmk->cpl ? $subcpmk->cpmk->cpl->code : 'N/A' }}</td>
                                <td>{{ $subcpmk->cpmk && $subcpmk->cpmk->cpl ? $subcpmk->cpmk->cpl->deskripsi : 'N/A' }}</td>
                                <td>{{ $subcpmk->tahun_ajaran }}</td>
                                <td>{{ ucfirst($subcpmk->semester) }}</td>
                                <td>
                                    <div style="display: flex; flex-direction: column; gap: 10px;">
                                        <!-- Tombol Info untuk menampilkan modal -->
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoModal{{ $subcpmk->id }}">Info</button>

                                        @if ($subcpmk->validation_status === 'revisi')
                                            @can('subcpmk.revisi')
                                                <a href="{{ route('sub_cpmk.show_revisi_form', $subcpmk->id) }}" class="btn btn-primary">Revisi</a>
                                            @endcan
                                            @can('subcpmk.delete')
                                                <form action="{{ route('sub_cpmk.destroy', $subcpmk->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endcan
                                        @elseif ($subcpmk->validation_status === 'edit' || $subcpmk->validation_status === 'telah direvisi')
                                            @can('subcpmk.edit')
                                                <a href="{{ route('sub_cpmk.edit', $subcpmk->id) }}" class="btn btn-warning">Edit</a>
                                            @endcan
                                            @can('subcpmk.delete')
                                                <form action="{{ route('sub_cpmk.destroy', $subcpmk->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endcan
                                            @can('subcpmk.validate')
                                                <a href="{{ route('sub_cpmk.show_validate_form', $subcpmk->id) }}" class="btn btn-success">Validate</a>
                                            @endcan
                                        @else
                                            @can('subcpmk.edit')
                                                <a href="{{ route('sub_cpmk.edit', $subcpmk->id) }}" class="btn btn-warning">Edit</a>
                                            @endcan
                                            @can('subcpmk.delete')
                                                <form action="{{ route('sub_cpmk.destroy', $subcpmk->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endcan
                                            @can('subcpmk.validate')
                                                <a href="{{ route('sub_cpmk.show_validate_form', $subcpmk->id) }}" class="btn btn-primary">Validate</a>
                                            @endcan
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if ($subcpmk->validation_status === 'telah direvisi')
                                        <span class="badge badge-success">Telah Direvisi</span>
                                    @elseif (Str::startsWith($subcpmk->validation_status, 'revisi'))
                                        <span class="badge badge-warning">{{ $subcpmk->validation_status }}</span>
                                    @else
                                        <span class="badge badge-secondary">Edit</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="validation-note">{{ $subcpmk->validation_note ?: 'No note provided' }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- Modal Info SubCPMK -->
@foreach ($subcpmks as $subcpmk)
    <div class="modal fade" id="infoModal{{ $subcpmk->id }}" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel{{ $subcpmk->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel{{ $subcpmk->id }}">Sub-CPMK Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>CPL Code:</strong> {{ $subcpmk->cpmk && $subcpmk->cpmk->cpl ? $subcpmk->cpmk->cpl->code : 'N/A' }}</p>
                    <p><strong>CPL Description:</strong> {{ $subcpmk->cpmk && $subcpmk->cpmk->cpl ? $subcpmk->cpmk->cpl->deskripsi : 'N/A' }}</p>
                    <p><strong>MK Code:</strong> {{ $subcpmk->mk ? $subcpmk->mk->kode : 'N/A' }}</p>
                    <p><strong>MK Name:</strong> {{ $subcpmk->mk ? $subcpmk->mk->nama : 'N/A' }}</p>
                    <p><strong>CPMK Code:</strong> {{ $subcpmk->cpmk ? $subcpmk->cpmk->code : 'N/A' }}</p>
                    <p><strong>CPMK Description:</strong> {{ $subcpmk->cpmk ? $subcpmk->cpmk->description : 'N/A' }}</p>
                    <p><strong>Sub-CPMK Code:</strong> {{ $subcpmk->code }}</p>
                    <p><strong>Sub-CPMK Description:</strong> {{ $subcpmk->description }}</p>
                    <p><strong>Tahun Ajaran:</strong> {{ $subcpmk->tahun_ajaran }}</p>
                    <p><strong>Semester:</strong> {{ ucfirst($subcpmk->semester) }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
