<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar CPL, CPMK, dan MK berdasarkan Semester</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar CPL, CPMK, dan MK berdasarkan Semester</h1>
    <table>
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
                                    {{ $cpmk->mk->kode }}
                                @else
                                    -
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>
