@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        #dataTable thead th{
            background-color: orange;
            text-align: center;
        }
    </style>
    <h1>Matriks Teknik Penilaian CPMK</h1>
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('penilaian.index') }}">Penilaian</a></li>
          <li class="breadcrumb-item active" aria-current="page">Matriks</li>
        </ol>
    </nav>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ session('success') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> {{ session('error') }}.
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
    <div class="mb-3">
        <a href="{{ route('penilaian.matriks.edit') }}" class="btn btn-success">Edit Matriks</a>
    </div>
    <div class="card mb-3 shadow">
        <div class="card-header bg-primary">
            <h4 class="mb-0 text-white" >Bobot Penilaian</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive p-2">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr class="text-center bg-warning" >
                            <th>CPL</th>
                            <th>MK</th>
                            <th>CPMK</th>
                            @foreach ($jps as $item)
                                <th>{{ $item->name }}</th>
                            @endforeach
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($cpmk as $item)
                            <tr>
                                <td>{{ $item->cpl->code }}</td>
                                <td>{{ $item->mk->nama }}</td>
                                <td>
                                    {{ $item->code }}
                                </td>
                                @php
                                    $totalskor =0;
                                @endphp
                                @foreach ($jps as $jp)
                                    <td class="text-center" >
                                        @if ($jtp->where('jenis_penilaian_id',$jp->id)->where('cpmk_id',$item->id)->isNotEmpty())
                                            @php
                                                $jtps = $jtp->where('jenis_penilaian_id',$jp->id)->where('cpmk_id',$item->id)->first();
                                                $totalskor+=$jtps->score;
                                            @endphp
                                            {{-- <span>&#x2714;</span> --}}
                                            {{-- <span class="text-success"><i class="fa fa-2x fa-check-square" aria-hidden="true"></i></span> --}}
                                            {{ $jtps->score }}
                                        @endif
                                        {{-- {{ $jtp->where('jenis_penilaian_id',$jp->id)->where('cpmk_id',$item->id)->isNotEmpty() ? $jtp->where('jenis_penilaian_id',$jp->id)->where('cpmk_id',$item->id) : '' }} --}}
                                        {{-- @foreach ($jtp->where('jenis_penilaian_id',$jp->id)->where('cpmk_id',$item->id) as $jt)
                                            {{ $jt->score }}
                                        @endforeach --}}
                                    </td>
                                @endforeach
                                <td>{{ $totalskor }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
