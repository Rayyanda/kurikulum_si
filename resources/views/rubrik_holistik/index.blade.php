@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Tabel Rubrik Holistik</h2>
            @can('holistik.create')
            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#rubrikModal">
                Tambah Rubrik
            </a>
            @endcan
        </div>
        <div class="card-body">
            @can('holistik.view')
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Grade</th>
                        <th>Skor</th>
                        <th>Kriteria Penilaian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rubrik as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->grade }}</td>
                        <td>{{ $item->skor }}</td>
                        <td>{{ $item->kriteria_penilaian }}</td>
                        <td>
                            @can('holistik.edit')
                            <button class="btn btn-warning btn-edit" data-id="{{ $item->id }}"
                                data-grade="{{ $item->grade }}" data-skor="{{ $item->skor }}"
                                data-kriteria="{{ $item->kriteria_penilaian }}" data-bs-toggle="modal"
                                data-bs-target="#rubrikModal">Edit</button>
                            @endcan
                            
                            @can('holistik.delete')
                            <button class="btn btn-danger btn-delete" data-id="{{ $item->id }}">Hapus</button>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endcan
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit Rubrik -->
<div class="modal fade" id="rubrikModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Rubrik Holistik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="frm-rubrik" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="_method" value="POST">
                    <input type="hidden" name="id" id="rubrikId">
                    <div class="mb-3">
                        <label for="grade" class="form-label">Grade</label>
                        <input type="text" name="grade" id="grade" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="skor" class="form-label">Skor</label>
                        <input type="text" name="skor" id="skor" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="kriteria_penilaian" class="form-label">Kriteria Penilaian</label>
                        <textarea name="kriteria_penilaian" id="kriteria_penilaian" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script jQuery untuk Edit dan Hapus -->
<script>
$(document).ready(function() {
    $('.btn-edit').on('click', function() {
        $('#rubrikId').val($(this).data('id'));
        $('#grade').val($(this).data('grade'));
        $('#skor').val($(this).data('skor'));
        $('#kriteria_penilaian').val($(this).data('kriteria'));
        $('#frm-rubrik').attr('action', '/rubrik_holistik/' + $(this).data('id'));
        $('#_method').val('PUT');
    });

    $('.btn-delete').on('click', function() {
        if (confirm('Apakah Anda yakin ingin menghapus rubrik ini?')) {
            var id = $(this).data('id');
            $.ajax({
                url: '/rubrik_holistik/' + id,
                type: 'POST',
                data: { _method: 'DELETE', _token: '{{ csrf_token() }}' },
                success: function(response) {
                    location.reload();
                }
            });
        }
    });
});
</script>
@endsection
