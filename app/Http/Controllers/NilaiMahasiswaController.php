<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiMahasiswa;
use App\Models\Mk;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NilaiMahasiswaImport;

class NilaiMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $mataKuliah = Mk::all();
        $selectedMataKuliah = $request->input('mata_kuliah_id');
    
        if ($selectedMataKuliah) {
            return redirect()->route('nilai_mahasiswa.show', $selectedMataKuliah);
        }
    
        return view('nilai_mahasiswa.index', compact('mataKuliah'));
    }

    public function show($kodeMataKuliah)
    {
        $mataKuliah = Mk::where('kode', $kodeMataKuliah)->firstOrFail();
        $nilaiMahasiswa = NilaiMahasiswa::where('mata_kuliah_id', $mataKuliah->kode)->get();
    
        return view('nilai_mahasiswa.show', compact('nilaiMahasiswa', 'mataKuliah'));
    }

    public function pilihMataKuliah()
    {
        $mataKuliah = Mk::all(); 
        return view('nilai_mahasiswa.pilih-mata-kuliah', compact('mataKuliah'));
    }

    public function nilaiMataKuliah(Request $request)
    {
        $request->validate([
            'mata_kuliah_id' => 'required|exists:mk,kode',
        ]);
    
        $mataKuliah = Mk::where('kode', $request->mata_kuliah_id)->firstOrFail();
        $nilaiMahasiswa = NilaiMahasiswa::where('mata_kuliah_id', $mataKuliah->kode)->get();
    
        return view('nilai_mahasiswa.index', compact('nilaiMahasiswa', 'mataKuliah')); 
    }

    public function destroy($Nim)
    {
        $nilaiMahasiswa = NilaiMahasiswa::where('Nim', $Nim)->firstOrFail();
        $nilaiMahasiswa->delete();
        return redirect()->route('nilai_mahasiswa.index')->with('success', 'Nilai mahasiswa berhasil dihapus');
    }

    public function create()
    {
        $mataKuliah = Mk::all();
        return view('nilai_mahasiswa.create', compact('mataKuliah'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Nama' => 'required|string',
            'Nim' => 'required|string', // Ensure Nim is treated as a string
            'mata_kuliah_id' => 'required|exists:mk,kode',
            'CLO1' => 'nullable|numeric',
            'CLO2' => 'nullable|numeric',
            'CLO3' => 'nullable|numeric',
            'CLO4' => 'nullable|numeric',
            'CLO5' => 'nullable|numeric',
            'bobot_CLO1' => 'nullable|numeric|min:0|max:100',
            'bobot_CLO2' => 'nullable|numeric|min:0|max:100',
            'bobot_CLO3' => 'nullable|numeric|min:0|max:100',
            'bobot_CLO4' => 'nullable|numeric|min:0|max:100',
            'bobot_CLO5' => 'nullable|numeric|min:0|max:100',
            'aspek_CLO1' => 'nullable|string',
            'aspek_CLO2' => 'nullable|string',
            'aspek_CLO3' => 'nullable|string',
            'aspek_CLO4' => 'nullable|string',
            'aspek_CLO5' => 'nullable|string',
        ]);
        $data['aspek_CLO1'] = $data['aspek_CLO1'] ?? '';
    $data['aspek_CLO2'] = $data['aspek_CLO2'] ?? '';
    $data['aspek_CLO3'] = $data['aspek_CLO3'] ?? '';
    $data['aspek_CLO4'] = $data['aspek_CLO4'] ?? '';
    $data['aspek_CLO5'] = $data['aspek_CLO5'] ?? '';
        // Ensure that `CLO1` and other fields are present in $data
        // Default values if missing
        $data['CLO1'] = $data['CLO1'] ?? 0;
        $data['CLO2'] = $data['CLO2'] ?? 0;
        $data['CLO3'] = $data['CLO3'] ?? 0;
        $data['CLO4'] = $data['CLO4'] ?? 0;
        $data['CLO5'] = $data['CLO5'] ?? 0;
        
        // Default values for bobot
        $data['bobot_CLO1'] = $data['bobot_CLO1'] ?? 0;
        $data['bobot_CLO2'] = $data['bobot_CLO2'] ?? 0;
        $data['bobot_CLO3'] = $data['bobot_CLO3'] ?? 0;
        $data['bobot_CLO4'] = $data['bobot_CLO4'] ?? 0;
        $data['bobot_CLO5'] = $data['bobot_CLO5'] ?? 0;
        
        // Calculate total bobot
        $totalBobot = $data['bobot_CLO1'] + $data['bobot_CLO2'] + $data['bobot_CLO3'] + $data['bobot_CLO4'] + $data['bobot_CLO5'];
    
        // Calculate nilai akhir
        $nilaiAkhir = $totalBobot > 0 ? (
            ($data['CLO1'] * $data['bobot_CLO1']) +
            ($data['CLO2'] * $data['bobot_CLO2']) +
            ($data['CLO3'] * $data['bobot_CLO3']) +
            ($data['CLO4'] * $data['bobot_CLO4']) +
            ($data['CLO5'] * $data['bobot_CLO5'])
        ) / $totalBobot : 0;
    
        // Determine nilai huruf
        if ($nilaiAkhir <= 40.00) {
            $nilaiHuruf = 'E';
        } elseif ($nilaiAkhir <= 50.00) {
            $nilaiHuruf = 'D';
        } elseif ($nilaiAkhir <= 60.00) {
            $nilaiHuruf = 'C';
        } elseif ($nilaiAkhir <= 65.00) {
            $nilaiHuruf = 'B+';
        } elseif ($nilaiAkhir <= 70.00) {
            $nilaiHuruf = 'A-';
        } else {
            $nilaiHuruf = 'A';
        }
    
        // Add calculated values to data array
        $data['NilaiAkhir'] = $nilaiAkhir;
        $data['NilaiHuruf'] = $nilaiHuruf;
    
        // Create new record
        NilaiMahasiswa::create($data);
    
        // Redirect with success message
        return redirect()->route('nilai_mahasiswa.index')->with('success', 'Nilai mahasiswa berhasil ditambahkan');
    }
    

    
    
    

    public function edit($Nim)
    {
        $nilaiMahasiswa = NilaiMahasiswa::where('Nim', $Nim)->firstOrFail();
        $mataKuliah = Mk::all();
        return view('nilai_mahasiswa.edit', compact('nilaiMahasiswa', 'mataKuliah'));
    }

    public function update(Request $request, $Nim)
    {
        $data = $request->validate([
            'Nama' => 'required|string',
            'Nim' => 'required|string', // Nim should be string
            'mata_kuliah_id' => 'required|exists:mk,kode',
            'CLO1' => 'nullable|numeric',
            'CLO2' => 'nullable|numeric',
            'CLO3' => 'nullable|numeric',
            'CLO4' => 'nullable|numeric',
            'CLO5' => 'nullable|numeric',
            'bobot_clo1' => 'nullable|numeric',
            'bobot_clo2' => 'nullable|numeric',
            'bobot_clo3' => 'nullable|numeric',
            'bobot_clo4' => 'nullable|numeric',
            'bobot_clo5' => 'nullable|numeric',
            'aspek_clo1' => 'nullable|string',
            'aspek_clo2' => 'nullable|string',
            'aspek_clo3' => 'nullable|string',
            'aspek_clo4' => 'nullable|string',
            'aspek_clo5' => 'nullable|string',
        ]);
    
        $totalBobot = $data['bobot_clo1'] + $data['bobot_clo2'] + $data['bobot_clo3'] + $data['bobot_clo4'] + $data['bobot_clo5'];
        $nilaiAkhir = $totalBobot > 0 ? (
            ($data['CLO1'] * $data['bobot_clo1']) +
            ($data['CLO2'] * $data['bobot_clo2']) +
            ($data['CLO3'] * $data['bobot_clo3']) +
            ($data['CLO4'] * $data['bobot_clo4']) +
            ($data['CLO5'] * $data['bobot_clo5'])
        ) / $totalBobot : 0;
    
        if ($nilaiAkhir <= 40.00) {
            $nilaiHuruf = 'E';
        } elseif ($nilaiAkhir <= 50.00) {
            $nilaiHuruf = 'D';
        } elseif ($nilaiAkhir <= 60.00) {
            $nilaiHuruf = 'C';
        } elseif ($nilaiAkhir <= 65.00) {
            $nilaiHuruf = 'B+';
        } elseif ($nilaiAkhir <= 70.00) {
            $nilaiHuruf = 'A-';
        } else {
            $nilaiHuruf = 'A';
        }
    
        $data['NilaiAkhir'] = $nilaiAkhir;
        $data['NilaiHuruf'] = $nilaiHuruf;
    
        $nilaiMahasiswa = NilaiMahasiswa::where('Nim', $Nim)
                                        ->where('mata_kuliah_id', $data['mata_kuliah_id'])
                                        ->firstOrFail();
        $nilaiMahasiswa->update($data);
    
        return redirect()->route('nilai_mahasiswa.index')->with('success', 'Nilai mahasiswa berhasil diperbarui');
    }
    
    public function downloadPdf()
    {
        $nilaiMahasiswa = NilaiMahasiswa::all();
        $pdf = PDF::loadView('nilai_mahasiswa.pdf', compact('nilaiMahasiswa'));
        return $pdf->download('nilai_mahasiswa.pdf');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new NilaiMahasiswaImport, $request->file('file'));

        return redirect()->route('nilai_mahasiswa.index')->with('success', 'Data nilai mahasiswa berhasil diimpor');
    }
}
