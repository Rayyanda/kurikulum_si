@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create SubCPMK</h1>
    <form action="{{ route('sub_cpmk.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="mk_id">MK</label>
            <select name="mk_id" id="mk_id" class="form-control" required>
                <option value="">Select MK</option>
                @foreach ($mks as $mk)
                    <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cpmk_id">CPMK</label>
            <select name="cpmk_id" id="cpmk_id" class="form-control" required>
                <option value="">Select CPMK</option>
            </select>
        </div>
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" name="code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="tahun_ajaran">Tahun Ajaran</label>
            <select name="tahun_ajaran" id="tahun_ajaran" class="form-control" required>
                <option value="">Select Tahun Ajaran</option>
                @foreach ($tahunAjaranOptions as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <select name="semester" id="semester" class="form-control" required>
                <option value="">Select Semester</option>
                @foreach ($semesterOptions as $option)
                    <option value="{{ $option }}">{{ ucfirst($option) }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    document.getElementById('mk_id').addEventListener('change', function() {
        var mk_id = this.value;
        fetch('{{ route('sub_cpmk.get_cpmks', '') }}/' + mk_id)
            .then(response => response.json())
            .then(data => {
                var cpmkSelect = document.getElementById('cpmk_id');
                cpmkSelect.innerHTML = '<option value="">Select CPMK</option>';
                data.forEach(function(cpmk) {
                    cpmkSelect.innerHTML += '<option value="' + cpmk.id + '">' + cpmk.code + ' - ' + cpmk.description + '</option>';
                });
            });
    });
</script>
@endsection
