<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix BK-MK PDF</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Matrix BK-MK</h1>
    <table>
        <thead>
            <tr>
                <th>BK</th>
                @foreach($bks as $bk)
                    <th>{{ $bk->kode }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($mks as $mk)
                <tr>
                    <td>{{ $mk->nama }}</td>
                    @foreach($bks as $bk)
                        <td>
                            @if($matrix->where('bk_id', $bk->id)->where('mk_id', $mk->id)->isNotEmpty())
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
