@extends('layouts.app')
@can('view.user')
@section('content')
<div class="card shadow mb-4 m-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User</h6>
        <a>page ini berfungsi untuk menambah pengguna baru</a>
    </div>
    <div class="card-body">
        <a href="#" class="btn btn-primary mb-2 float-right" id="btn-add" data-toggle="modal" data-target="#exampleModal">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Dibuat pada</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $key => $row)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm btn-delete" title="Hapus" data-id="{{ $row->id }}"><i class="fas fa-trash"></i></a>
                            <a href="#" class="btn btn-warning btn-sm btn-edit-roles" title="layn role" data-id="{{ $row->id }}" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-toggle="modal" data-target="#roleModal"><i class="fa fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-info btn-sm btn-edit" title="Ubah" data-id="{{ $row->id }}" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<!-- Role Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">Tambah Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/do-assign-user-roles" method="post">
                @csrf
                <input type="hidden" name="userId" id="userId">
                <div class="modal-body">
                    <span id="wrapRoles"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- User Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/user" method="post" id="frm-user">
                @csrf
                <input type="hidden" name="_method" id="_method" value="POST">
                <div class="modal-body">
                    <div>
                        <label>Nama</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div id="re_password">
                        <label>Masukkan Ulang Password</label>
                        <input type="password" name="re_password" id="re_password" class="form-control">
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

@push('js')
<script>
    $(function() {
        // Handle Add User button click
        $("#btn-add").click(function() {
            $("#name").val("");
            $("#email").val("");
            $("#password").val("");
            $("#re_password").val("");
            $("#re_password").show();
            $("#exampleModalLabel").text("Tambah Pengguna");
            $("#frm-user").attr("action", "/user");
            $("#_method").val('POST');
        });

        // Handle Edit User button click
        $(".btn-edit").click(function() {
            $("#re_password").hide();
            $("#exampleModalLabel").text("Edit Pengguna");
            $("#frm-user").attr("action", "/user/" + $(this).data('id'));
            $("#_method").val('PUT');
            $("#name").val($(this).data('name'));
            $("#email").val($(this).data('email'));
        });

        // Handle Assign Roles button click
        $(".btn-edit-roles").click(function() {
            $("#userId").val($(this).data('id'));
            $.ajax({
                url: '/user-roles/' + $(this).data('id'),
                method: 'GET',
                success: function(res) {
                    $("#wrapRoles").html(res.html);
                }
            });
        });

        // Handle Delete User button click
        $(".btn-delete").click(function() {
            var userId = $(this).data('id');
            if (confirm("Are you sure you want to delete this user?")) {
                $.ajax({
                    url: "/user/" + userId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert(response.success);
                        location.reload();
                    },
                    error: function(response) {
                        alert('Error deleting user');
                    }
                });
            }
        });
    });
</script>
@endpush
@endcan