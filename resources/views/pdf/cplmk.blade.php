<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix CPL-MK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px; /* Ukuran font lebih kecil untuk PDF */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 4px; /* Kurangi padding untuk menghemat ruang */
            text-align: center; /* Pusatkan teks */
        }
        th {
            background-color: #f2f2f2;
        }
        .checked {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Matrix CPL-MK</h1>
    <table>
        <thead>
            <tr>
                <th>Nama MK</th>
                @foreach($cpls as $cpl)
                    <th>{{ $cpl->code }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($mks as $mk)
                <tr>
                    <td>{{ $mk->nama }}</td>
                    @foreach($cpls as $cpl)
                        <td class="checked">
                            @if($matrix->where('cpl_id', $cpl->id)->where('mk_id', $mk->id)->isNotEmpty())
                               <input type="checkbox" checked disabled class="checkbox-black">
                                    <!-- Mengatur warna hitam -->
                                @else
                                    <input type="checkbox" disabled class="checkbox-hidden">
                                @endif
                           
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
