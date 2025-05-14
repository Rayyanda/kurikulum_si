<?php

namespace App\Http\Controllers;

use App\Models\RubrikHolistik;
use Illuminate\Http\Request;

class RubrikHolistikController extends Controller
{
    // Menampilkan semua rubrik
    public function index()
    {
        // Ambil semua data rubrik holistik
        $rubrik = RubrikHolistik::all();
        return view('rubrik_holistik.index', compact('rubrik'));
    }

    // Menyimpan rubrik baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'grade' => 'required|string|max:255',
            'skor' => 'required|string|max:255',
            'kriteria_penilaian' => 'required|string',
        ]);

        // Simpan data rubrik holistik
        RubrikHolistik::create($validated);

        // Kembali ke halaman utama dengan pesan sukses
        return redirect()->route('rubrik_holistik.index')->with('success', 'Rubrik berhasil ditambahkan.');
    }

    // Memperbarui rubrik yang ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'grade' => 'required|string|max:255',
            'skor' => 'required|string|max:255',
            'kriteria_penilaian' => 'required|string',
        ]);

        // Temukan data rubrik dan perbarui
        $rubrik = RubrikHolistik::findOrFail($id);
        $rubrik->update($validated);

        // Kembali ke halaman utama dengan pesan sukses
        return redirect()->route('rubrik_holistik.index')->with('success', 'Rubrik berhasil diperbarui.');
    }

    // Menghapus rubrik
    public function destroy($id)
    {
        // Temukan data rubrik dan hapus
        $rubrik = RubrikHolistik::findOrFail($id);
        $rubrik->delete();

        // Mengirimkan response json agar tampilan bisa langsung diperbarui
        return response()->json(['success' => 'Rubrik berhasil dihapus.']);
    }
}
