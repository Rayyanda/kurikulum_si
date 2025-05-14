@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Edit Matriks Penilaian CPMK</h2>
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('penilaian.index') }}">Penilaian</a></li>
          <li class="breadcrumb-item"><a href="{{ route('penilaian.matriks') }}">Matriks Penilaian</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Matriks Penilaian</li>
        </ol>
    </nav>
    <div class="card mb-3 shadow">

        <div class="card-body">
            <form action="{{ route('penilaian.matriks.update') }}" method="post">
                @csrf
                <div class="table-responsive p-2">
                    <button type="submit" class="btn btn-success mb-2">Simpan Perubahan</button>

                    <table class="table table-bordered border-1">
                        <thead>
                            <tr class="text-center bg-warning" >
                                <th>CPL</th>
                                <th>MK</th>
                                <th>CPMK</th>
                                @foreach ($jps as $item)
                                    <th>{{ $item->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($cpmk as $item)
                                <tr>
                                    <td>{{ $item->cpl->code }}</td>
                                    <td>{{ $item->mk->nama }}</td>
                                    <td>{{ $item->code }}</td>
                                    @foreach ($jps as $jp)
                                        <td>
                                            @php
                                                $jtps = $jtp->where('jenis_penilaian_id',$jp->id)->where('cpmk_id',$item->id)->first();
                                            @endphp
                                            <input type="checkbox" class="form-input-check" id="cid[{{ $jp->id }}][{{ $item->id }}]" name="jtp[{{ $jp->id }}][{{ $item->id }}]"
                                            {{ $jtp->where('jenis_penilaian_id',$jp->id)->where('cpmk_id',$item->id)->isNotEmpty() ? 'checked' : '' }}
                                            >
                                            <input type="number" placeholder="skor" value="{{ old("scores." . $jp->id . '.' . $item->id, $jtps ? $jtps->score : '') }}" name="scores[{{ $jp->id }}][{{ $item->id }}]" id="" class="form-control form-control-sm">
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <small class="text-danger"><i class="fa fa-exclamation"></i> Centang dan Isi skor pada indeks yang tepat !</small>
                    <small class="text-secondary"><i class="fa fa-info-circle"></i> Tambahkan data CPMK untuk lebih banyak</small>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
