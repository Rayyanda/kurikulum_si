<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPL-PL Matrix PDF</title>
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
        <h1>CPL-PL Matrix</h1>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>CPL</th>
                    @foreach($pls as $pl)
                        <th>{{ $pl->code }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($cpls as $cpl)
                    <tr style="height: 30px;">
                        <td style="padding: 5px;">{{ $cpl->code }}</td>
                        @foreach($pls as $pl)
                            <td style="padding: 5px;">
                                @if($cplpl->where('cpl_id', $cpl->id)->where('pl_id', $pl->id)->isNotEmpty())
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
    </div>
</body>
</html>
