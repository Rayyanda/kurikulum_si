<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CPL;
use App\Models\MK;
use App\Models\CplMk;
use PDF;

class PemenuhanCPLController extends Controller
{
    public function index()
    {
        // Ambil semua data CPL, MK, dan matrix CplMk
        $cpls = CPL::orderBy('code')->get();
        $semesters = MK::distinct()->orderBy('semester')->pluck('semester');

        // Kelompokkan data CplMk berdasarkan CPL dan semester MK
        $cplsWithMks = [];
        foreach ($cpls as $cpl) {
            $cplsWithMks[$cpl->id] = [
                'cpl' => $cpl,
                'mks' => []
            ];
            foreach ($semesters as $semester) {
                $mks = CplMk::where('cpl_id', $cpl->id)
                            ->whereHas('mk', function ($query) use ($semester) {
                                $query->where('semester', $semester);
                            })
                            ->with('mk')
                            ->get();
                $cplsWithMks[$cpl->id]['mks'][$semester] = $mks;
            }
        }

        return view('pages_01.pemenuhan_cpl.index', compact('cplsWithMks', 'semesters'));
    }

    public function printPDF()
{
    // Ambil semua data CPL, MK, dan matrix CplMk
    $cplsWithMks = $this->prepareDataForIndex();
    $semesters = MK::distinct()->orderBy('semester')->pluck('semester');

    // Load view pemenuhan_cpl_pdf.blade.php dan kirimkan data
    $pdf = PDF::loadView('pdf.pemenuhan_cpl_pdf', compact('cplsWithMks', 'semesters'));

    // Unduh PDF dengan nama 'pemenuhan_cpl.pdf'
    return $pdf->download('pemenuhan_cpl.pdf');
}

    private function prepareDataForIndex()
    {
        // Ambil semua data CPL, MK, dan matrix CplMk
        $cpls = CPL::orderBy('code')->get();
        $semesters = MK::distinct()->orderBy('semester')->pluck('semester');

        // Kelompokkan data CplMk berdasarkan CPL dan semester MK
        $cplsWithMks = [];
        foreach ($cpls as $cpl) {
            $cplsWithMks[$cpl->id] = [
                'cpl' => $cpl,
                'mks' => []
            ];
            foreach ($semesters as $semester) {
                $mks = CplMk::where('cpl_id', $cpl->id)
                            ->whereHas('mk', function ($query) use ($semester) {
                                $query->where('semester', $semester);
                            })
                            ->with('mk')
                            ->get();
                $cplsWithMks[$cpl->id]['mks'][$semester] = $mks;
            }
        }

        return $cplsWithMks;
    }
}
