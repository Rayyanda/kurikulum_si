<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SubCPMK List</title>
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
        .highlight-success {
            background-color: #d4edda; /* Background color for success status */
        }
        .highlight-warning {
            background-color: #fff3cd; /* Background color for warning status */
        }
    </style>
</head>
<body>
    <h1>SubCPMK List</h1>
    <table>
        <thead>
            <tr>
                <th>CPMK Code</th>
                <th>CPMK Description</th>
                <th>SubCPMK Code</th>
                <th>SubCPMK Description</th>
                <th>CPL Code</th>
                <th>CPL Description</th>
                <th>Tahun Ajaran</th>
                <th>Semester</th>
                <th>Validation</th>
                <th>Validation Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcpmks as $subcpmk)
                <tr class="{{ $subcpmk->validation_status === 'telah direvisi' ? 'highlight-success' : ($subcpmk->validation_status === 'revisi' ? 'highlight-warning' : '') }}">
                    <td>{{ $subcpmk->cpmk ? $subcpmk->cpmk->code : 'N/A' }}</td>
                    <td>{{ $subcpmk->cpmk ? $subcpmk->cpmk->description : 'N/A' }}</td>
                    <td>{{ $subcpmk->code }}</td>
                    <td>{{ $subcpmk->description }}</td>
                    <td>{{ $subcpmk->cpmk && $subcpmk->cpmk->cpl ? $subcpmk->cpmk->cpl->code : 'N/A' }}</td>
                    <td>{{ $subcpmk->cpmk && $subcpmk->cpmk->cpl ? $subcpmk->cpmk->cpl->deskripsi : 'N/A' }}</td>
                    <td>{{ $subcpmk->tahun_ajaran }}</td>
                    <td>{{ ucfirst($subcpmk->semester) }}</td>
                    <td>
                        @if ($subcpmk->validation_status === 'telah direvisi')
                            <span>Telah Direvisi</span>
                        @elseif (Str::startsWith($subcpmk->validation_status, 'revisi'))
                            <span>{{ $subcpmk->validation_status }}</span>
                        @else
                            <span>Edit</span>
                        @endif
                    </td>
                    <td>
                        {{ $subcpmk->validation_note ?: 'No note provided' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
