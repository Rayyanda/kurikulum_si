@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4 m-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar BK</h6>
            @can('bk.create')
            <button class="btn btn-primary float-right" id="btn-add" data-toggle="modal" data-target="#bkModal">Tambah BK</button>
            @endcan
            <a href="{{ route('pdf.bk') }}" class="btn btn-secondary float-right mr-2">Print as PDF</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive p-2">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Bahan Kajian</th>
                            <th>Deskripsi</th>
                            <th>Referensi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bks as $key => $bk)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $bk->kode }}</td>
                            <td>{{ $bk->nama_bahan_kajian }}</td>
                            <td>{{ $bk->deskripsi }}</td>
                            <td>{{ $bk->referensi }}</td>
                            <td>
                                @can('bk.edit')
                                <a href="#" class="btn btn-info btn-sm btn-edit-bk" title="Edit" data-id="{{ $bk->id }}" data-nama="{{ $bk->nama_bahan_kajian }}" data-deskripsi="{{ $bk->deskripsi }}" data-referensi="{{ $bk->referensi }}" data-toggle="modal" data-target="#bkModal"><i class="fa fa-pencil-alt"></i></a>
                                @endcan
                                @can('bk.delete')
                                <a href="#" class="btn btn-danger btn-sm btn-delete-bk" data-id="{{ $bk->id }}" data-toggle="modal" data-target="#deleteBKModal"><i class="fas fa-trash"></i></a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit BK -->
<div class="modal fade" id="bkModal" tabindex="-1" aria-labelledby="bkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bkModalLabel">Tambah BK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-bk" method="post" action="{{ route('bk.store') }}">
                @csrf
                <input type="hidden" name="_method" id="_method-bk" value="POST">
                <div class="modal-body">
                    <!-- Nama Bahan Kajian -->
                    <div class="form-group">
                        <label>Nama Bahan Kajian</label>
                        <input type="text" name="nama_bahan_kajian" id="nama_bahan_kajian" class="form-control">
                        @error('nama_bahan_kajian')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
                        @error('deskripsi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Referensi --}}
                    <div class="form-floating mb-2">
                        <input type="text" name="referensi" id="referensiBK" placeholder="Referensi" required class="form-control">
                        <label for="referensiBK">Referensi</label>
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

<!-- Modal Konfirmasi Hapus BK -->
<div class="modal fade" id="deleteBKModal" tabindex="-1" aria-labelledby="deleteBKModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBKModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus BK ini?
                <input type="hidden" id="deleteBKId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="confirmDeleteBK" >Hapus</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
$(function() {
    // Mengatur modal saat tombol tambah BK ditekan
    $('#btn-add').on('click', function() {
        // Reset form modal
        $('#frm-bk')[0].reset();
        $('#bkModalLabel').text('Tambah BK');
        $('#_method-bk').val('POST');

        // Setel action form ke route bk.store
        $('#frm-bk').attr('action', '{{ route('bk.store') }}');
    });

    // Mengatur modal saat tombol edit BK ditekan
    $('.btn-edit-bk').on('click', function() {
        // Mengambil data BK yang dipilih
        const bkId = $(this).data('id');
        const bkNama = $(this).data('nama');
        const bkDeskripsi = $(this).data('deskripsi');
        const referensi = $(this).data('referensi');

        // Setel nilai form
        $('#nama_bahan_kajian').val(bkNama);
        $('#deskripsi').val(bkDeskripsi);
        $('#referensiBK').val(referensi);

        // Setel metode form ke PUT
        $('#_method-bk').val('PUT');

        // Setel action form ke URL bk/{id}
        $('#frm-bk').attr('action', '{{ url("bk") }}/' + bkId);

        // Ubah judul modal ke 'Edit BK'
        $('#bkModalLabel').text('Edit BK');
    });

    // Mengatur modal saat tombol hapus BK ditekan
    $('.btn-delete-bk').on('click', function() {
        const bkId = $(this).data('id');
        $('#deleteBKId').val(bkId);
    });

    // Menangani konfirmasi hapus BK
    $('#confirmDeleteBK').on('click', function() {
        const bkId = $('#deleteBKId').val();

        $.ajax({
            url: '{{ url("bk") }}/' + bkId,
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function() {
                // Muat ulang halaman setelah penghapusan berhasil
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
