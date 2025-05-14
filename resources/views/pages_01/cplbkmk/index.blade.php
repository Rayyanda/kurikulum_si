@extends('layouts.app')

@section('content')
<style>
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
.table {
    min-width: 100%;
}
</style>

<div class="card shadow mb-4 m-2">
    <div class="container">
        <h1>Matrix CPL-BK-MK</h1>
        @can('cplbkmk.update')
        <a href="{{ route('cplbkmk.edit') }}" class="btn btn-primary">Edit Matrix</a>
        @endcan
        <a href="{{ route('pdf.cplbkmk') }}" class="btn btn-primary">Cetak PDF</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>CPL</th>
                        @foreach($bks as $bk)
                            <th>{{ $bk->kode }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($cpls as $cpl)
                        <tr>
                            <td>{{ $cpl->code }}</td>
                            @foreach($bks as $bk)
                                @php
                                    $cplBkMk = $cplBkMks->where('cpl_id', $cpl->id)->where('bk_id', $bk->id)->first();
                                @endphp
                                <td>{{ $cplBkMk ? $cplBkMk->mk->nama : '' }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
