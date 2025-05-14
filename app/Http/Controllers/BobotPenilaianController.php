<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BobotPenilaian;
use App\Models\CPL;
use App\Models\MK;
use App\Models\Cpmk;

class BobotPenilaianController extends Controller
{
    public function index(Request $request)
    {
        $tahunAjaran = $request->input('tahun_ajaran');
        $semester = $request->input('semester');

        $query = BobotPenilaian::with(['cpl', 'mk', 'cpmk']); // Ensure eager loading

        if ($tahunAjaran) {
            $query->where('tahun_ajaran', $tahunAjaran);
        }

        if ($semester) {
            $query->where('semester', $semester);
        }

        $bobot_penilaians = $query->get();

        // Handle null CPMK data
        foreach ($bobot_penilaians as $bobot) {
            if (!$bobot->cpmk) {
                $bobot->cpmk = new Cpmk(); // Create a temporary Cpmk instance to avoid errors
            }
        }

        // Ambil daftar tahun ajaran dan semester dari database
        $tahunAjaranOptions = BobotPenilaian::distinct()->pluck('tahun_ajaran')->toArray();
        $semesterOptions = BobotPenilaian::distinct()->pluck('semester')->toArray();

        return view('bobot_penilaian.index', compact('bobot_penilaians', 'tahunAjaranOptions', 'semesterOptions'));
    }

    public function create()
    {
        $cpls = CPL::all();
        $mks = MK::all();
        $cpmks = Cpmk::all();

        $tahunAjaranOptions = BobotPenilaian::distinct()->pluck('tahun_ajaran')->toArray();
        $semesterOptions = BobotPenilaian::distinct()->pluck('semester')->toArray();

        return view('bobot_penilaian.create', compact('cpls', 'mks', 'cpmks', 'tahunAjaranOptions', 'semesterOptions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mk_id' => 'required|exists:mk,id',
            'cpl_id' => 'required|exists:cpl,id',
            'cpmk_id' => 'required|exists:cpmk,id',
            'tahun_ajaran' => 'required|string',
            'semester' => 'required|string',
            'mbkm' => 'nullable|string|max:255',
            'partisipasi' => 'required|integer|min:0|max:100',
            'observasi' => 'required|integer|min:0|max:100',
            'untuk_kerja' => 'required|integer|min:0|max:100',
            'tes_tulis_UTS' => 'required|integer|min:0|max:100',
            'tes_tulis_UAS' => 'required|integer|min:0|max:100',
            'tes_lisan_Tugas_Kelompok' => 'required|integer|min:0|max:100',
        ]);

        $total = array_sum([
            $validatedData['partisipasi'],
            $validatedData['observasi'],
            $validatedData['untuk_kerja'],
            $validatedData['tes_tulis_UTS'],
            $validatedData['tes_tulis_UAS'],
            $validatedData['tes_lisan_Tugas_Kelompok']
        ]);

        if ($total > 100) {
            return back()->withErrors(['total' => 'Total bobot tidak boleh lebih dari 100.'])->withInput();
        }

        $validatedData['total'] = $total;

        BobotPenilaian::create($validatedData);

        return redirect()->route('bobot_penilaian.index')->with('success', 'Bobot penilaian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Get the data to be edited
        $bobotPenilaian = BobotPenilaian::findOrFail($id);
        $cpls = CPL::all();
        $mks = MK::all();
        $cpmks = Cpmk::all();

        return view('bobot_penilaian.edit', compact('bobotPenilaian', 'cpls', 'mks', 'cpmks'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'mk_id' => 'required|exists:mk,id',
            'cpl_id' => 'required|exists:cpl,id',
            'cpmk_id' => 'required|exists:cpmk,id',
            'tahun_ajaran' => 'required|string',
            'semester' => 'required|string',
            'mbkm' => 'nullable|string|max:255',
            'partisipasi' => 'required|integer|min:0|max:100',
            'observasi' => 'required|integer|min:0|max:100',
            'untuk_kerja' => 'required|integer|min:0|max:100',
            'tes_tulis_UTS' => 'required|integer|min:0|max:100',
            'tes_tulis_UAS' => 'required|integer|min:0|max:100',
            'tes_lisan_Tugas_Kelompok' => 'required|integer|min:0|max:100',
        ]);

        $total = array_sum([
            $validatedData['partisipasi'],
            $validatedData['observasi'],
            $validatedData['untuk_kerja'],
            $validatedData['tes_tulis_UTS'],
            $validatedData['tes_tulis_UAS'],
            $validatedData['tes_lisan_Tugas_Kelompok']
        ]);

        if ($total > 100) {
            return back()->withErrors(['total' => 'Total bobot tidak boleh lebih dari 100.'])->withInput();
        }

        $validatedData['total'] = $total;

        $bobot_penilaian = BobotPenilaian::findOrFail($id);
        $bobot_penilaian->update($validatedData);

        return redirect()->route('bobot_penilaian.index')->with('success', 'Bobot penilaian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $bobot_penilaian = BobotPenilaian::findOrFail($id);
        $bobot_penilaian->delete();

        return redirect()->route('bobot_penilaian.index')->with('success', 'Bobot penilaian berhasil dihapus.');
    }

    public function getMKs($cpl_id)
    {
        $mks = MK::where('cpl_id', $cpl_id)->get();
        return response()->json($mks);
    }

    public function getCPMKs($mk_id)
    {
        $cpmks = Cpmk::where('mk_id', $mk_id)->get();
        return response()->json($cpmks);
    }
}
