@extends('layouts.app')

@section('content')
<div class="card shadow mb-4 m-2">
<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Organisasi MK Berdasarkan Semester</h6>
        <a href="{{ route('pdf.organisasi-mk') }}" class="btn btn-primary">Cetak PDF</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>MK Wajib</th>
                        <th>MK Pilihan</th>
                        <th>MK Wajib Umum</th>
                        <th>Total SKS</th>
                        <th>Total MK</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $semester => $mkData)
                        <tr>
                            <td>{{ $semester }}</td>
                            <td>
                                @foreach($mkData['wajib'] as $mk)
                                    <div style="border: 1px solid #ccc; padding: 5px; margin-bottom: 5px; border-radius: 5px; background-color: #56cfe1;">
                                        {{ $mk->nama }}
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @foreach($mkData['pilihan'] as $mk)
                                    <div style="border: 1px solid #ccc; padding: 5px; margin-bottom: 5px; border-radius: 5px; background-color: #38b000;">
                                        {{ $mk->nama }}
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @foreach($mkData['wajib_umum'] as $mk)
                                    <div style="border: 1px solid #ccc; padding: 5px; margin-bottom: 5px; border-radius: 5px; background-color: #eeef20;">
                                        {{ $mk->nama }}
                                    </div>
                                @endforeach
                            </td>
                            <td>{{ $mkData['total_sks'] }}</td>
                            <td>{{ $mkData['total_mk'] }}</td>
                            <td>
                                <a href="{{ route('mk.index') }}" class="btn btn-info btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
