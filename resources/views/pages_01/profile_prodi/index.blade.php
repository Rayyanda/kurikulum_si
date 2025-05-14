@extends('layouts.app')

@section('content')
<div class="card shadow mb-4 m-2">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Daftar Visi dan Misi</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visiMisi as $index => $item)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->isi }}</td>
                                <td>
                                    <button class="btn btn-primary btn-edit" data-id="{{ $item->id }}" data-toggle="modal" data-target="#editModal">Edit</button>
                                    <button class="btn btn-danger btn-delete" data-id="{{ $item->id }}">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Visi/Misi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" readonly>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea class="form-control" id="isi" name="isi" rows="3"></textarea>
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
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Fungsi untuk menampilkan data visi/misi pada modal edit
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/visi-misi/' + id + '/edit',
                type: 'GET',
                success: function(response) {
                    $('#kategori').val(response.kategori);
                    $('#isi').val(response.isi);
                    $('#editModal').modal('show');
                }
            });
        });

        // Fungsi untuk mengirim data visi/misi yang diedit
        $('#editForm').submit(function(e) {
            e.preventDefault();
            var id = $('.btn-edit').data('id');
            $.ajax({
                url: '/visi-misi/' + id,
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    $('#editModal').modal('hide');
                    location.reload();
                }
            });
        });

        // Fungsi untuk menghapus data visi/misi
        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: '/visi-misi/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection
