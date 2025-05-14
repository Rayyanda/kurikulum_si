@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">CPMK Matrix</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('cpmk.index') }}" class="btn btn-primary">Kembali ke CPMK</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>MK \ CPL</th>
                            @foreach($cpls as $cpl)
                                <th>{{ $cpl->code }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mks as $mk)
                            <tr style="height: 30px;">
                                <td style="padding: 5px;">{{ $mk->nama }}</td>
                                @foreach($cpls as $cpl)
                                    <td style="padding: 5px;">
                                        @if(isset($matrix[$mk->id][$cpl->id]) && $matrix[$mk->id][$cpl->id])
                                            <span>&#x2714;</span>
                                        @else
                                            <!-- Kosongkan atau tambahkan elemen jika tidak dicentang -->
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
