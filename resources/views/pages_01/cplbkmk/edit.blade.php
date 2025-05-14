@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Matrix CPL-BK-MK</h1>
    <h3>tolong masukan data dengan format yang sesuai dengan data yang ada </h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cplbkmk.save') }}" method="POST">
        @csrf
        <div class="d-flex justify-content-between align-items-center mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        <div class="table-responsive"> <!-- Make table responsive -->
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
                                @php
                                    $cplBkMk = $cplBkMks->where('cpl_id', $cpl->id)->where('bk_id', $bk->id)->first();
                                @endphp
                                <td>
                                    <textarea class="form-control mk-textarea" name="matrix[{{ $cpl->id }}][{{ $bk->id }}]">{{ old('matrix.' . $cpl->id . '.' . $bk->id, $cplBkMk ? $cplBkMk->mk->nama : '') }}</textarea>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
$(document).ready(function() {
    $('.mk-textarea').each(function() {
        this.style.height = "auto";
        this.style.height = (this.scrollHeight) + "px";
    });

    $('.mk-textarea').on('input', function() {
        this.style.height = "auto";
        this.style.height = (this.scrollHeight) + "px";
    });

    $('.mk-textarea').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('cplbkmk.autocomplete') }}",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.nama,
                            value: item.nama
                        };
                    }));
                }
            });
        },
        minLength: 2
    });
});
</script>
@endsection
