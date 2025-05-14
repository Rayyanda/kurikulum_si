@extends('layouts.app')

@section('content')
<div class="card shadow mb-4 m-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Role</h6>
        <a>Halaman ini berfungsi untuk menambah dan mengubah role</a>
        <button class="btn btn-primary float-right" id="btn-add" data-toggle="modal" data-target="#roleModal">Tambah Role</button>
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
                        <th>Nama</th>
                        <th>Guard Name</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $key => $role)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm btn-edit-role" data-id="{{ $role->id }}" data-name="{{ $role->name }}" data-guard-name="{{ $role->guard_name }}" data-toggle="modal" data-target="#roleModal"><i class="fa fa-pencil-alt"></i></a>
                            <a href="/role-permissions/{{ $role->id }}" class="btn btn-warning btn-sm btn-edit-permissions" title="Assign Permission"><i class="fas fa-key"></i></a>
                            <a href="#" class="btn btn-danger btn-sm btn-delete-role" data-id="{{ $role->id }}"><i class="fas fa-trash"></i></a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit Role -->
<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">Tambah Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-role" method="post" action="{{ route('role.store') }}">
                @csrf
                <input type="hidden" name="_method" id="_method-role" value="POST">
                <div class="modal-body">
                    <div>
                        <label>Nama</label>
                        <input type="text" name="name" id="name" class="form-control" required>
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

<!-- Modal Konfirmasi Hapus Role -->
<div class="modal fade" id="deleteRoleModal" tabindex="-1" aria-labelledby="deleteRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRoleModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus role ini?
                <input type="hidden" id="deleteRoleId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="confirmDeleteRole">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Permission -->
<div class="modal fade" id="permissionEditModal" tabindex="-1" aria-labelledby="permissionEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permissionEditModalLabel">Edit Permissions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-edit-permissions" method="post" action="{{ route('role.update.permissions', ['role' => 0]) }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="role_id" id="editPermissionsRoleId">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Select Permissions for Role</label>
                        <div id="editPermissionsCheckboxList">
                            <!-- Checkbox list for permissions will be dynamically populated here -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('.btn-edit-role').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var guardName = $(this).data('guard-name');

            $('#roleModalLabel').text('Edit Role');
            $('#name').val(name);
            $('#frm-role').attr('action', '/role/' + id); // Mengatur action form edit
            $('#_method-role').val('PUT'); // Mengatur method form edit ke PUT
            $('#roleModal').modal('show');
        });

        $('.btn-delete-role').on('click', function() {
            const roleId = $(this).data('id');
            $('#deleteRoleId').val(roleId);
            $('#deleteRoleModal').modal('show');
        });

        $('#confirmDeleteRole').on('click', function() {
            const roleId = $('#deleteRoleId').val();

            $.ajax({
                url: '/role/' + roleId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat menghapus role: ' + xhr.responseJSON.error);
                }
            });
        });

        $('.btn-edit-permissions').click(function() {
            var id = $(this).data('id');
            $('#editPermissionsRoleId').val(id);
            $('#frm-edit-permissions').attr('action', '/role/' + id + '/update-permissions');

            $.ajax({
                url: '/role/' + id + '/edit-permissions',
                type: 'GET',
                success: function(response) {
                    var permissions = response.permissions;
                    var rolePermissions = response.rolePermissions;
                    var checkboxList = '';
                    permissions.forEach(function(permission) {
                        var checked = rolePermissions.some(rp => rp.id === permission.id) ? 'checked' : '';
                        checkboxList += `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="${permission.id}" ${checked}>
                                <label class="form-check-label">${permission.name}</label>
                            </div>
                        `;
                    });
                    $('#editPermissionsCheckboxList').html(checkboxList);
                    $('#permissionEditModal').modal('show');
                }
            });
        });
    });
</script>
@endpush
