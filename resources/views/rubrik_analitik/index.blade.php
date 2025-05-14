@extends('layouts.app')

@section('content')
@can('analitik.view')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Tabel Rubrik Skala Analitik</h2>
        </div>
        <div class="card-body">
            <!-- Filter Aspek -->
            <div class="mb-3">
                <label for="filterAspek" class="form-label">Filter Aspek:</label>
                <select id="filterAspek" class="form-select">
                    <option value="">Semua</option>
                    @foreach($aspekList as $aspek)
                        <option value="{{ $aspek }}">{{ $aspek }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tabel Rubrik -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aspek</th>
                        <th>Skor</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rubrik as $index => $rubrik)
                    <tr data-aspek="{{ $rubrik->aspek }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $rubrik->aspek }}</td>
                        <td>{{ $rubrik->skor }}</td>
                        <td>{{ $rubrik->deskripsi_tambahan }}</td>

                        <td>
                             @can('analitik.edit')
                            <button class="btn btn-warning btn-edit-rubrik" data-id="{{ $rubrik->id }}"
                                data-aspek="{{ $rubrik->aspek }}" data-skor="{{ $rubrik->skor }}"
                                data-deskripsi="{{ $rubrik->deskripsi }}" data-bs-toggle="modal"
                                data-bs-target="#rubrikModal">Edit</button>
                                @endcan
                                 @can('analitik.delet')

                            <button class="btn btn-danger btn-delete-rubrik" data-id="{{ $rubrik->id }}">Hapus</button>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit Rubrik -->
<div class="modal fade" id="rubrikModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Rubrik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="frm-rubrik" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="_method-rubrik" value="POST">
                    <input type="hidden" name="id" id="rubrikId">

                    <div class="mb-3">
                        <label for="aspek" class="form-label">Aspek</label>
                        <select name="aspek" id="aspek" class="form-select">
                            @foreach($aspekList as $aspek)
                                <option value="{{ $aspek }}">{{ $aspek }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="skor" class="form-label">Skor</label>
                        <input type="number" name="skor" id="skor" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_tambahan" class="form-label">Deskripsi Tambahan</label>
                        <textarea name="deskripsi_tambahan" id="deskripsi_tambahan" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="deleteRubrikModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus rubrik ini?</p>
                <form id="deleteRubrikForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="deleteRubrikId">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script jQuery -->
<script>
$(document).ready(function() {
    // Filter aspek
    $('#filterAspek').on('change', function() {
        var selectedAspek = $(this).val();
        $('tbody tr').each(function() {
            var aspek = $(this).data('aspek');
            if (selectedAspek === '' || aspek === selectedAspek) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    // Edit rubrik
    $('.btn-edit-rubrik').on('click', function() {
    var id = $(this).data('id');
    $('#rubrikId').val(id);
    $('#aspek').val($(this).data('aspek'));
    $('#skor').val($(this).data('skor'));
    $('#deskripsi_tambahan').val($(this).data('deskripsi_tambahan'));  // Make sure this is correct
    $('#frm-rubrik').attr('action', '/rubrik_analitik/' + id);
    $('#_method-rubrik').val('PUT');
});


    // Tambah rubrik
    $('#rubrikModal').on('show.bs.modal', function(event) {
        if (!$(event.relatedTarget).hasClass('btn-edit-rubrik')) {
            $('#frm-rubrik').attr('action', '/rubrik_analitik');
            $('#_method-rubrik').val('POST');
            $('#rubrikId').val('');
            $('#aspek').val('');
            $('#skor').val('');
            $('#deskripsi').val('');
        }
    });

    // Hapus rubrik
    $('.btn-delete-rubrik').on('click', function() {
        var id = $(this).data('id');
        $('#deleteRubrikId').val(id);
        $('#deleteRubrikForm').attr('action', '/rubrik_analitik/' + id);
        $('#deleteRubrikModal').modal('show');
    });
});
</script>
@endcan
@endsection
