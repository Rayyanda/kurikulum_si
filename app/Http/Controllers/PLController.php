<?php

namespace App\Http\Controllers;

use App\Models\PL;
use Illuminate\Http\Request;
use PDF;

class PLController extends Controller
{
    // Menampilkan daftar PL
    public function index()
    {
        $pls = PL::all();
        return view('pages_01.pl.index', compact('pls')); // Perhatikan: "pl" huruf kecil
    }

    // Menampilkan form tambah PL
    public function create()
    {
        return view('pages_01.pl.create'); // Perhatikan: "pl" huruf kecil
    }

    // Menyimpan data PL baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'sumber' => 'required|string|max:255',
        ]);

        PL::create($validated);

        return redirect()->route('pl.index')->with('success', 'PL berhasil ditambahkan.');
    }

    // Menampilkan detail PL
    public function show($id)
    {
        $pl = PL::findOrFail($id);
        return view('pages_01.pl.show', compact('pl')); // Perhatikan: "pl" huruf kecil
    }

    // Menampilkan form edit PL
    public function edit($id)
    {
        $pl = PL::findOrFail($id);
        return view('pages_01.pl.edit', compact('pl')); // Perhatikan: "pl" huruf kecil
    }

    // Memperbarui data PL
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'sumber' => 'required|string|max:255',
        ]);

        $pl = PL::findOrFail($id);
        $pl->update($validated);

        return redirect()->route('pl.index')->with('success', 'PL berhasil diperbarui.');
    }

    // Menghapus PL
    public function destroy($id)
    {
        $pl = PL::findOrFail($id);
        $pl->delete();

        return response()->json(['success' => 'PL berhasil dihapus.']);
    }

    // Generate PDF dari data PL
    public function printPDF()
    {
        $pls = PL::all();
        $pdf = PDF::loadView('pdf.pl', compact('pls')); // Perhatikan: "pdf.pl" sesuai dengan folder
        return $pdf->download('pl_list.pdf');
    }
}
