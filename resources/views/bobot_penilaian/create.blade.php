@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Bobot Penilaian</h1>
    <div class="card shadow mb-3">
        <div class="card-body">

            <form action="{{ route('bobot_penilaian.store') }}" method="POST" id="bobotPenilaianForm">
                @csrf
                <!-- Dropdown CPL -->
                <div class="form-group">
                    <label for="cpl_id">CPL:</label>
                    <select name="cpl_id" id="cpl_id" class="form-control" required>
                        <option value="">-- Pilih CPL --</option>
                        @foreach ($cpls as $cpl)
                            <option value="{{ $cpl->id }}">{{ $cpl->code }} - {{ $cpl->deskripsi }}</option>
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
                            <option value="{{ $cpmk->id }}">{{ $cpmk->code }} - {{ $cpmk->description }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Dropdown Tahun Ajaran -->
                <div class="form-group">
                    <label for="tahun_ajaran">Tahun Ajaran:</label>
                    <select name="tahun_ajaran" id="tahun_ajaran" class="form-control" required>
                        <option value="">-- Pilih Tahun Ajaran --</option>
                        @for ($year = 2024; $year <= 2029; $year++)
                            <option value="{{ $year }}/{{ $year + 1 }}">{{ $year }}/{{ $year + 1 }}</option>
                        @endfor
                    </select>
                </div>

                <!-- Dropdown Semester -->
                <div class="form-group">
                    <label for="semester">Semester:</label>
                    <select name="semester" id="semester" class="form-control" required>
                        <option value="">-- Pilih Semester --</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                </div>

                <!-- Input MBKM -->
                <div class="form-group">
                    <label for="mbkm">MBKM:</label>
                    <input type="text" class="form-control" id="mbkm" name="mbkm">
                </div>

                <!-- Input Nilai -->
                <div class="form-group">
                    <label for="partisipasi">Partisipasi:</label>
                    <input type="number" class="form-control nilai" id="partisipasi" name="partisipasi" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label for="observasi">Observasi:</label>
                    <input type="number" class="form-control nilai" id="observasi" name="observasi" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label for="untuk_kerja">Untuk Kerja:</label>
                    <input type="number" class="form-control nilai" id="untuk_kerja" name="untuk_kerja" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label for="tes_tulis_UTS">Tes Tulis UTS:</label>
                    <input type="number" class="form-control nilai" id="tes_tulis_UTS" name="tes_tulis_UTS" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label for="tes_tulis_UAS">Tes Tulis UAS:</label>
                    <input type="number" class="form-control nilai" id="tes_tulis_UAS" name="tes_tulis_UAS" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label for="tes_lisan_Tugas_Kelompok">Tes Lisan Tugas Kelompok:</label>
                    <input type="number" class="form-control nilai" id="tes_lisan_Tugas_Kelompok" name="tes_lisan_Tugas_Kelompok" min="0" max="100" required>
                </div>

                <!-- Input Total (Otomatis) -->
                <div class="form-group">
                    <label for="total">Total:</label>
                    <input type="number" class="form-control" id="total" name="total" readonly>
                </div>


                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<!-- Script untuk Hitung Total -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Hitung total secara otomatis
        $('.nilai').on('input', function() {
            var partisipasi = parseFloat($('#partisipasi').val()) || 0;
            var observasi = parseFloat($('#observasi').val()) || 0;
            var untukKerja = parseFloat($('#untuk_kerja').val()) || 0;
            var tesTulisUTS = parseFloat($('#tes_tulis_UTS').val()) || 0;
            var tesTulisUAS = parseFloat($('#tes_tulis_UAS').val()) || 0;
            var tesLisan = parseFloat($('#tes_lisan_Tugas_Kelompok').val()) || 0;

            var total = partisipasi + observasi + untukKerja + tesTulisUTS + tesTulisUAS + tesLisan;
            $('#total').val(total);
        });
    });
</script>
@endsection
