@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Matrix CPL-PL</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('cplpl.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol simpan -->
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
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
                                <tr>
                                    <td>{{ $cpl->code }}</td>
                                    @foreach($pls as $pl)
                                        <td>
                                            <input type="checkbox" name="matrix[{{ $cpl->id }}][{{ $pl->id }}]"
                                                @if($cplpl->where('cpl_id', $cpl->id)->where('pl_id', $pl->id)->isNotEmpty()) checked @endif>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
