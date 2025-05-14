@extends('layouts.app')

@can('permission.view')
@section('content')
<div class="card shadow mb-4 m-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Permission</h6>
        <a>Halaman ini berfungsi untuk menambah dan mengubah permission</a>
        <button class="btn btn-primary float-right" id="btn-add" data-toggle="modal" data-target="#addPermissionModal">Tambah Permission</button>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Search Bar -->
        <div class="mb-3">
            <form action="{{ route('permission.index') }}" method="GET">
                <input type="text" id="searchPermission" name="search" class="form-control" placeholder="Cari permission..." value="{{ request()->input('search') }}">
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Guard Name</th>
                        <th>Deskripsi</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="permissionTable">
                    @foreach($permissions as $key => $permission)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>{{ $permission->deskripsi }}</td>
                        <td>
                            <button class="btn btn-info btn-sm btn-edit-permission" data-id="{{ $permission->id }}" data-name="{{ $permission->name }}" data-guard-name="{{ $permission->guard_name }}" data-deskripsi="{{ $permission->deskripsi }}"><i class="fa fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-delete-permission" data-id="{{ $permission->id }}"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Permission -->
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-labelledby="addPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPermissionModalLabel">Tambah Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-add-permission" method="post" action="{{ route('permission.store') }}">
                @csrf
                <div class="modal-body">
                    <div>
                        <label>Nama</label>
                        <input type="text" name="name" id="add_name" class="form-control" required>
                    </div>
                    <div>
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="add_deskripsi" class="form-control"></textarea>
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

<!-- Modal Edit Permission -->
<div class="modal fade" id="editPermissionModal" tabindex="-1" aria-labelledby="editPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPermissionModalLabel">Edit Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-edit-permission" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div>
                        <label>Nama</label>
                        <input type="text" name="name" id="edit_name" class="form-control" required>
                    </div>
                    <div>
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="edit_deskripsi" class="form-control"></textarea>
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

<!-- Modal Konfirmasi Hapus Permission -->
<div class="modal fade" id="deletePermissionModal" tabindex="-1" aria-labelledby="deletePermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePermissionModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus permission ini?
                <input type="hidden" id="deletePermissionId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDeletePermission">Hapus</button>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection

@push('js')
<script>
 $(document).ready(function() {
    // Fungsi Search
    $("#searchPermission").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#permissionTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    // Ketika tombol tambah permission diklik
    $('#btn-add').click(function() {
        $('#frm-add-permission')[0].reset();
        $('#addPermissionModal').modal('show');
    });

    // Ketika tombol edit permission diklik
    $('.btn-edit-permission').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var guard_name = $(this).data('guard-name');
        var deskripsi = $(this).data('deskripsi');

        $('#edit_name').val(name);
        $('#edit_guard_name').val(guard_name);
        $('#edit_deskripsi').val(deskripsi);
        $('#frm-edit-permission').attr('action', '/permission/' + id);
        $('#editPermissionModal').modal('show');
    });

    // Memproses form edit permission menggunakan AJAX
    $('#frm-edit-permission').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        var actionUrl = $(this).attr('action');

        $.ajax({
            url: actionUrl,
            type: 'PUT',
            data: formData,
            success: function(response) {
                if (response.success) {
                    location.reload(); // Reload page to see updated data
                }
            },
            error: function(xhr, status, error) {
                console.error("Terjadi kesalahan:", error);
            }
        });
    });

    // Ketika tombol hapus permission diklik
    $('.btn-delete-permission').on('click', function() {
        const permissionId = $(this).data('id');
        $('#deletePermissionId').val(permissionId);
        $('#deletePermissionModal').modal('show');
    });

    // Konfirmasi hapus permission
    $('#confirmDeletePermission').on('click', function() {
        const permissionId = $('#deletePermissionId').val();
        $.ajax({
            url: '/permission/' + permissionId,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error("Terjadi kesalahan:", error);
            }
        });
    });

    // Memproses form tambah permission menggunakan AJAX
    $('#frm-add-permission').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('permission.store') }}",
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    location.reload(); // Reload page to see updated data
                }
            },
            error: function(xhr, status, error) {
                console.error("Terjadi kesalahan:", error);
            }
        });
    });
});

</script>
@endpush
