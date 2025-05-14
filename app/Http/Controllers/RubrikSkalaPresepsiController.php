<?php

namespace App\Http\Controllers;

use App\Models\RubrikSkalaPresepsi;
use Illuminate\Http\Request;

class RubrikSkalaPresepsiController extends Controller
{
    public function index(Request $request)
    {
        // Get the selected 'aspek' from the request, or use null if not selected
        $aspekFilter = $request->input('aspek');

        // Fetch the unique list of 'aspek' for the dropdown filter
        $aspekList = RubrikSkalaPresepsi::distinct()->pluck('aspek');

        // Query with filter for 'aspek', if provided
        if ($aspekFilter) {
            $rubrikSkalaPresepsis = RubrikSkalaPresepsi::where('aspek', $aspekFilter)
                ->paginate(10); // Pagination untuk 10 data per halaman
        } else {
            $rubrikSkalaPresepsis = RubrikSkalaPresepsi::paginate(10); // No filter applied
        }

        return view('rubrik_presepsi.index', compact('rubrikSkalaPresepsis', 'aspekList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'aspek' => 'required|string|max:255',
            'skor' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'deskripsi_tambahan' => 'nullable|string',
        ]);

        RubrikSkalaPresepsi::create($validated); // Save new data

        return redirect()->route('rubrik_presepsi.index')->with('success', 'Rubrik berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'aspek' => 'required|string|max:255',
            'skor' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'deskripsi_tambahan' => 'nullable|string',
        ]);

        $rubrik = RubrikSkalaPresepsi::findOrFail($id);
        $rubrik->update($validated); // Update the existing data

        return redirect()->route('rubrik_presepsi.index')->with('success', 'Rubrik berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rubrik = RubrikSkalaPresepsi::findOrFail($id);
        $rubrik->delete(); // Delete rubrik data

        return response()->json(['success' => 'Rubrik berhasil dihapus.']);
    }
}
