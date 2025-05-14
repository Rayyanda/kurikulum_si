@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Matrix CPL-MK</h1>
    <div class="mb-2">
        @can('update.cpl-mk')
        <a href="{{ route('cplmk.edit') }}" class="btn btn-primary">Edit Matrix</a>
        @endcan
        <a href="{{ route('pdf.cplmk') }}" class="btn btn-secondary">Download PDF</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive p-2">
                <table id="dataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama MK</th>
                            @foreach($cpls as $cpl)
                                <th>{{ $cpl->code }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mks as $mk)
                            <tr>
                                <td>{{ $mk->nama }}</td> <!-- Menampilkan nama MK di tbody -->
                                @foreach($cpls as $cpl)
                                    <td>
                                        @if($matrix->where('cpl_id', $cpl->id)->where('mk_id', $mk->id)->isNotEmpty())
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
