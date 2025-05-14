<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MK;
use PDF;

class MKController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->input('sort', 'kode'); // Default sorting by 'kode'
        $sortOrder = $request->input('order', 'asc'); // Default sorting order

        // Logika khusus untuk pengurutan berdasarkan kategori
        if ($sortBy == 'kategori') {
            $mks = MK::orderByRaw("FIELD(kategori, 'MK Wajib Umum', 'MK Wajib', 'MK Pilihan') $sortOrder")
                ->orderBy('kode', 'asc')
                ->get();
        } 
        // Logika khusus untuk pengurutan berdasarkan semester
        else if ($sortBy == 'semester') {
            $mks = MK::orderByRaw('CAST(SUBSTR(semester, 9) AS UNSIGNED) '.$sortOrder)
                ->orderBy('kode', 'asc')
                ->get();
        } 
        // Pengurutan standar
        else {
            $mks = MK::orderBy($sortBy, $sortOrder)->get();
        }

        $sum_sks = $mks->sum('sks');

        return view('pages_01.mk.index', compact('mks', 'sum_sks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:mk,kode',
            'nama' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (preg_match_all('/\d/', $value) > 1) {
                        $fail('Nama mata kuliah tidak boleh mengandung lebih dari satu angka.');
                    }
                },
            ],
            'sks' => 'required|integer|between:1,4',
            'semester' => 'required|string|max:20',
            'kategori' => 'required|string|in:MK Wajib,MK Pilihan,MK Wajib Umum',
            'parent_id' => 'nullable|exists:mk,id',
        ]);

        $this->validateSequence($request->input('semester'), $request->input('nama'), $request->input('parent_id'));

        MK::create($validated);

        return redirect()->route('mk.index')->with('success', 'MK berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $mk = MK::findOrFail($id);

        $validated = $request->validate([
            'kode' => 'required|unique:mk,kode,' . $mk->id,
            'nama' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (preg_match_all('/\d/', $value) > 1) {
                        $fail('Nama mata kuliah tidak boleh mengandung lebih dari satu angka.');
                    }
                },
            ],
            'sks' => 'required|integer|between:1,4',
            'semester' => 'required|string|max:20',
            'kategori' => 'required|string|in:MK Wajib,MK Pilihan,MK Wajib Umum',
            'parent_id' => 'nullable|exists:mk,id',
        ]);

        $this->validateSequence($request->input('semester'), $request->input('nama'), $request->input('parent_id'), $id);

        $mk->update($validated);

        return redirect()->route('mk.index')->with('success', 'MK berhasil diperbarui.');
    }

    protected function validateSequence($semester, $nama, $parentId, $excludeId = null)
    {
        // Check if the course name already exists in the same semester
        $existingCourse = MK::where('semester', $semester)
            ->where('nama', $nama)
            ->when($excludeId, function($query) use ($excludeId) {
                return $query->where('id', '!=', $excludeId);
            })
            ->first();

        if ($existingCourse) {
            abort(400, 'Nama mata kuliah sudah ada dalam semester yang sama.');
        }

        // Ensure the course is in the correct sequence for the semester
        $parts = explode('-', $nama);
        if (count($parts) > 1) {
            $baseName = $parts[0];
            $currentSequence = isset($parts[1]) ? $parts[1] : null;

            if ($currentSequence) {
                // Check if previous sequence exists
                $previousSequence = $this->getPreviousSequence($currentSequence);

                if ($previousSequence) {
                    $existsPreviousCourse = MK::where('semester', $semester)
                        ->where('nama', $baseName . '-' . $previousSequence)
                        ->exists();

                    if (!$existsPreviousCourse) {
                        abort(400, 'Anda harus membuat mata kuliah ' . $baseName . '-' . $previousSequence . ' sebelum ' . $nama);
                    }
                }
            }
        }
    }

    protected function getPreviousSequence($currentSequence)
    {
        $sequenceMap = [
            '2' => '1',
            'II' => 'I',
            // Add more sequence mappings if needed
        ];

        return $sequenceMap[$currentSequence] ?? null;
    }

    public function destroy($id)
    {
        $mk = MK::findOrFail($id);
        $mk->delete();

        return response()->json(['success' => 'MK berhasil dihapus.']);
    }

    public function organisasi_mk()
    {
        return view('pages_01.mk.organisasi_mk');
    }

    public function printPDF()
    {
        $mks = MK::all();
        $pdf = PDF::loadView('pdf.mk', compact('mks'));
        return $pdf->download('mk_list.pdf');
    }
}
