<?php

namespace App\Http\Controllers;

use App\Models\RubrikAnalitik;
use Illuminate\Http\Request;

class RubrikAnalitikController extends Controller
{
    public function index(Request $request)
    {
        // Get the selected 'aspek' from the request, or use null if not selected
        $aspekFilter = $request->input('aspek');

        // Query with filter for 'aspek', if provided
        if ($aspekFilter) {
            $rubrik = RubrikAnalitik::where('aspek', $aspekFilter)->get();
        } else {
            $rubrik = RubrikAnalitik::all();
        }

        // List of aspek to display in the dropdown
        $aspekList = [
            'Organisasi', 'Isi', 'Gaya Presentasi'
        ];

        return view('rubrik_analitik.index', compact('rubrik', 'aspekList'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'aspek' => 'required|string|max:255',
            'skor' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'deskripsi_tambahan' => 'nullable|string',
        ]);

        // Create the new RubrikAnalitik record
        RubrikAnalitik::create($validated);

        // Redirect back to the index page with success message
        return redirect()->route('rubrik_analitik.index')->with('success', 'Rubrik berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'aspek' => 'required|string|max:255',
            'skor' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'deskripsi_tambahan' => 'nullable|string',
        ]);

        // Find the RubrikAnalitik record by ID
        $rubrik = RubrikAnalitik::findOrFail($id);

        // Update the RubrikAnalitik record with validated data
        $rubrik->update($validated);

        // Redirect back to the index page with success message
        return redirect()->route('rubrik_analitik.index')->with('success', 'Rubrik berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Find the RubrikAnalitik record by ID
        $rubrik = RubrikAnalitik::findOrFail($id);

        // Delete the RubrikAnalitik record
        $rubrik->delete();

        // Return a success response as JSON
        return response()->json(['success' => 'Rubrik berhasil dihapus.']);
    }
}
