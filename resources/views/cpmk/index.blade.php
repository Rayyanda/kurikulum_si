@extends('layouts.app')

@section('content')
<style>
    .badge-success {
        background-color: #28a745; /* Warna hijau lebih gelap */
        color: #fff; /* Warna teks putih */
    }

    .badge-warning {
        background-color: #ffc107; /* Warna kuning lebih gelap */
        color: #212529; /* Warna teks hitam */
    }

    .badge-danger {
        background-color: #dc3545; /* Warna merah lebih gelap */
        color: #fff; /* Warna teks putih */
    }

    .badge-info {
        background-color: #17a2b8; /* Warna biru lebih gelap */
        color: #fff; /* Warna teks putih */
    }
</style>
<div class="container-fluid">
    <h1>CPMK List</h1>
    <div class="card shadow mb-4 m-2">
        <div class="card-body">
            @can('cpmk.create')
                <a href="{{ route('cpmk.create') }}" class="btn btn-primary mr-1 mb-1">Create CPMK</a>
            @endcan
            <a href="{{ route('cpmk.matrix') }}" class="btn btn-secondary mr-1 mb-1">Tampilan Matrix</a>

            <form method="GET" action="{{ route('cpmk.index') }}" class="mb-4">
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
                                <option value="{{ $semester }}" {{ request('semester') == $semester ? 'selected' : '' }}>
                                    {{ ucfirst($semester) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>

            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>CPL Code</th>
                        <th>CPL Description</th>
                        <th>CPMK Code</th>
                        <th>CPMK Description</th>
                        <th>MK nama</th>
                        <th>Actions</th>
                        <th>Validation</th>
                        <th>Validation Note</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($cpmks as $cpmk)
                        @php
                            $badgeClass = '';
                            $validationText = '';
                            $revisionNumber = '';

                            if ($cpmk->validation_status === 'revisi') {
                                $badgeClass = 'badge-warning';
                                $validationText = 'Revisi';
                            } elseif ($cpmk->validation_status === 'telah direvisi') {
                                $badgeClass = 'badge-success';
                                $validationText = 'Telah Direvisi';
                            } elseif ($cpmk->validation_status === 'ditolak') {
                                $badgeClass = 'badge-danger';
                                $validationText = 'Ditolak';
                            } else {
                                $badgeClass = 'badge-danger'; // Assuming 'belum direvisi' is the default 'red' state
                                $validationText = 'Belum Direvisi';
                            }

                            // Generate the revision number if CPMK has the same CPL and MK
                            $sameCplAndMk = $cpmks->filter(function ($item) use ($cpmk) {
                                return $item->cpl_id == $cpmk->cpl_id && $item->mk_id == $cpmk->mk_id && $item->id != $cpmk->id;
                            });

                            if ($sameCplAndMk->count() > 0) {
                                $revisionNumber = 'revisi-' . ($sameCplAndMk->count() + 1);
                            }
                        @endphp

                        <tr id="row{{ $cpmk->id }}">
                            <td>{{ $cpmk->cpl ? $cpmk->cpl->code : 'N/A' }}</td>
                            <td>{{ $cpmk->cpl ? $cpmk->cpl->deskripsi : 'N/A' }}</td>
                            <td>
                                {{ $cpmk->code }}
                                @if ($cpmk->is_same_as_induk)
                                    <span class="badge badge-info">{{ $revisionNumber }}</span>
                                @endif
                            </td>
                            <td>{{ $cpmk->description }}</td>
                            <td>{{ $cpmk->mk ? $cpmk->mk->nama : 'N/A' }}</td>
                            <td>
                                <div style="display: flex; gap: 10px;">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoModal{{ $cpmk->id }}">Info</button>

                                    @can('cpmk.revisi')
                                        @if ($cpmk->validation_status === 'revisi')
                                            <a href="{{ route('cpmk.show_revisi_form', $cpmk->id) }}" class="btn btn-info">Revisi</a>
                                        @endif
                                    @endcan
                                    @can('cpmk.delete')
                                        <form action="{{ route('cpmk.destroy', $cpmk->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endcan

                                    @if ($cpmk->validation_status === 'edit' || $cpmk->validation_status === 'telah direvisi')
                                        @can('cpmk.edit')
                                            <a href="{{ route('cpmk.edit', $cpmk->id) }}" class="btn btn-warning">Edit</a>
                                        @endcan
                                    @endif

                                    @can('cpmk.validate')
                                        @if ($cpmk->validation_status !== 'revisi')
                                            <a href="{{ route('cpmk.show_validate_form', $cpmk->id) }}" class="btn btn-primary">Validate</a>
                                        @endif
                                    @endcan
                                </div>
                            </td>
                            <td>
                                <span class="badge {{ $badgeClass }}">{{ $validationText }}</span>
                            </td>
                            <td>
                                <span class="validation-note">{{ $cpmk->validation_note ?: '-' }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($cpmks as $cpmk)
    <div class="modal fade" id="infoModal{{ $cpmk->id }}" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel{{ $cpmk->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel{{ $cpmk->id }}">CPMK Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>CPMK Code:</strong> {{ $cpmk->code }}</p>
                    <p><strong>Description:</strong> {{ $cpmk->description }}</p>
                    <p><strong>MK nama:</strong> {{ $cpmk->mk ? $cpmk->mk->nama : 'N/A' }}</p>
                    <p><strong>Tahun Ajaran:</strong> {{ $cpmk->tahun_ajaran }}</p>
                    <p><strong>Semester:</strong> {{ ucfirst($cpmk->semester) }}</p>
                    <p><strong>Validation Status:</strong> {{ $cpmk->validation_status }}</p>
                    <p><strong>Validation Note:</strong> {{ $cpmk->validation_note ?: 'No note provided' }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
