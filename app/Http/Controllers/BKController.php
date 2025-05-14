<?php

namespace App\Http\Controllers;

use App\Models\BK;
use Illuminate\Http\Request;
use PDF;

class BKController extends Controller
{
    public function index()
    {
        // Mengambil semua data BK
        $bks = BK::all();
        // Mengembalikan view dengan data BK
        return view('pages_01.bk.index', compact('bks'));
    }

    public function create()
    {
        // Mengembalikan view form untuk menambahkan BK
        return view('pages_01.bk.create');
    }

    public function store(Request $request)
    {
        // Validasi data input pengguna
        $validated = $request->validate([
            'nama_bahan_kajian' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'referensi'=>'required|string',
        ]);

        // Membuat entri BK baru dengan data yang divalidasi
        BK::create($validated);

        // Mengalihkan ke halaman indeks dengan pesan sukses
        return redirect()->route('bk.index')->with('success', 'BK berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Mengambil BK berdasarkan ID
        $bk = BK::findOrFail($id);
        // Mengembalikan view form untuk mengedit BK
        return view('pages_01.bk.edit', compact('bk'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input pengguna
        $validated = $request->validate([
            'nama_bahan_kajian' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'referensi'=>'required|string',
        ]);

        // Mengambil BK berdasarkan ID
        $bk = BK::findOrFail($id);
        // Memperbarui data BK dengan data yang divalidasi
        $bk->update($validated);

        // Mengalihkan ke halaman indeks dengan pesan sukses
        return redirect()->route('bk.index')->with('success', 'BK berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Mengambil BK berdasarkan ID
        $bk = BK::findOrFail($id);
        // Menghapus data BK
        $bk->delete();

        // Mengembalikan respon JSON dengan pesan sukses
        return response()->json(['success' => 'BK berhasil dihapus.']);
    }
    public function printPDF()
    {
        // Retrieve all BK data
        $bks = BK::all();

        // Load the view for PDF and pass BK data to it
        $pdf = PDF::loadView('pdf.bk', compact('bks'));

        // Download the PDF file
        return $pdf->download('bk_list.pdf');
    }
}
