<?php

namespace App\Http\Controllers;

use App\Models\CPL;
use App\Models\BK;
use App\Models\CplBk;
use Illuminate\Http\Request;
use PDF;

class CplBkController extends Controller
{
    public function index()
    {
        $cpls = CPL::all();
        $bks = BK::all();
        $matrix = CplBk::all();

        return view('cplbk.index', compact('cpls', 'bks', 'matrix'));
    }

    public function edit()
    {
        $cpls = CPL::all();
        $bks = BK::all();
        $matrix = CplBk::all();

        return view('cplbk.edit', compact('cpls', 'bks', 'matrix'));
    }

    public function update(Request $request)
    {
        CplBk::truncate(); // Hapus semua data sebelumnya

        $data = [];
        foreach ($request->input('matrix', []) as $cplId => $bkIds) {
            foreach ($bkIds as $bkId) {
                $data[] = [
                    'cpl_id' => $cplId,
                    'bk_id' => $bkId,
                ];
            }
        }

        CplBk::insert($data); // Masukkan data baru

        return redirect()->route('cplbk.index')->with('success', 'Matrix CPL-BK berhasil diperbarui.');
    }
    public function printPDF()
{
    $cpls = CPL::all();
    $bks = BK::all();
    $matrix = CplBk::all();

    $pdf = PDF::loadView('pdf.cplbk', compact('cpls', 'bks', 'matrix'));
    return $pdf->download('matrix_cpl_bk.pdf');
}
}
