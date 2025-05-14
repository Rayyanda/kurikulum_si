<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi SubCPMK List</title>
    <style>
        /* CSS styling */
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
    <h1>Transaksi SubCPMK List</h1>
    <table>
        <thead>
            <tr>
                <th>MK</th>
                <th>CPMK</th>
                <th>SubCPMK</th>
                <th>Deskripsi SubCPMK</th>
                <th>Bobot</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi_subcpmks as $transaksi_subcpmk)
                <tr>
                    <td>{{ $transaksi_subcpmk->mk->kode }}</td>
                    <td>{{ $transaksi_subcpmk->cpmk->code }}</td>
                    <td>{{ $transaksi_subcpmk->subcpmk->code }}</td>
                    <td>{{ $transaksi_subcpmk->subcpmk->description }}</td>
                    <td>{{ $transaksi_subcpmk->bobot }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
