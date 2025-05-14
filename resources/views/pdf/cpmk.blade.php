<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPMK List</title>
    <style>
        /* Tambahkan gaya CSS di sini sesuai kebutuhan Anda */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>CPMK List</h1>
    <table>
        <thead>
            <tr>
                <th>CPL Code</th>
                <th>CPL Description</th>
                <th>CPMK Code</th>
                <th>CPMK Description</th>
                <th>MK Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cpmks as $cpmk)
                <tr>
                    <td>{{ $cpmk->cpl ? $cpmk->cpl->code : 'N/A' }}</td>
                    <td>{{ $cpmk->cpl ? $cpmk->cpl->deskripsi : 'N/A' }}</td>
                    <td>{{ $cpmk->code }}</td>
                    <td>{{ $cpmk->description }}</td>
                    <td>{{ $cpmk->mk ? $cpmk->mk->kode : 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
