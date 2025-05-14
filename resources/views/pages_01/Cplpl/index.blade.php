@extends('layouts.app')

@section('content')
<div class="card shadow mb-4 m-2">
    <h1>Matrix CPL-PL</h1>
    
    <div class="d-flex justify-content-start mb-3">
        @can('update.cpl-pl')
        <a href="{{ route('cplpl.edit') }}" class="btn btn-primary mr-2">Edit Matrix</a>
        @endcan
        <a href="{{ route('pdf.cplpl') }}" class="btn btn-primary">Cetak PDF</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>CPL</th>
                @foreach($pls as $pl)
                    <th>{{ $pl->nama_pl }}</th> <!-- Menampilkan nama PL di header tabel -->
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($cpls as $cpl)
                <tr>
                    <td>{{ $cpl->nama_cpl }}</td> <!-- Menampilkan nama CPL di kolom pertama -->
                    @foreach($pls as $pl)
                        <td>
                            @if($cplpl->where('cpl_id', $cpl->id)->where('pl_id', $pl->id)->isNotEmpty())
                                <span>&#x2714;</span> <!-- Tanda centang jika ada hubungan -->
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
