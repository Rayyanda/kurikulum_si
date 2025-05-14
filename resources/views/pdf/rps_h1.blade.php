<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPS Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            page-break-inside: auto; /* Default */
        }
        tr {
            page-break-inside: avoid; /* Hindari pemotongan baris */
            /* page-break-after: auto; */
        }
        table, th, td {
            border: 1px solid black;
        }
        p{
            margin:0px;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .ctr{
            margin: 0px auto;
        }
        .text-center {
            text-align: center;
        }
        .nama-ttd{
            min-height: 120px;
            border: solid 1px white;
            text-align: center;
        }

        .tbl-kor{
            margin: 5px auto;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th><img src="{{ asset('img/logo.jpg') }}" style="max-width: 75px;margin:0px;" alt=""></th>
            <th colspan="5" class="text-center" >UNIVERSITAS DARMA PERSADA <br>FAKULTAS TEKNIK <br> PROGRAM STUDI SISTEM INFORMASI</th>
            <th>{{ $rps->kode_dokumen }}</th>
        </tr>
        <tr>
            <td colspan="7" class="text-center">RENCANA PEMBELAJARAN SEMESTER</td>
        </tr>
        <tr>
            <th>MATA KULIAH (MK)</th>
            <th>KODE</th>
            <th>Bahan Kajian (BK)</th>
            <th>BOBOT (sks)</th>
            <th>SEMESTER</th>
            <th colspan="2" >Tanggal Penyusunan</th>
        </tr>
        <tr>
            <td>{{ $rps->mk->nama }}</td>
            <td>{{ $rps->mk->kode }}</td>
            <td>
                @foreach ($rps->mk->bks as $item)
                {{ $item->nama_bahan_kajian }}
                @endforeach
            </td>

            <td>{{ $rps->mk->sks }}</td>
            <td>{{ $rps->mk->semester }}</td>
            <td colspan="2">{{ $rps->tanggal_penyusunan }}</td>
        </tr>
        <tr>
            <th>PENGESAHAN</th>
            <th colspan="2" >Dosen Pengembang RPS</th>
            <th >Kaprodi</th>
            <th colspan="3" >Dekan FT</th>

        </tr>
        <tr>
            <td></td>
            <td colspan="2" >
                <img src="{{ asset('storage/penyimpanan/dosen/sign/'.$rps->dsn_pengembang->qr_sign) }}" class="ctr" alt="">
                <p class="text-center" >{{ $rps->dsn_pengembang->nama }}</p></td>
            <td>
                <img src="{{ asset('storage/penyimpanan/dosen/sign/'.$rps->dsn_kaprodi->qr_sign) }}" class="ctr" alt="">
                <p class="text-center" >{{ $rps->dsn_kaprodi->nama }}</p>
            </td>
            <td colspan="3" >
                <img src="{{ asset('storage/penyimpanan/dosen/sign/'.$rps->dsn_dekan->qr_sign) }}" class="ctr" alt="">
                <p class="text-center" >{{ $rps->dsn_dekan->nama }}</p>
            </td>
        </tr>

    </table>

    <table>
        <tbody>
            <tr>
                <th colspan="7">Capaian Pembelajaran</th>
            </tr>
            <tr>
                <th colspan="7" >CPL-PRODI yang dibebankan pada MK</th>
            </tr>
            @foreach ($rps->rpscpl as $item)
            <tr>
                <td>{{ $item->cpl->code }}</td>
                <td colspan="6">{{ $item->cpl->deskripsi }}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="7">Capaian Pembelajaran Mata Kullah (CPMK)</th>
            </tr>
            @foreach ($rps->rpscpl as $item)
                @foreach ($item->cpl->cpmk as $cpmk)
                @if ($rps->mk_id === $cpmk->mk_id)
                <tr>
                    <td>{{ $cpmk->code }}</td>
                    <td colspan="6">{{ $cpmk->description }}</td>
                </tr>
                @endif

                @endforeach
            @endforeach
        </tbody>
    </table>

    <table>
        <tbody>


            <tr>
                <th colspan="7">Kemampuan akhir tiap tahapan belajar (Sub-CPMK)</th>
            </tr>
            @foreach ($rps->rpscpl as $item)
            @foreach ($item->cpl->cpmk as $cpmk)
            @foreach ($cpmk->subcpmks as $subcpmk)
            @if ($subcpmk->mk_id === $rps->mk_id)
            <tr>
                <td>{{ $subcpmk->code }}</td>
                <td colspan="6">{{ $subcpmk->description }}</td>
            </tr>
            @endif
            @endforeach
            @endforeach
            @endforeach
            <tr>
                <th colspan="2">Korelasi CPMK terhadap Sub-CPMK</th>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td colspan="7">
                    <table class="tbl-kor" >
                        <tbody>
                            <tr>
                                <td></td>
                                @foreach ($rps->rpscpl as $item)
                                @foreach ($item->cpl->cpmk as $cpmk)
                                @foreach ($cpmk->subcpmks as $subcpmk)
                                @if ($subcpmk->mk_id === $rps->mk_id)
                                    <td>{{ $subcpmk->code }}</td>
                                @endif
                                @endforeach
                                @endforeach
                                @endforeach
                            </tr>
                            @foreach ($rps->rpscpl as $item)
                                @foreach ($item->cpl->cpmk as $cpmk)
                                @if ($rps->mk_id === $cpmk->mk_id)
                                <tr>
                                    <td>{{ $cpmk->code }}</td>
                                    @foreach ($rps->rpscpl as $item)
                                    @foreach ($item->cpl->cpmk as $cpmk)
                                    @foreach ($cpmk->subcpmks as $subcpmk)
                                    @if ($subcpmk->mk_id === $rps->mk_id)
                                        <td>{!! $subcpmk->description ? '<span>&#x2714;</span>' : ''  !!}</td>
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                </tr>
                                @endif

                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>

        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td colspan="1"><b>Deskripsi Singkat MK</b></td>
                <td colspan="6">{{ $rps->deskripsi_mk }}</td>
            </tr>
            <tr>
                <td colspan="1"><b>Bahan Kajian:</b><br>Materi Pembelajaran</td>
                <td colspan="6">
                    <ol>
                        @foreach ($rps->mk->bks as $item)
                            <li>{{ $item->deskripsi }}</li>
                        @endforeach
                    </ol>
                </td>
            </tr>
            <tr>
                <td colspan="1" rowspan="4"><b>Pustaka</b></td>
                <th colspan="1">Utama :</th>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td colspan="6">{{ $rps->pustaka_utama }}</td>
            </tr>
            <tr>
                <th colspan="1">Pendukung :</th>
                <td colspan="5">{{ $rps->pustaka_pendukung }}</td>
            </tr>
            <tr>
                <td colspan="6">{{ $rps->pustaka_pendukung }}</td>
            </tr>
            <tr>
                <td colspan="1"><b>Dosen Pengampu</b></td>
                <td colspan="6">{{ $rps->dsn_pengampu->nama }}</td>
            </tr>
            <tr>
                <td colspan="1"><b>Mata Kuliah Prasyarat</b></td>
                <td colspan="6"><i>{{ $rps->pra_mk_id->nama ?? 'Tidak Ada' }}</i></td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped table-bordered">
        <thead>
            <tr class="text-center align-items-center">
                <th class="week-col">Minggu Ke-</th>
                <th class="ability-col">Kemampuan aktivit tiap tahapan belajar (Sub-CPMK)</th>
                <th class="indicator-col">Indikator</th>
                <th class="criteria-col">Kriteria & Bentuk Penilaian</th>
                <th colspan="2">Bentuk Pembelajaran; Metode Pembelajaran; Penugasan Mahasiswa; [Estimasi Waktu]</th>
                <th class="material-col">Materi Pembelajaran [Pustaka]</th>
                <th class="weight-col">Bobot Penilaian (%)</th>
            </tr>
            <tr>
                <th class="text-center">(1)</th>
                <th class="text-center">(2)</th>
                <th class="text-center">(3)</th>
                <th class="text-center">(4)</th>
                <th class="text-center">(5)</th>
                <th class="text-center">(6)</th>
                <th class="text-center">(7)</th>
                <th class="text-center">(8)</th>

            </tr>
        </thead>
        <tbody>
           @foreach ($rps->jadwalRps as $item)
               <tr>

                <td>{{ $item->minggu_ke }}</td>
                <td>{{ $item->sub_cpmk->description }}</td>
                <td>{{ $item->indikator }}</td>
                <td>

                    @foreach ($item->kriteria as $rubrik)
                        <ul>
                            <li>{{ $rubrik->jenis_rubrik }}</li>
                        </ul>
                    @endforeach
                </td>
                <td>{{ $item->bentuk_pembelajaran }}</td>
                <td>{{ $item->metode_pembelajaran }}</td>
                <td>{{ $item->materi_pembelajaran }}</td>
                <td>{{ $item->bobot_penilaian }}</td>

               </tr>
               @if ($item->minggu_ke == 7)
                   <tr>
                    <td colspan="8">Evaluasi Tengah Semester / Ujian Tengah Semester</td>
                   </tr>
               @endif
               @if ($item->minggu_ke == 15)
                   <tr>
                    <td colspan="8">Evaluasi Akhir Semester / Ujian Akhir Semester</td>
                   </tr>
               @endif

           @endforeach
        </tbody>
    </table>
</body>
</html>
