@extends('layouts.app')

@section('content')
<div class="card shadow mb-4 m-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Rubrik Skala Presepsi</h6>
        @can('presepsi.create')
        <button class="btn btn-primary float-right" id="btn-add" data-toggle="modal" data-target="#rubrikModal">Tambah Rubrik</button>
        @endcan

        <!-- Filter Dropdown for Aspek -->
        <form method="GET" action="{{ route('rubrik_presepsi.index') }}" class="form-inline mt-3">
            <label for="aspek" class="mr-2">Filter Aspek:</label>
            <select name="aspek" id="aspek" class="form-control">
                <option value="">Pilih Aspek</option>
                @foreach($aspekList as $aspek)
                    <option value="{{ $aspek }}" {{ request('aspek') == $aspek ? 'selected' : '' }}>{{ $aspek }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-info ml-2">Filter</button>
        </form>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aspek</th>
                        <th>Skor</th>
                        <th>Grade</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = ($rubrikSkalaPresepsis->currentPage() - 1) * $rubrikSkalaPresepsis->perPage() + 1;
                    @endphp
                    @foreach($rubrikSkalaPresepsis as $rubrik)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $rubrik->aspek }}</td>
                        <td>{{ $rubrik->skor }}</td>
                        <td>{{ $rubrik->grade }}</td>
                        <td>{{ $rubrik->deskripsi_tambahan }}</td>
                        <td>
                            @can('presepsi.edit')
                            <a href="#" class="btn btn-info btn-sm btn-edit-rubrik" data-id="{{ $rubrik->id }}" data-aspek="{{ $rubrik->aspek }}" data-skor="{{ $rubrik->skor }}" data-grade="{{ $rubrik->grade }}" data-deskripsi="{{ $rubrik->deskripsi_tambahan }}" data-toggle="modal" data-target="#rubrikModal"><i class="fa fa-pencil-alt"></i></a>
                            @endcan
                            @can('presepsi.delete')
                            <a href="#" class="btn btn-danger btn-sm btn-delete-rubrik" data-id="{{ $rubrik->id }}"><i class="fas fa-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center my-4">
    {{ $rubrikSkalaPresepsis->links() }}
</div>

<!-- Modal Add/Edit Rubrik -->
<div class="modal fade" id="rubrikModal" tabindex="-1" role="dialog" aria-labelledby="rubrikModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rubrikModalLabel">Tambah Rubrik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-rubrik" method="POST" action="{{ route('rubrik_presepsi.store') }}">
                @csrf
                @method('POST')
                <input type="hidden" id="rubrikId" name="rubrikId">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="aspek">Aspek</label>
                        <input type="text" class="form-control" id="aspek" name="aspek" required>
                    </div>
                    <div class="form-group">
                        <label for="skor">Skor</label>
                        <input type="number" class="form-control" id="skor" name="skor" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">Grade</label>
                        <input type="text" class="form-control" id="grade" name="grade" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_tambahan">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi_tambahan" name="deskripsi_tambahan" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete Rubrik -->
<div class="modal fade" id="deleteRubrikModal" tabindex="-1" role="dialog" aria-labelledby="deleteRubrikModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRubrikModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus rubrik ini?
            </div>
            <div class="modal-footer">
                <form id="deleteRubrikForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deleteRubrikId" name="rubrikId">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(function() {
        // Add Rubrik
        $('#btn-add').on('click', function() {
            $('#rubrikModalLabel').text('Tambah Rubrik');
            $('#frm-rubrik')[0].reset();
            $('#_method-rubrik').val('POST');
            $('#frm-rubrik').attr('action', '{{ route('rubrik_presepsi.store') }}');
        });

        // Edit Rubrik
        $('.btn-edit-rubrik').on('click', function() {
            const rubrikId = $(this).data('id');
            const rubrikAspek = $(this).data('aspek');
            const rubrikSkor = $(this).data('skor');
            const rubrikGrade = $(this).data('grade');
            const rubrikDeskripsi = $(this).data('deskripsi');

            $('#aspek').val(rubrikAspek);
            $('#skor').val(rubrikSkor);
            $('#grade').val(rubrikGrade);
            $('#deskripsi_tambahan').val(rubrikDeskripsi);
            $('#_method-rubrik').val('PUT');
            $('#frm-rubrik').attr('action', '{{ url("rubrik_presepsi") }}/' + rubrikId);

            $('#rubrikModalLabel').text('Edit Rubrik');
        });

        // Delete Rubrik
        $('.btn-delete-rubrik').on('click', function() {
            const rubrikId = $(this).data('id');
            $('#deleteRubrikId').val(rubrikId);
            $('#deleteRubrikModal').modal('show');
        });

        $('#deleteRubrikForm').on('submit', function(e) {
            e.preventDefault();
            const rubrikId = $('#deleteRubrikId').val();
            $.ajax({
                url: '{{ url("rubrik_presepsi") }}/' + rubrikId,
                method: 'DELETE',
                data: $(this).serialize(),
                success: function() {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Terjadi kesalahan:", error);
                }
            });
        });
    });
</script>
@endpush
