@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Rumusan Nilai Akhir CPL</h2>
    @role('kaprodi')
    <a href="{{ route('nilai_akhir_mk.createCPL') }}" class="btn btn-primary mb-3">Tambah Nilai Akhir CPL</a>
    @endrole
    <table class="table">
        <thead>
            <tr>
                <th scope="col">CPL</th>
                <th scope="col">MK</th>
                <th scope="col">CPMK</th>
                <th scope="col">Skor</th>
                @role('Kaprodi')
                <th scope="col">Aksi</th>
                @endrole
            </tr>
        </thead>
        <tbody>
            @php $currentCPL = null; @endphp
            @foreach($nilaiAkhirMks as $nilaiAkhirMk)
                @if($currentCPL !== $nilaiAkhirMk->cpl)
                    @if($currentCPL !== null)
                        <tr>
                            <td colspan="4" class="text-right font-weight-bold">Total Skor:</td>
                            <td class="font-weight-bold">{{ $totals[$currentCPL]->total_skor ?? 0 }}</td>
                        </tr>
                    @endif
                    @php $currentCPL = $nilaiAkhirMk->cpl; @endphp
                @endif
                <tr>
                    <td>{{ $nilaiAkhirMk->cpl }}</td>
                    <td>{{ $nilaiAkhirMk->mk }}</td>
                    <td>{{ $nilaiAkhirMk->cpmk }}</td>
                    <td>{{ $nilaiAkhirMk->skor }}</td>
                    <td>
                        @role('Kaprodi')
                        <a href="{{ route('nilai_akhir_mk.editCPL', $nilaiAkhirMk->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('nilai_akhir_mk.destroyCPL', $nilaiAkhirMk->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                        @endrole
                    </td>
                </tr>
            @endforeach
            @if($currentCPL !== null)
                <tr>
                    <td colspan="4" class="text-right font-weight-bold">Total Skor:</td>
                    <td class="font-weight-bold">{{ $totals[$currentCPL]->total_skor ?? 0 }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
