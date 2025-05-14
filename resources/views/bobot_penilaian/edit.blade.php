@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Bobot Penilaian</h1>
    <form action="{{ route('bobot_penilaian.update', $bobotPenilaian->id) }}" method="POST" id="bobotPenilaianForm">
        @method('PUT')
        @csrf

        <!-- Dropdown CPL -->
        <div class="form-group">
            <label for="cpl_id">CPL:</label>
            <select name="cpl_id" id="cpl_id" class="form-control" required>
                <option value="">-- Pilih CPL --</option>
                @foreach ($cpls as $cpl)
                    <option value="{{ $cpl->id }}" {{ $bobotPenilaian->cpl_id == $cpl->id ? 'selected' : '' }}>
                        {{ $cpl->kode }} - {{ $cpl->deskripsi }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="mk_id">Mata Kuliah</label>
            <select name="mk_id" id="mk_id" class="form-control" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach ($mks as $mk)
                    <option value="{{ $mk->id }}" {{ old('mk_id', $bobot_penilaian->mk_id ?? '') == $mk->id ? 'selected' : '' }}>
                        {{ $mk->nama }}
                    </option>
                @endforeach
            </select>
        </div>


        <!-- Dropdown CPMK -->
        <div class="form-group">
            <label for="cpmk_id">CPMK:</label>
            <select name="cpmk_id" id="cpmk_id" class="form-control" required>
                <option value="">-- Pilih CPMK --</option>
                @foreach ($cpmks as $cpmk)
                    <option value="{{ $cpmk->id }}" {{ $bobotPenilaian->cpmk_id == $cpmk->id ? 'selected' : '' }}>
                        {{ $cpmk->kode }} - {{ $cpmk->deskripsi }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown Tahun Ajaran -->
        <div class="form-group">
            <label for="tahun_ajaran">Tahun Ajaran:</label>
            <select name="tahun_ajaran" id="tahun_ajaran" class="form-control" required>
                <option value="">-- Pilih Tahun Ajaran --</option>
                @foreach (range(date('Y'), 2030) as $year)
                    <option value="{{ $year }}/{{ $year+1 }}" {{ $bobotPenilaian->tahun_ajaran == $year . '/' . ($year+1) ? 'selected' : '' }}>
                        {{ $year }}/{{ $year+1 }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown Semester -->
        <div class="form-group">
            <label for="semester">Semester:</label>
            <select name="semester" id="semester" class="form-control" required>
                <option value="">-- Pilih Semester --</option>
                <option value="Genap" {{ $bobotPenilaian->semester == 'Genap' ? 'selected' : '' }}>Genap</option>
                <option value="Ganjil" {{ $bobotPenilaian->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
            </select>
        </div>

        <!-- Input MBKM -->
        <div class="form-group">
            <label for="mbkm">MBKM:</label>
            <input type="text" class="form-control" id="mbkm" name="mbkm" value="{{ $bobotPenilaian->mbkm }}">
        </div>

        <!-- Input Nilai -->
        @php
            $nilai_fields = [
                'partisipasi' => 'Partisipasi',
                'observasi' => 'Observasi',
                'untuk_kerja' => 'Untuk Kerja',
                'tes_tulis_UTS' => 'Tes Tulis UTS',
                'tes_tulis_UAS' => 'Tes Tulis UAS',
                'tes_lisan_Tugas_Kelompok' => 'Tes Lisan Tugas Kelompok'
            ];
        @endphp

        @foreach ($nilai_fields as $name => $label)
            <div class="form-group">
                <label for="{{ $name }}">{{ $label }}:</label>
                <input type="number" class="form-control nilai" id="{{ $name }}" name="{{ $name }}" value="{{ $bobotPenilaian->$name }}" min="0" max="100" required>
            </div>
        @endforeach

        <!-- Input Total (Otomatis) -->
        <div class="form-group">
            <label for="total">Total:</label>
            <input type="number" class="form-control" id="total" name="total" value="{{ $bobotPenilaian->total }}" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Hitung total nilai otomatis
    $('.nilai').on('input', function() {
        var total = 0;
        $('.nilai').each(function() {
            var value = parseInt($(this).val()) || 0;
            total += value;
        });
        $('#total').val(total);
    });
});
</script>

@endsection
