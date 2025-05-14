<?php

namespace App\Http\Controllers;

use App\Models\BK;
use App\Models\MK;
use App\Models\BkMk;
use Illuminate\Http\Request;
use PDF;

class BkMkController extends Controller
{
    /**
     * Menampilkan halaman utama untuk matriks BK-MK.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bks = BK::all();
        $mks = MK::all();
        $matrix = BkMk::all();

        // Mengirim data ke view
        return view('pages_01.BkMk.index', compact('bks', 'mks', 'matrix'));
    }

    /**
     * Menampilkan halaman untuk mengedit matriks BK-MK.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $bks = BK::all();
        $mks = MK::all();
        $matrix = BkMk::all();

        // Mengirim data ke view edit
        return view('pages_01.BkMk.edit', compact('bks', 'mks', 'matrix'));
    }

    /**
     * Memperbarui data matriks BK-MK.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Menghapus semua data matriks BK-MK yang sudah ada
        BkMk::truncate();

        // Menyimpan data matriks BK-MK baru
        $data = [];
        foreach ($request->input('matrix', []) as $bkId => $mkIds) {
            foreach ($mkIds as $mkId) {
                $data[] = [
                    'bk_id' => $bkId,
                    'mk_id' => $mkId,
                ];
            }
        }

        // Menyimpan data matriks BK-MK ke database
        BkMk::insert($data);

        // Redirect ke halaman index dan menampilkan pesan sukses
        return redirect()->route('BkMk.index')->with('success', 'Matrix BK-MK berhasil diperbarui.');
    }

    /**
     * Menampilkan dan mengunduh matriks BK-MK dalam bentuk PDF.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function printPDF()
    {
        $bks = BK::all();
        $mks = MK::all();
        $matrix = BkMk::all();

        // Membuat file PDF menggunakan view 'pdf.bk_mk_pdf'
        $pdf = PDF::loadView('pdf.bk_mk_pdf', compact('bks', 'mks', 'matrix'));

        // Mengunduh file PDF dengan nama 'matrix_bk_mk.pdf'
        return $pdf->download('matrix_bk_mk.pdf');
    }
}
