@extends('layouts.app')

@section('content')
<div class="card shadow mb-4 m-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Pemenuhan MK Berdasarkan Semester</h6>
        <a href="{{ route('pdf.pemenuhan_cpl') }}" class="btn btn-primary">Cetak PDF</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">CPL</th>
                        @foreach($semesters as $semester)
                            <th scope="col">Semester {{ $semester }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($cplsWithMks as $cplData)
                        <tr>
                            <td>{{ $cplData['cpl']->code }}</td>
                            @foreach($semesters as $semester)
                                <td class="semester-{{ str_replace('.', '-', $semester) }}">
                                    @if(isset($cplData['mks'][$semester]))
                                        @foreach($cplData['mks'][$semester] as $mk)
                                            <div class="bubble">{{ $mk->mk->nama }}</div>
                                        @endforeach
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .bubble {
        display: inline-block;
        padding: 8px 12px; /* Tambahkan padding untuk memberikan ruang di dalam bubble */
        border-radius: 12px; /* Sesuaikan border-radius untuk tampilan bubble yang lebih halus */
        margin: 5px; /* Tambahkan margin agar bubble tidak terlalu dempet satu sama lain */
        background-color: #3490dc; /* Warna latar belakang default */
        color: white; /* Warna teks default */
        font-size: 0.9em; /* Ukuran font untuk bubble */
        white-space: nowrap; /* Mencegah teks membungkus ke baris berikutnya */
        text-overflow: ellipsis; /* Tambahkan elipsis jika teks terlalu panjang */
        overflow: hidden; /* Sembunyikan teks yang melebihi batas bubble */
    }

    /* Atur warna latar belakang untuk setiap semester */
    .semester-1 .bubble { background-color: #ff6347; } /* Tomato */
    .semester-2 .bubble { background-color: #6495ed; } /* Cornflower Blue */
    .semester-3 .bubble { background-color: #32cd32; } /* Lime Green */
    .semester-4 .bubble { background-color: #ff69b4; } /* Hot Pink */
    .semester-5 .bubble { background-color: #ff8c00; } /* Dark Orange */
    .semester-6 .bubble { background-color: #9400d3; } /* Dark Violet */
    .semester-7 .bubble { background-color: #4682b4; } /* Steel Blue */
    .semester-8 .bubble { background-color: #008080; } /* Teal */
</style>
@endpush
