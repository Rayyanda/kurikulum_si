@extends('layouts.app')

@section('content')
<div class="card shadow mb-4 m-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Assign Permission</h6>
        <a>Assign Permission Pada Role <b>{{ $roleById->name }}</b></a>
        <a href="{{ route('role.index') }}" class="btn btn-secondary float-right">Kembali</a>
    </div>
    <div class="card-body">
        <form id="permissionForm" action="{{ route('do.role.permissions') }}" method="post">
            @csrf
            <input type="hidden" name="role" value="{{ $roleById->id }}">

            <!-- Tombol Simpan -->
            <div class="row mb-2">
                <div class="col-md-6">
                    <input type="submit" class="btn btn-primary btn-sm" value="Simpan">
                </div>
                <div class="col-md-6 text-right">
                    <!-- Search Bar -->
                    <input type="text" id="searchPermission" class="form-control form-control-sm" placeholder="Cari permission...">
                </div>
            </div>

            <!-- Select All & Deselect All -->
            <div class="mb-2">
                <input type="checkbox" id="selectAll"> <label for="selectAll">Pilih Semua</label>
                <input type="checkbox" id="deselectAll" class="ml-3"> <label for="deselectAll">Batal Pilih Semua</label>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Permission Label</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody id="permissionTable">
                    @foreach($allPermissions as $permission)
                    <tr>
                        <td>
                            <input type="checkbox" class="permission-checkbox" name="permission[{{ $permission->id }}]" data-id="{{ $permission->id }}" {{ in_array($permission->id, $permissions) ? 'checked' : '' }}>
                        </td>
                        <td class="permission-name">{{ $permission->name }}</td>
                        <td>
                            {{ $permissionsWithDescription->where('id', $permission->id)->first()->deskripsi ?? 'No description available' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</div>

<!-- Script untuk Search, Select All, dan Deselect All -->
<script>
$(document).ready(function() {
    // Fungsi Select All Checkbox
    $('#selectAll').change(function() {
        let isChecked = $(this).prop('checked');
        // Pilih semua checkbox di dalam tabel dan kirim update ke server
        $('.permission-checkbox').prop('checked', isChecked);
        updatePermissions();
    });

    // Fungsi Deselect All Checkbox
    $('#deselectAll').change(function() {
        // Hapus centang semua checkbox di dalam tabel dan kirim update ke server
        $('.permission-checkbox').prop('checked', false);
        updatePermissions();
    });

    // Fungsi untuk mengirim update ke server
    function updatePermissions() {
        let permissions = [];
        $('.permission-checkbox:checked').each(function() {
            permissions.push($(this).data('id'));
        });

        $.ajax({
            url: "{{ route('do.role.permissions') }}",
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                role: "{{ $roleById->id }}",
                permission: permissions
            },
            success: function(response) {
                console.log('Permissions updated successfully');
            },
            error: function(xhr, status, error) {
                console.error("Terjadi kesalahan:", error);
            }
        });
    }

    // Fungsi Search
    $("#searchPermission").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#permissionTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
</script>
@endsection
