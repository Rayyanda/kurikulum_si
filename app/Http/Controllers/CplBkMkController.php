<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\CplBkMk;
use App\Models\CPL;
use App\Models\BK;
use App\Models\MK;

class CplBkMkController extends Controller
{
    public function index()
    {
        $cpls = CPL::all();
        $bks = BK::all();
        $cplBkMks = CplBkMk::with('mk')->get(); // Eager load the MK relation

        return view('pages_01.cplbkmk.index', compact('cpls', 'bks', 'cplBkMks'));
    }

    public function edit()
    {
        $cpls = CPL::all();
        $bks = BK::all();
        $cplBkMks = CplBkMk::with('mk')->get(); // Eager load the MK relation

        return view('pages_01.cplbkmk.edit', compact('cpls', 'bks', 'cplBkMks'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'matrix.*.*' => 'nullable|string|exists:mk,nama'
        ], [
            'matrix.*.*.exists' => 'Nama MK yang anda masukkan tidak terdaftar dan harus sesuai dengan nama yang ada di database'
        ]);

        CplBkMk::truncate();
        $data = $request->input('matrix');

        foreach ($data as $cplId => $bkData) {
            foreach ($bkData as $bkId => $mkName) {
                if (!empty($mkName)) {
                    $mk = MK::where('nama', $mkName)->first();
                    if ($mk) {
                        CplBkMk::create([
                            'cpl_id' => $cplId,
                            'bk_id' => $bkId,
                            'mk_id' => $mk->id,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('cplbkmk.index')->with('success', 'Matrix updated successfully!');
    }

    public function autocomplete(Request $request)
    {
        $term = $request->get('term');
        $mks = MK::where('nama', 'LIKE', '%' . $term . '%')->get();

        return response()->json($mks);
    }

    public function printPDF()
    {
        $cpls = CPL::all();
        $bks = BK::all();
        $cplBkMks = CplBkMk::with('mk')->get(); // Eager load the MK relation

        $pdf = PDF::loadView('pdf.cplbkmk', compact('cpls', 'bks', 'cplBkMks'));
        return $pdf->download('matrix_cpl_bk_mk.pdf');
    }
}
