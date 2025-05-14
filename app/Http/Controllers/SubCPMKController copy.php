<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCPMK;
use App\Models\CPMK;
use PDF;

class SubCPMKController extends Controller
{
    public function index()
    {
        $subcpmks = SubCPMK::all();
        return view('sub_cpmk.index', compact('subcpmks'));
    }

    public function create()
    {
        $cpmks = CPMK::all();
        return view('sub_cpmk.create', compact('cpmks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string',
            'description' => 'required|string',
            'cpmk_id' => 'required|exists:cpmk,id',
        ]);

        SubCPMK::create($validatedData);
        return redirect()->route('sub_cpmk.index')->with('success', 'SubCPMK created successfully.');
    }

    public function edit($id)
    {
        $subcpmk = SubCPMK::findOrFail($id);
        $cpmks = CPMK::all();
        return view('sub_cpmk.edit', compact('subcpmk', 'cpmks'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'code' => 'required|string',
            'description' => 'required|string',
            'cpmk_id' => 'required|exists:cpmk,id',
        ]);

        $subcpmk = SubCPMK::findOrFail($id);
        $subcpmk->update($validatedData);
        return redirect()->route('sub_cpmk.index')->with('success', 'SubCPMK updated successfully.');
    }

    public function destroy($id)
    {
        $subcpmk = SubCPMK::findOrFail($id);
        $subcpmk->delete();
        return redirect()->route('sub_cpmk.index')->with('success', 'SubCPMK deleted successfully.');
    }
    public function generatePDF()
    {
        $subcpmks = SubCPMK::all();
        $pdf = PDF::loadView('pdf.subcpmk', compact('subcpmks'));
        return $pdf->download('subcpmk_list.pdf');
    }

}

