@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow mb-4 m-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar MK</h6>
            @can('mk.create')
            <button class="btn btn-primary float-right" id="btn-add" data-toggle="modal" data-target="#mkAddModal">Tambah MK</button>
            @endcan
            <a href="{{ route('pdf.mk') }}" class="btn btn-secondary float-right mr-2">Download PDF</a>

            <!-- Dropdown untuk sorting -->
            <div class="float-right mr-2">
                <form id="sort-form" action="{{ route('mk.index') }}" method="get">
                    <select id="sort-by" name="sort" class="form-control" onchange="document.getElementById('sort-form').submit();">
                        <option value="kode" {{ request('sort') == 'kode' ? 'selected' : '' }}>Sort by Kode</option>
                        <option value="nama" {{ request('sort') == 'nama' ? 'selected' : '' }}>Sort by Nama</option>
                        <option value="semester" {{ request('sort') == 'semester' ? 'selected' : '' }}>Sort by Semester</option>
                        <option value="kategori" {{ request('sort') == 'kategori' ? 'selected' : '' }}>Sort by Kategori</option>
                    </select>
                    <input type="hidden" name="order" value="{{ request('order', 'asc') }}">
                </form>
            </div>
        </div>
        <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ session('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ $error }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
        @endif
            <div class="table-responsive p-2">
                <table id="dataTable" class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Semester</th>
                            <th>SKS</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mks as $key => $mk)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $mk->kode }}</td>
                            <td>{{ $mk->nama }}</td>
                            <td>{{ $mk->semester }}</td>
                            <td>{{ $mk->sks }}</td>
                            <td>{{ $mk->kategori }}</td>
                            <td>
                                @can('mk.edit')
                                <a href="#" class="btn btn-info btn-sm btn-edit-mk" data-id="{{ $mk->id }}"
                                    data-kode="{{ $mk->kode }}" data-nama="{{ $mk->nama }}" data-sks="{{ $mk->sks }}"
                                    data-semester="{{ $mk->semester }}" data-kategori="{{ $mk->kategori }}"
                                    data-parent_id="{{ $mk->parent_id }}" data-toggle="modal" data-target="#mkEditModal">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                @endcan
                                @can('mk.delete')
                                <a href="#" class="btn btn-danger btn-sm btn-delete-mk" data-id="{{ $mk->id }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <th>Total SKS</th>
                            <th colspan="3"></th>
                            <th>{{ $sum_sks }}</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah MK -->
