@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Update Matrix CPL-BK</h1>
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('cplbk.index') }}">CPL-BK</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <!-- Tombol Update Matrix di atas -->
    <form method="POST" action="{{ route('cplbk.update') }}">
        @csrf
        @method('PUT')

        <!-- Tombol Update -->
        <button type="submit" class="btn btn-success mb-3">Update Matrix</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>CPL</th>
                    @foreach($bks as $bk)
                        <th>{{ $bk->kode }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($cpls as $cpl)
                    <tr>
                        <td>{{ $cpl->code }}</td>
                        @foreach($bks as $bk)
                            <td>
                                <input type="checkbox" name="matrix[{{ $cpl->id }}][]" value="{{ $bk->id }}"
                                    {{ $matrix->where('cpl_id', $cpl->id)->where('bk_id', $bk->id)->isNotEmpty() ? 'checked' : '' }}>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>
@endsection
