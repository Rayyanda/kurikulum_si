@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Matrix BK-MK</h1>
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('BkMk.index') }}">BK-MK</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit BK-MK</li>
        </ol>
    </nav>
    <div class="card mb-3 shadow">
        <div class="card-body">

            <form method="POST" action="{{ route('BkMk.update') }}">
            <button type="submit" class="btn btn-success">Update Matrix</button>
                @csrf
                @method('PUT')
                <div class="table-responsive p-2">
                    <table class="table table-bordered table-striped table-striped-columns">
                        <thead>
                            <tr>
                                <th>MK</th>
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
                                            <input type="checkbox" name="matrix[{{ $bk->id }}][]" value="{{ $mk->id }}"
                                                {{ $matrix->where('bk_id', $bk->id)->where('mk_id', $mk->id)->isNotEmpty() ? 'checked' : '' }}>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-success">Update Matrix</button>
            </form>
        </div>
    </div>
</div>
@endsection