<div class="modal fade" id="mkAddModal" tabindex="-1" aria-labelledby="mkAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mkAddModalLabel">Tambah MK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-mk-add" method="post" action="{{ route('mk.store') }}">
                @csrf
                <div class="modal-body">
                    <!-- Kode -->
                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" name="kode" id="kode-add" class="form-control" required>
                        @error('kode')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama -->
                    <div class="form-group">
                        <label>Nama Mata Kuliah</label>
                        <input type="text" name="nama" id="nama-add" class="form-control">
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Opsi Semester -->
                    <div class="form-group">
                        <label>Semester</label>
                        <select name="semester" id="semester-add" class="form-control">
                            <option value="Semester 1">Semester 1</option>
                            <option value="Semester 2">Semester 2</option>
                            <option value="Semester 3">Semester 3</option>
                            <option value="Semester 4">Semester 4</option>
                            <option value="Semester 5">Semester 5</option>
                            <option value="Semester 6">Semester 6</option>
                            <option value="Semester 7">Semester 7</option>
                            <option value="Semester 8">Semester 8</option>
                        </select>
                        @error('semester')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Opsi SKS -->
                    <div class="form-group">
                        <label>SKS</label>
                        <select name="sks" id="sks-add" class="form-control">
                            <option value="1">1 SKS</option>
                            <option value="2">2 SKS</option>
                            <option value="3">3 SKS</option>
                            <option value="4">4 SKS</option>
                        </select>
                        @error('sks')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Opsi Kategori -->
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" id="kategori-add" class="form-control">
                            <option value="MK Wajib">MK Wajib</option>
                            <option value="MK Pilihan">MK Pilihan</option>
                            <option value="MK Wajib Umum">MK Wajib Umum</option>
                        </select>
                        @error('kategori')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Dropdown untuk memilih parent MK -->
                    <div class="form-group">
                        <label for="parent_id">Parent MK</label>
                        <select name="parent_id" id="parent_id-add" class="form-control">
                            <option value="">Pilih Parent MK</option>
                            @foreach($mks as $mk)
                            <option value="{{ $mk->id }}">{{ $mk->kode }} - {{ $mk->nama }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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

<!-- Modal Edit MK -->
<div class="modal fade" id="mkEditModal" tabindex="-1" aria-labelledby="mkEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mkEditModalLabel">Edit MK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-mk-edit" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Kode -->
                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" name="kode" id="kode-edit" class="form-control" required>
                        @error('kode')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama -->
                    <div class="form-group">
                        <label>Nama Mata Kuliah</label>
                        <input type="text" name="nama" id="nama-edit" class="form-control">
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Opsi Semester -->
                    <div class="form-group">
                        <label>Semester</label>
                        <select name="semester" id="semester-edit" class="form-control">
                            <option value="Semester 1">Semester 1</option>
                            <option value="Semester 2">Semester 2</option>
                            <option value="Semester 3">Semester 3</option>
                            <option value="Semester 4">Semester 4</option>
                            <option value="Semester 5">Semester 5</option>
                            <option value="Semester 6">Semester 6</option>
                            <option value="Semester 7">Semester 7</option>
                            <option value="Semester 8">Semester 8</option>
                        </select>
                        @error('semester')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Opsi SKS -->
                    <div class="form-group">
                        <label>SKS</label>
                        <select name="sks" id="sks-edit" class="form-control">
                            <option value="1">1 SKS</option>
                            <option value="2">2 SKS</option>
                            <option value="3">3 SKS</option>
                            <option value="4">4 SKS</option>
                        </select>
                        @error('sks')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Opsi Kategori -->
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" id="kategori-edit" class="form-control">
                            <option value="MK Wajib">MK Wajib</option>
                            <option value="MK Pilihan">MK Pilihan</option>
                            <option value="MK Wajib Umum">MK Wajib Umum</option>
                        </select>
                        @error('kategori')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Dropdown untuk memilih parent MK -->
                    <div class="form-group">
                        <label for="parent_id">Parent MK</label>
                        <select name="parent_id" id="parent_id-edit" class="form-control">
                            <option value="">Pilih Parent MK</option>
                            @foreach($mks as $mk)
                            <option value="{{ $mk->id }}">{{ $mk->kode }} - {{ $mk->nama }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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

<script>
$(document).ready(function() {
    // Handle the edit button click event
    $('.btn-edit-mk').on('click', function() {
        var id = $(this).data('id');
        var kode = $(this).data('kode');
        var nama = $(this).data('nama');
        var sks = $(this).data('sks');
        var semester = $(this).data('semester');
        var kategori = $(this).data('kategori');
        var parent_id = $(this).data('parent_id');

        $('#frm-mk-edit').attr('action', '/mk/' + id);
        $('#kode-edit').val(kode);
        $('#nama-edit').val(nama);
        $('#sks-edit').val(sks);
        $('#semester-edit').val(semester);
        $('#kategori-edit').val(kategori);
        $('#parent_id-edit').val(parent_id);
    });

    // Handle the add button click event
    $('#btn-add').on('click', function() {
        $('#frm-mk-add').attr('action', '{{ route('mk.store') }}');
        $('#kode-add').val('');
        $('#nama-add').val('');
        $('#sks-add').val('');
        $('#semester-add').val('');
        $('#kategori-add').val('');
        $('#parent_id-add').val('');
    });

    // Handle the delete button click event
    $('.btn-delete-mk').on('click', function() {
        var id = $(this).data('id');
        var url = '{{ route('mk.destroy', ':id') }}';
        url = url.replace(':id', id);

        if (confirm('Apakah Anda yakin ingin menghapus MK ini?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    window.location.reload();
                }
            });
        }
    });
});
</script>
@endsection
