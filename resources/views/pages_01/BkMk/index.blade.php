@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-3">Matrix BK-MK</h1> <!-- Menambahkan class "mt-4" untuk margin top yang lebih besar dan "mb-3" untuk margin bottom yang lebih kecil -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">BK-MK</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-start mb-3">
        @can('update.bk-mk')
            <a href="{{ route('BkMk.edit') }}" class="btn btn-primary mr-2">Update Matrix</a>
        @endcan
        <a href="{{ route('pdf.bk_mk') }}" class="btn btn-success">Download PDF</a>
    </div>
    <div class="card shadow mb-3"> <!-- Mengubah margin dari "m-3" menjadi "mx-3" untuk memberi ruang di sisi kanan dan kiri -->
        <div class="card-body">
            <div class="table-responsive p-2">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>MK</th>
                            @foreach($bks as $bk)
                                <th>{{ $bk->kode }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mks as $mk)
                            <tr>
                                <td>{{ $mk->nama }}</td>
                                @foreach($bks as $bk)
                                    <td>
                                        @if($matrix->where('bk_id', $bk->id)->where('mk_id', $mk->id)->isNotEmpty())
                                            <span>&#x2714;</span>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
