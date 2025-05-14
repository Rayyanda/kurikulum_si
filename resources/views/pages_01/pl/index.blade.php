@extends('layouts.app')

@can('pl.view')
@section('content')
<div class="card shadow mb-4 m-2">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar PL</h6>
        <div class="btn-group">
            @can('pl.create')
            <button class="btn btn-primary" id="btn-add" data-toggle="modal" data-target="#plModal">Tambah PL</button>
            @endcan
            <a href="{{ route('pl.print_pdf') }}" class="btn btn-secondary ml-2">Print as PDF</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Profesi</th>
                        <th>Deskripsi</th>
                        <th>Sumber</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pls as $key => $pl)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pl->code }}</td>
                        <td>{{ $pl->nama }}</td>
                        <td>{{ Str::limit($pl->deskripsi, 50) }}</td>
                        <td>{{ $pl->sumber }}</td>
                        <td class="text-center">
                            @can('pl.edit')
                            <a href="#" class="btn btn-info btn-sm" data-id="{{ $pl->id }}" data-nama="{{ $pl->nama }}" data-deskripsi="{{ $pl->deskripsi }}" data-sumber="{{ $pl->sumber }}" data-toggle="modal" data-target="#plModal"><i class="fa fa-pencil-alt"></i></a>
                            @endcan
                            @can('pl.delet')
                            <a href="#" class="btn btn-danger btn-sm btn-delete-pl" data-id="{{ $pl->id }}"><i class="fas fa-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit PL -->
<div class="modal fade" id="plModal" tabindex="-1" aria-labelledby="plModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plModalLabel">Tambah PL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-pl" method="post" action="{{ route('pl.store') }}">
                @csrf
                <input type="hidden" name="_method" id="_method-pl" value="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Profesi</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Sumber</label>
                        <input type="text" name="sumber" id="sumber" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus PL -->
<div class="modal fade" id="deletePLModal" tabindex="-1" aria-labelledby="deletePLModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePLModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus PL ini?
                <input type="hidden" id="deletePLId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="confirmDeletePL">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $(function() {
        // Menangani modal tambah PL
        $('#btn-add').on('click', function() {
            $('#plModalLabel').text('Tambah PL');
            $('#frm-pl')[0].reset();
            $('#_method-pl').val('POST');
            $('#frm-pl').attr('action', '{{ route('pl.store') }}');
        });

        // Menangani modal edit PL
        $('.btn-edit-pl').on('click', function() {
            const plId = $(this).data('id');
            const plNama = $(this).data('nama');
            const plDeskripsi = $(this).data('deskripsi');
            const plSumber = $(this).data('sumber');

            $('#nama').val(plNama);
            $('#deskripsi').val(plDeskripsi);
            $('#sumber').val(plSumber);
            $('#_method-pl').val('PUT');
            $('#frm-pl').attr('action', '{{ url("pl") }}/' + plId);

            $('#plModalLabel').text('Edit PL');
        });

        // Menangani modal konfirmasi hapus PL
        $('.btn-delete-pl').on('click', function() {
            const plId = $(this).data('id');
            $('#deletePLId').val(plId);
            $('#deletePLModal').modal('show');
        });

        // Menangani konfirmasi hapus PL
        $('#confirmDeletePL').on('click', function() {
            const plId = $('#deletePLId').val();
            $.ajax({
                url: '{{ url("pl") }}/' + plId,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
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
@endcan
