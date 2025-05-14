<!DOCTYPE html>
<html>
<head>
    <title>Daftar CPL</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Daftar CPL</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Profesi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $counter = 1;
            @endphp
            @foreach($cpls as $cpl)
            <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $cpl->code }}</td>
                <td>{{ $cpl->deskripsi }}</td>
                <td>{{ $cpl->kategori }}</td>
                <td>{{ $cpl->profesi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
