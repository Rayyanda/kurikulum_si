<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rumusan Nilai Akhir MK</title>
</head>
<body>
    <style>
        .table-pdf {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .table-pdf th, .table-pdf td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
        }

        .table-pdf th {
            background-color: orange;
            font-weight: bold;
        }
        .text-center{
            text-align: center;
        }
        </style>
        <h4 class="text-center">Rumusan Nilai Akhir MK</h4>
    <table class="table-pdf" id="nilaiAkhir">
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
</body>
</html>
