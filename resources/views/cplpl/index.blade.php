@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">CPL-PL Matrix</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                @can('cplpl.edit')
                <a href="{{ route('cplpl.edit') }}" class="btn btn-primary">Edit Matrix</a>
                @endcan
                <a href="{{ route('pdf.cplpl') }}" class="btn btn-primary">Cetak PDF</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>CPL</th>
                            @foreach($pls as $pl)
                                <th>{{ $pl->code }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cpls as $cpl)
                            <tr style="height: 30px;">
                                <td style="padding: 5px;">{{ $cpl->code }}</td>
                                @foreach($pls as $pl)
                                    <td style="padding: 5px;">
                                        @if($cplpl->where('cpl_id', $cpl->id)->where('pl_id', $pl->id)->isNotEmpty())<span>&#x2714;</span>
                                           
                                            <!-- Mengatur warna hitam -->
                                        @else
                                           
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

