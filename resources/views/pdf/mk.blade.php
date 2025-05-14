<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MK List</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>MK List</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mks as $index => $mk)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mk->nama }}</td>
                <td>{{ $mk->sks }}</td>
                <td>{{ $mk->semester }}</td>
                <td>{{ $mk->kategori }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
