@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Matrix CPL-MK</h1>
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('cplmk.index') }}">CPL-MK</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="card shadow mb-3">
        <div class="card-body">
            <form action="{{ route('cplmk.update') }}" method="POST">
                @method('PUT')
                <button type="submit" class="btn btn-primary">Save</button>
                @csrf
                <div class="table-responsive p-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama MK</th>
                                @foreach($cpls as $cpl)
                                    <th>{{ $cpl->code }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mks as $mk)
                                <tr>
                                    <td>{{ $mk->nama }}</td>
                                    @foreach($cpls as $cpl)
                                        <td>
                                            <input type="checkbox" name="cpl_mk[{{ $cpl->id }}][{{ $mk->id }}]"
                                            {{ $matrix->where('cpl_id', $cpl->id)->where('mk_id', $mk->id)->isNotEmpty() ? 'checked' : '' }}>
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
