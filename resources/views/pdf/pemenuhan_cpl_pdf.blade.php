<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemenuhan CPL PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            margin: 0 auto;
            width: 80%;
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
    <div class="header">
        <h1>Pemenuhan CPL</h1>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>CPL</th>
                    @foreach($semesters as $semester)
                        <th>Semester {{ $semester }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($cplsWithMks as $cplData)
                    <tr>
                        <td>{{ $cplData['cpl']->code }}</td>
                        @foreach($semesters as $semester)
                            <td>
                                @if(isset($cplData['mks'][$semester]))
                                    @foreach($cplData['mks'][$semester] as $mk)
                                        {{ $mk->mk->nama }}<br>
                                    @endforeach
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
