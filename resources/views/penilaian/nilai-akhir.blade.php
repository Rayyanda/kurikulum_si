@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rumus Nilai Akhir MK</h1>
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('penilaian.index') }}">Penilaian</a></li>
          <li class="breadcrumb-item active" aria-current="page">Matriks</li>
        </ol>
    </nav>
    <div class="mb-3">
        <a href="{{ route('penilaian.nilai-akhir.export') }}" target="_blank" class="btn btn-success" >Export to PDF</a>
    </div>
    <div class="card mb-3 shadow">
        <div class="card-body">
            <div class="table-responsive p-2">
                <table class="table table-bordered" id="nilaiAkhir">
                    <thead>
                        <tr>
                            <th>MK</th>
                            <th>CPL</th>
                            <th>CPMK</th>
                            <th>Skor Maks</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grouped as $mkKode => $penilaians)
                            @php
                                $mkNama = $penilaians->first()->cpmk->mk->nama;
                                $totalScore = $penilaians->sum('bobot');
                                $rowspan = $penilaians->count();
                            @endphp

                            @foreach ($penilaians as $index => $penilaian)
                                <tr>
                                    @if ($loop->first)
                                        <td rowspan="{{ $rowspan }}" class="align-middle">
                                            {{ $mkKode }}<br><small>{{ $mkNama }}</small>
                                        </td>
                                    @endif
                                    <td>{{ $penilaian->cpmk->cpl->code ?? '-' }}</td>
                                    <td>{{ $penilaian->cpmk->code ?? '-' }}</td>
                                    <td class="text-center">{{ $penilaian->bobot }}</td>
                                    @if ($loop->first)
                                        <td rowspan="{{ $rowspan }}" class="align-middle fw-bold text-center">
                                            {{ $totalScore }}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest/export.js"></script>

<script>
    const dataTable = new simpleDatatables.DataTable("#yourTableId", {
    perPage: 10,
    perPageSelect: [5, 10, 20, 50],
    columns: [
        { select: 0, sort: "asc" }
    ],
    searchable: true,
    fixedHeight: true,
    plugins: {
        export: {
            csv: true,
            xlsx: true,
            pdf: true
        }
    }
});

    document.querySelector("#btn-export-csv").addEventListener("click", () => {
        dataTable.export({
            type: "csv",
            download: true
        });
    });
    document.querySelector("#btn-export-xlsx").addEventListener("click", () => {
        dataTable.export({
            type: "xlsx",
            download: true
        });
    });
    document.querySelector("#btn-export-pdf").addEventListener("click", () => {
        dataTable.export({
            type: "pdf",
            download: true
        });
    });
</script> --}}
@endsection
