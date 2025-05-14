<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCPMK;
use App\Models\Cpmk;
use App\Models\MK;
use PDF;

class SubCPMKController extends Controller
{
    public function index(Request $request)
    {
        $filterTahunAjaran = $request->input('tahun_ajaran');
        $filterSemester = $request->input('semester');

        $query = SubCPMK::with('cpmk.cpl');

        if ($filterTahunAjaran) {
            $query->where('tahun_ajaran', $filterTahunAjaran);
        }

        if ($filterSemester) {
            $query->where('semester', $filterSemester);
        }

        $subcpmks = $query->get();

        $cpmks = CPMK::all();
        $mks = MK::all();
        $tahunAjaranOptions = $this->generateTahunAjaranOptions();
        $semesterOptions = ['ganjil', 'genap'];

        return view('sub_cpmk.index', compact('subcpmks', 'cpmks', 'mks', 'tahunAjaranOptions', 'semesterOptions'));
    }

    public function create()
    {
        $mks = MK::all();
        $tahunAjaranOptions = $this->generateTahunAjaranOptions();
        $semesterOptions = ['ganjil', 'genap'];
        return view('sub_cpmk.create', compact('mks', 'tahunAjaranOptions', 'semesterOptions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cpmk_id' => 'required',
            'mk_id' => 'required',
            'code' => 'required|string|max:255',
            'description' => 'required|string',
            'tahun_ajaran' => 'required|string',
            'semester' => 'required|string',
        ]);

        SubCPMK::create($validatedData);

        return redirect()->route('sub_cpmk.index')->with('success', 'SubCPMK berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $subcpmk = SubCPMK::findOrFail($id);
        $mks = MK::all();
        $cpmks = CPMK::all();
        $tahunAjaranOptions = $this->generateTahunAjaranOptions();
        $semesterOptions = ['ganjil', 'genap'];
        return view('sub_cpmk.edit', compact('subcpmk', 'mks', 'cpmks', 'tahunAjaranOptions', 'semesterOptions'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
            'tahun_ajaran' => 'required|string',
            'semester' => 'required|string',
        ]);

        $subcpmk = SubCPMK::findOrFail($id);
        $subcpmk->update($validatedData);

        return redirect()->route('sub_cpmk.index')->with('success', 'SubCPMK berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $subcpmk = SubCPMK::findOrFail($id);
        $subcpmk->delete();

        return redirect()->route('sub_cpmk.index')->with('success', 'SubCPMK berhasil dihapus.');
    }

    public function showValidateForm($id)
    {
        $subcpmk = SubCPMK::findOrFail($id);
        return view('sub_cpmk.validate', compact('subcpmk'));
    }

    public function processValidation(Request $request, $id)
    {
        $validatedData = $request->validate([
            'validation_status' => 'required|in:revisi,ubah',
            'validation_note' => 'nullable|string',
        ]);

        $subcpmk = SubCPMK::findOrFail($id);
        $subcpmk->update($validatedData);

        return redirect()->route('sub_cpmk.index')->with('success', 'Validasi berhasil diperbarui.');
    }

    public function generatePDF()
    {
        $subcpmks = SubCPMK::with('cpmk.cpl')->get();
        $pdf = PDF::loadView('pdf.subcpmk', compact('subcpmks'));
        return $pdf->download('subcpmks.pdf');
    }

    public function showRevisiForm($id)
    {
        $subcpmk = SubCPMK::findOrFail($id);
        return view('sub_cpmk.revisi', compact('subcpmk'));
    }

    public function processRevisi(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
        ]);

        $subcpmk = SubCPMK::findOrFail($id);

        $newSubCPMK = $subcpmk->replicate();
        $newSubCPMK->description = $request->description;

        $latestRevision = SubCPMK::where('cpmk_id', $subcpmk->cpmk_id)
                                  ->where('mk_id', $subcpmk->mk_id)
                                  ->where('code', $subcpmk->code)
                                  ->where('validation_status', 'like', 'revisi%')
                                  ->orderBy('created_at', 'desc')
                                  ->first();

        if ($latestRevision) {
            preg_match('/revisi (\d+)/', $latestRevision->validation_status, $matches);
            if (isset($matches[1])) {
                $nextRevisionNumber = intval($matches[1]) + 1;
                $newSubCPMK->validation_status = 'revisi ' . $nextRevisionNumber;
            } else {
                $newSubCPMK->validation_status = 'revisi 1';
            }
        } else {
            $newSubCPMK->validation_status = 'revisi 1';
        }

        $newSubCPMK->save();
        $subcpmk->update(['validation_status' => 'telah direvisi']);

        return redirect()->route('sub_cpmk.index')->with('success', 'SubCPMK berhasil direvisi.');
    }

    public function getCPMKs($mk_id)
    {
        $cpmks = CPMK::where('mk_id', $mk_id)->get();
        return response()->json($cpmks);
    }

    private function generateTahunAjaranOptions()
    {
        return [
            '2023/2024',
            '2024/2025',
            '2025/2026',
        ];
    }
}

