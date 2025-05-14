<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CPL;
use App\Models\PL;
use App\Models\Cplpl; // Pastikan nama model sesuai
use PDF;

class CplPlController extends Controller
{
    // Menampilkan matriks CPL-PL
    public function index()
    {
        $cpls = CPL::all(); // Mengambil semua data CPL
        $pls = PL::all(); // Mengambil semua data PL
        $cplpl = Cplpl::all(); // Mengambil semua data relasi CPL-PL
        
        // Mengirim data ke view index
        return view('cplpl.index', compact('cpls', 'pls', 'cplpl'));
    }

    // Menampilkan form edit matriks CPL-PL
    public function edit()
    {
        $cpls = CPL::all(); // Mengambil semua data CPL
        $pls = PL::all(); // Mengambil semua data PL
        $cplpl = Cplpl::all(); // Mengambil semua data relasi CPL-PL

        // Mengirim data ke view edit
        return view('cplpl.edit', compact('cpls', 'pls', 'cplpl'));
    }

    // Memperbarui matriks CPL-PL
    public function update(Request $request)
    {
        Cplpl::truncate(); // Menghapus semua data relasi CPL-PL yang ada

        // Menyimpan relasi baru dari form
        foreach ($request->matrix as $cpl_id => $pl_ids) {
            foreach ($pl_ids as $pl_id => $value) {
                if ($value) {
                    Cplpl::create([ // Pastikan menggunakan Cplpl::create
                        'cpl_id' => $cpl_id,
                        'pl_id' => $pl_id
                    ]);
                }
            }
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('cplpl.index')->with('success', 'Matrix updated successfully.');
    }

    // Fungsi untuk mencetak PDF
    public function printPDF()
    {
        $cpls = CPL::all(); // Mengambil semua data CPL
        $pls = PL::all(); // Mengambil semua data PL
        $cplpl = Cplpl::all(); // Mengambil semua data relasi CPL-PL
        
        // Load view pdf.cplpl_pdf.blade.php dan kirimkan data
        $pdf = PDF::loadView('pdf.cplpl_pdf', compact('cpls', 'pls', 'cplpl'));

        // Unduh PDF dengan nama 'cplpl.pdf'
        return $pdf->download('cplpl.pdf');
    }
}
