@extends('layouts.app')

@section('content')
<div class="card shadow mb-4 m-2">
    <div class="container">
        <h1>Daftar CPL, CPMK, dan MK berdasarkan Semester</h1>
        <a href="{{ route('pdf.cpl_cpmk') }}" class="btn btn-primary">Generate PDF</a>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode CPL</th>
                    <th>Kode CPMK</th>
                    @foreach ($semesters as $semester)
                        <th>Semester {{ $semester }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($cpls as $cpl)
                                @php
                                    // Mengelompokkan CPMK berdasarkan CPL
                                    $cplCpmks = $cpmks->where('cpl_id', $cpl->id);
                                @endphp
                                @foreach ($cplCpmks as $cpmk)
                                    <tr>
                                        <td>{{ $cpl->code }}</td>
                                        <td>{{ $cpmk->code }}</td>
                                        @foreach ($semesters as $semester)
                                            <td>
                                                @if ($cpmk->mk->semester == $semester)
                                                    {{ $cpmk->mk->nama }}
                                                @else

                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection