<?php

namespace App\Http\Controllers;

use App\Models\CPL;
use App\Models\MK;
use App\Models\CplMk;
use Illuminate\Http\Request;
use PDF;

class cplmkController extends Controller
{
    public function index()
    {
        // Ambil semua data CPL dan MK
        $cpls = CPL::all();
        $mks = MK::all();

        // Ambil data matrix CplMk
        $matrix = CplMk::all();

        // Tampilkan view index CplMk dengan data yang dibutuhkan
        return view('pages_01.cplmk.index', compact('cpls', 'mks', 'matrix'));
    }

    public function edit()
    {
        // Ambil semua data CPL dan MK
        $cpls = CPL::all();
        $mks = MK::all();

        // Ambil data matrix CplMk
        $matrix = CplMk::all();

        // Tampilkan view edit CplMk dengan data yang dibutuhkan
        return view('pages_01.cplmk.edit', compact('cpls', 'mks', 'matrix'));
    }

    public function update(Request $request)
    {
        // Proses update data CplMk
        $cplMkData = $request->input('cpl_mk');

        // Hapus semua data di tabel cpl_mk
        CplMk::truncate();

        // Simpan data baru ke tabel cpl_mk
        foreach ($cplMkData as $cplId => $mkIds) {
            foreach ($mkIds as $mkId => $value) {
                if ($value) {
                    CplMk::create([
                        'cpl_id' => $cplId,
                        'mk_id' => $mkId,
                    ]);
                }
            }
        }

        return redirect()->route('cplmk.index')->with('success', 'Matrix CPL-MK updated successfully.');
    }
    public function printPDF()
    {
        // Ambil semua data CPL dan MK
        $cpls = CPL::all();
        $mks = MK::all();

        // Ambil data matrix CplMk
        $matrix = CplMk::all();

        // Load view cplmk_pdf.blade.php dan kirimkan data
        $pdf = PDF::loadView('pdf.cplmk', compact('cpls', 'mks', 'matrix'));

        // Unduh PDF dengan nama 'cplmk.pdf'
        return $pdf->download('pages_01.cplmk.pdf');
    }
}
