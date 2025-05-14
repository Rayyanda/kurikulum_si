<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CPL;
use App\Models\Cpmk;
use App\Models\MK;
use PDF;

class CplCpmkController extends Controller
{
    public function index()
    {
        // Ambil semua data CPL
        $cpls = CPL::orderBy('code')->get();
        
        // Ambil semua data CPMK beserta relasi CPL dan MK
        $cpmks = Cpmk::with(['cpl', 'mk'])->orderBy('code')->get();
        
        // Ambil semua semester yang ada dalam data MK
        $semesters = MK::distinct()->orderBy('semester')->pluck('semester')->toArray();

        // Kembalikan data ke view
        return view('pages_01.cpl_cpmk.index', compact('cpls', 'cpmks', 'semesters'));
    }

    public function generatePDF()
    {
        // Ambil semua data CPL
        $cpls = CPL::orderBy('code')->get();
        
        // Ambil semua data CPMK beserta relasi CPL dan MK
        $cpmks = Cpmk::with(['cpl', 'mk'])->orderBy('code')->get();
        
        // Ambil semua semester yang ada dalam data MK
        $semesters = MK::distinct()->orderBy('semester')->pluck('semester')->toArray();

        // Render view ke dalam string HTML
        $html = view('pdf.cpl_cpmk', compact('cpls', 'cpmks', 'semesters'))->render();

        // Buat objek PDF dengan library dompdf
        $pdf = PDF::loadHTML($html);

        // Atur ukuran dan orientasi halaman
        $pdf->setPaper('A4', 'landscape');

        // Unduh file PDF
        return $pdf->download('pages_01.cpl_cpmk.pdf');
    }
}
