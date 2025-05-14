<?php

namespace App\Http\Controllers;

use App\Models\Cpmk;
use App\Models\CPL;
use App\Models\MK;
use Illuminate\Http\Request;

class CpmkController extends Controller
{
    /**
     * Display a listing of the CPMKs with filters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $tahunAjaranOptions = $this->generateTahunAjaranOptions();
        $semesterOptions = ['ganjil', 'genap'];

        $query = Cpmk::query();

        if ($request->filled('tahun_ajaran')) {
            $query->where('tahun_ajaran', $request->input('tahun_ajaran'));
        }

        if ($request->filled('semester')) {
            $query->where('semester', $request->input('semester'));
        }

        $cpmks = $query->get();

        return view('cpmk.index', compact('cpmks', 'tahunAjaranOptions', 'semesterOptions'));
    }

    /**
     * Show the form for creating a new CPMK.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cpl = Cpl::all();
        $mk = Mk::all();
        $tahunAjaranOptions = $this->generateTahunAjaranOptions();
        $semesterOptions = ['ganjil', 'genap'];

        return view('cpmk.create', compact('cpl', 'mk', 'tahunAjaranOptions', 'semesterOptions'));
    }

    /**
     * Store a newly created CPMK in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mk_id' => 'required|exists:mk,id',
            'cpl_id' => 'required|exists:cpl,id',
            'code' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:9',
            'semester' => 'required|in:ganjil,genap',
            'validation_status' => 'nullable|string|max:255',
            'validation_note' => 'nullable|string',
        ]);

        // Set initial validation status for new CPMK
        $validated['validation_status'] = 'sedang diproses';

        Cpmk::create($validated);

        return redirect()->route('cpmk.index')->with('success', 'CPMK successfully created.');
    }

    /**
     * Show the form for editing the specified CPMK.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cpmk = Cpmk::findOrFail($id);
        $cpl = Cpl::all();
        $mk = Mk::all();
        $tahunAjaranOptions = $this->generateTahunAjaranOptions();
        $semesterOptions = ['ganjil', 'genap'];

        return view('cpmk.edit', compact('cpmk', 'cpl', 'mk', 'tahunAjaranOptions', 'semesterOptions'));
    }

    /**
     * Update the specified CPMK in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $cpmk = Cpmk::findOrFail($id);

        $validated = $request->validate([
            'mk_id' => 'required|exists:mk,id',
            'cpl_id' => 'required|exists:cpl,id',
            'code' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:9',
            'semester' => 'required|in:ganjil,genap',
            'validation_status' => 'nullable|string|max:255',
            'validation_note' => 'nullable|string',
        ]);

        // Update the CPMK
        $cpmk->update($validated);

        return redirect()->route('cpmk.index')->with('success', 'CPMK successfully updated.');
    }

    /**
     * Remove the specified CPMK from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $cpmk = Cpmk::findOrFail($id);
        $cpmk->delete();

        return redirect()->route('cpmk.index')->with('success', 'CPMK successfully deleted.');
    }

    /**
     * Show the form for validating the specified CPMK.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showValidateForm($id)
    {
        $cpmk = Cpmk::findOrFail($id);

        return view('cpmk.validate', compact('cpmk'));
    }

    /**
     * Process the validation of the specified CPMK.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processValidation(Request $request, $id)
    {
        $validated = $request->validate([
            'validation_status' => 'required|string|max:255',
            'validation_note' => 'nullable|string',
        ]);

        $cpmk = Cpmk::findOrFail($id);

        if ($cpmk->validation_status == 'revisi') {
            $validated['validation_note'] = null;
        }

        $cpmk->update($validated);

        return redirect()->route('cpmk.index')->with('success', 'CPMK successfully validated.');
    }

    /**
     * Show the form for revising the specified CPMK.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showRevisiForm($id)
    {
        $cpmk = Cpmk::findOrFail($id);
        $revisionNumber = $this->calculateRevisionNumber($cpmk);

        return view('cpmk.revisi', compact('cpmk', 'revisionNumber'));
    }

    /**
     * Process the revision of the specified CPMK.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processRevisi(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $cpmk = Cpmk::findOrFail($id);
        $revisionNumber = $this->calculateRevisionNumber($cpmk);

        // Create a new CPMK record for the revision
        $newCpmk = $cpmk->replicate();
        $newCpmk->description = $request->input('description');
        $newCpmk->code = $this->generateNewRevisionCode($cpmk->code, $revisionNumber);
        $newCpmk->validation_status = 'revisi ' . $revisionNumber;
        $newCpmk->validation_note = null; // Mengosongkan catatan validasi untuk revisi baru
        $newCpmk->save();

        // Update the original CPMK record with revision status
        $cpmk->validation_status = 'telah direvisi';
        $cpmk->save();

        return redirect()->route('cpmk.index')->with('success', 'CPMK successfully revised.');
    }

    /**
     * Calculate the next revision number based on existing revisions.
     *
     * @param  Cpmk  $cpmk
     * @return int
     */
    protected function calculateRevisionNumber($cpmk)
    {
        $latestRevision = Cpmk::where('code', 'like', $cpmk->code . '-rev%')
                               ->orderBy('created_at', 'desc')
                               ->first();

        if ($latestRevision) {
            preg_match('/-rev(\d+)/', $latestRevision->code, $matches);
            return isset($matches[1]) ? intval($matches[1]) + 1 : 1;
        }

        return 1;
    }

    /**
     * Generate a new revision code based on the current code and revision number.
     *
     * @param  string  $currentCode
     * @param  int  $revisionNumber
     * @return string
     */
    protected function generateNewRevisionCode($currentCode, $revisionNumber)
    {
        return $currentCode . '-rev' . $revisionNumber;
    }

    /**
     * Generate options for tahun ajaran.
     *
     * @return array
     */
    private function generateTahunAjaranOptions()
    {
        return [
            '2023/2024',
            '2024/2025',
            '2025/2026',
        ];
    }

    /**
     * Show the CPMK matrix.
     *
     * @return \Illuminate\View\View
     */
    public function showMatrix()
    {
        $tahunAjaranOptions = $this->generateTahunAjaranOptions();
        $semesterOptions = ['ganjil', 'genap'];

        // Ambil semua CPL dan MK
        $cpls = Cpl::all();
        $mks = Mk::all();

        // Membuat matrix untuk menyimpan data CPMK
        $matrix = [];
        foreach ($mks as $mk) {
            foreach ($cpls as $cpl) {
                $matrix[$mk->id][$cpl->id] = Cpmk::where('mk_id', $mk->id)
                                                 ->where('cpl_id', $cpl->id)
                                                 ->exists() ? 'checked' : ''; // Atur checkbox
            }
        }

        return view('cpmk.matrix', compact('cpls', 'mks', 'matrix', 'tahunAjaranOptions', 'semesterOptions'));
    }

    public function find_json($mk_id)
    {
        $cpmk = Cpmk::where('mk_id','=',$mk_id)->with('subcpmks')->with('cpl')->get();
        return response()->json($cpmk);
    }
}
