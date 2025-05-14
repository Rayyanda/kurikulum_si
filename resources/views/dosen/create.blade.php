@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dosen.index') }}">Dosen</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    <div class="card shadow mb-3">
        <div class="card-body">
            <h5 class="card-title">Create Dosen</h5>
            <form action="{{ route('dosen.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3 align-items-center">
                    <label for="namaDosen" class="col-sm-2 col-form-label">Nama <span class="text-danger">*</span></label>
                    <div class="col-md-5">
                        <div class="form-floating">
                            <input type="text" name="nama" required id="namaDosen" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
                            <label for="namaDosen">Nama <span class="text-danger">*</span></label>
                        </div>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label for="nipDosen" class="col-form-label col-md-1">NIP</label>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="nip" id="nipDosen" class="form-control @error('nip') is-invalid @enderror">
                            <label for="nipDosen">NIP</label>
                        </div>
                        @error('nip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label for="jabatan" class="col-form-label col-md-2">Jabatan Fungsional <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="jabatan_fungsional" required id="jabatan" class="form-control @error('jabatan_fungsional') is-invalid @enderror" placeholder="Jabatan">
                            <label for="jabatan">Jabatan Fungsional <span class="text-danger">*</span></label>
                        </div>
                        @error('jabatan_fungsional')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label for="sertifikasi" class="col-form-label col-md-2">Sertifikasi Dosen <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select class="form-select @error('sertifikasi_dosen')is-invalid @enderror" name="sertifikasi_dosen" >
                                <option selected>Open this select menu</option>
                                <option value="1">Memiliki</option>
                                <option value="0">Belum</option>
                            </select>
                            <label for="sertifikasi">Sertifikasi Dosen <span class="text-danger">*</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label for="bidangPengajaran" class="col-form-label col-md-2">Bidang Pengajaran <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <textarea name="bidang_pengajaran" required id="bidangPengajaran" cols="30" rows="10" class="form-control">{{ old('bidang_pengajaran') }}</textarea>
                            <label for="bidangPengajaran">Bidang Pengajaran <span class="text-danger">*</span></label>
                        </div>
                        @error('bidang_pengajaran')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label for="sign" class="col-form-label col-md-1">QR Sign <span class="text-danger">*</span></label>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="file" name="qr_sign" required id="sign" class="form-control @error('qr_sign')is-invalid @enderror">
                            <label for="sign">QR Sign <span class="text-danger">*</span></label>
                        </div>
                        @error('qr_sign')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
