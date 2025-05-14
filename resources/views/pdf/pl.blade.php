<!DOCTYPE html>
<html>
<head>
    <title>Daftar PL</title>
    <style>
        /* Atur gaya CSS di sini */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Daftar PL</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pls as $key => $pl)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $pl->code }}</td>
                <td>{{ $pl->deskripsi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
