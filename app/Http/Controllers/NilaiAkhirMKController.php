<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiAkhirMK;
use Illuminate\Support\Facades\DB; // Pastikan facade DB diimpor

class NilaiAkhirMKController extends Controller
{
    public function indexMK()
    {
        $nilaiAkhirMks = NilaiAkhirMK::all();
        $totals = NilaiAkhirMK::select('mk', DB::raw('SUM(skor) as total_skor'))
                    ->groupBy('mk')
                    ->get()
                    ->keyBy('mk');
        return view('nilai_akhir_mk.indexMK', compact('nilaiAkhirMks', 'totals'));
    }
    
    public function indexCPL()
    {
        $nilaiAkhirMks = NilaiAkhirMK::all();
        $totals = NilaiAkhirMK::select('cpl', DB::raw('SUM(skor) as total_skor'))
                    ->groupBy('cpl')
                    ->get()
                    ->keyBy('cpl');
        return view('nilai_akhir_mk.indexCPL', compact('nilaiAkhirMks', 'totals'));
    }
    
    
    public function createMK()
    {
        return view('nilai_akhir_mk.createMK');
    }
    
    public function storeMK(Request $request)
    {
        $request->validate([
            'mk' => 'required|string',
            'cpl' => 'required|string',
            'cpmk' => 'required|string',
            'skor' => 'required|integer',
        ]);
    
        NilaiAkhirMK::create([
            'mk' => $request->mk,
            'cpl' => $request->cpl,
            'cpmk' => $request->cpmk,
            'skor' => $request->skor,
        ]);
    
        return redirect()->route('nilai_akhir_mk.indexMK')->with('success', 'Nilai akhir MK berhasil disimpan.');
    }
    
    public function editMK($id)
    {
        $nilaiAkhirMk = NilaiAkhirMK::findOrFail($id);
        return view('nilai_akhir_mk.editMK', compact('nilaiAkhirMk'));
    }
    
    public function updateMK(Request $request, $id)
    {
        $request->validate([
            'mk' => 'required|string',
            'cpl' => 'required|string',
            'cpmk' => 'required|string',
            'skor' => 'required|integer',
        ]);
    
        $nilaiAkhirMk = NilaiAkhirMK::findOrFail($id);
        $nilaiAkhirMk->update([
            'mk' => $request->mk,
            'cpl' => $request->cpl,
            'cpmk' => $request->cpmk,
            'skor' => $request->skor,
        ]);
    
        return redirect()->route('nilai_akhir_mk.indexMK')->with('success', 'Nilai akhir MK berhasil diperbarui.');
    }
    
    public function destroyMK($id)
    {
        $nilaiAkhirMk = NilaiAkhirMK::findOrFail($id);
        $nilaiAkhirMk->delete();
    
        return redirect()->route('nilai_akhir_mk.indexMK')->with('success', 'Nilai akhir MK berhasil dihapus.');
    }
    
    public function createCPL()
    {
        return view('nilai_akhir_mk.createCPL');
    }
    
    public function storeCPL(Request $request)
    {
        $request->validate([
            'cpl' => 'required|string',
            'mk' => 'required|string',
            'cpmk' => 'required|string',
            'skor' => 'required|integer',
        ]);
    
        NilaiAkhirMK::create([
            'cpl' => $request->cpl,
            'mk' => $request->mk,
            'cpmk' => $request->cpmk,
            'skor' => $request->skor,
        ]);
    
        return redirect()->route('nilai_akhir_mk.indexCPL')->with('success', 'Nilai akhir CPL berhasil disimpan.');
    }
    
    public function editCPL($id)
    {
        $nilaiAkhirMk = NilaiAkhirMK::findOrFail($id);
        return view('nilai_akhir_mk.editCPL', compact('nilaiAkhirMk'));
    }
    
    public function updateCPL(Request $request, $id)
    {
        $request->validate([
            'cpl' => 'required|string',
            'mk' => 'required|string',
            'cpmk' => 'required|string',
            'skor' => 'required|integer',
        ]);
    
        $nilaiAkhirMk = NilaiAkhirMK::findOrFail($id);
        $nilaiAkhirMk->update([
            'cpl' => $request->cpl,
            'mk' => $request->mk,
            'cpmk' => $request->cpmk,
            'skor' => $request->skor,
        ]);
    
        return redirect()->route('nilai_akhir_mk.indexCPL')->with('success', 'Nilai akhir CPL berhasil diperbarui.');
    }
    
    public function destroyCPL($id)
    {
        $nilaiAkhirMk = NilaiAkhirMK::findOrFail($id);
        $nilaiAkhirMk->delete();
    
        return redirect()->route('nilai_akhir_mk.indexCPL')->with('success', 'Nilai akhir CPL berhasil dihapus.');
    }
}    