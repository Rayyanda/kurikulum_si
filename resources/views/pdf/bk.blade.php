<!-- resources/views/pdf/bk_pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF BK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .btn-container {
            text-align: right;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar BK</h1>
        <div class="btn-container">
            <a href="{{ route('pdf.bk') }}" class="btn">Print as PDF</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Bahan Kajian</th>
                    <th>Deskripsi</th>
                    <th>Referensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bks as $key => $bk)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $bk->kode }}</td>
                    <td>{{ $bk->nama_bahan_kajian }}</td>
                    <td>{{ $bk->deskripsi }}</td>
                    <td>{{ $bk->referensi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
