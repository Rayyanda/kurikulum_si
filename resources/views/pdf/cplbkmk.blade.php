<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix CPL-BK-MK PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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
    <div class="header">
        <h1>Matrix CPL-BK-MK</h1>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>CPL</th>
                    @foreach($bks as $bk)
                        <th>{{ $bk->kode }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($cpls as $cpl)
                    <tr style="height: 30px;">
                        <td style="padding: 5px;">{{ $cpl->code }}</td>
                        @foreach($bks as $bk)
                            @php
                                $cplBkMk = $cplBkMks->where('cpl_id', $cpl->id)->where('bk_id', $bk->id)->first();
                            @endphp
                            <td style="padding: 5px;">{{ $cplBkMk ? $cplBkMk->mk->kode : '' }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
