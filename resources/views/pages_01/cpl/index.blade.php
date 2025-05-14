@extends('layouts.app')

@section('content')
<div class="card shadow mb-4 m-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar CPL</h6>
        @can('cpl.create')
        <button class="btn btn-primary float-right" id="btn-add" data-toggle="modal" data-target="#cplModal">Tambah CPL</button>
        @endcan
        <a href="{{ route('pdf.cpl') }}" class="btn btn-secondary float-right mr-2">Print as PDF</a>
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
                        <th>Kode</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = ($cpls->currentPage() - 1) * $cpls->perPage() + 1;
                    @endphp
                    @foreach($cpls as $cpl)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $cpl->code }}</td>
                        <td>{{ $cpl->deskripsi }}</td>
                        <td>{{ $cpl->kategori }}</td>
                        <td>
                            @can('cpl.edit')
                            <a href="#" class="btn btn-info btn-sm btn-edit-cpl" data-id="{{ $cpl->id }}" data-deskripsi="{{ $cpl->deskripsi }}" data-kategori="{{ $cpl->kategori }}" data-profesi="{{ $cpl->profesi }}" data-toggle="modal" data-target="#cplModal"><i class="fa fa-pencil-alt"></i> Edit</a>
                            @endcan
                            @can('cpl.delet')
                            <a href="#" class="btn btn-danger btn-sm btn-delete-cpl" data-id="{{ $cpl->id }}"><i class="fas fa-trash"></i> Hapus</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit CPL -->
<div class="modal fade" id="cplModal" tabindex="-1" aria-labelledby="cplModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cplModalLabel">Tambah CPL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-cpl" method="post" action="{{ route('cpl.store') }}">
                @csrf
                <input type="hidden" name="_method" id="_method-cpl" value="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi CPL"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="penciri utama">Penciri Utama</option>
                            <option value="penciri pendukung">Penciri Pendukung</option>
                        </select>
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

<!-- Modal Konfirmasi Hapus CPL -->
<div class="modal fade" id="deleteCPLModal" tabindex="-1" aria-labelledby="deleteCPLModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCPLModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus CPL ini?
                <input type="hidden" id="deleteCPLId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="confirmDeleteCPL">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center my-4">
    {{ $cpls->links() }}
</div>

@endsection

@push('js')
<script>
    $(function() {
        // Modal Tambah
        $('#btn-add').on('click', function() {
            $('#cplModalLabel').text('Tambah CPL');
            $('#frm-cpl')[0].reset();
            $('#_method-cpl').val('POST');
            $('#frm-cpl').attr('action', '{{ route('cpl.store') }}');
        });

        // Modal Edit
        $('.btn-edit-cpl').on('click', function() {
            const cplId = $(this).data('id');
            const cplDeskripsi = $(this).data('deskripsi');
            const cplKategori = $(this).data('kategori');
            const cplProfesi = $(this).data('profesi');

            $('#deskripsi').val(cplDeskripsi);
            $('#kategori').val(cplKategori);
            $('#profesi').val(cplProfesi);
            $('#_method-cpl').val('PUT');
            $('#frm-cpl').attr('action', '{{ url("cpl") }}/' + cplId);

            $('#cplModalLabel').text('Edit CPL');
        });

        // Modal Hapus
        $('.btn-delete-cpl').on('click', function() {
            const cplId = $(this).data('id');
            $('#deleteCPLId').val(cplId);
            $('#deleteCPLModal').modal('show');
        });

        // Konfirmasi Hapus
        $('#confirmDeleteCPL').on('click', function() {
            const cplId = $('#deleteCPLId').val();

            $.ajax({
                url: '{{ url("cpl") }}/' + cplId,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
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
