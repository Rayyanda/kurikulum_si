<?php

namespace App\Http\Controllers;

use App\Models\CPL;
use Illuminate\Http\Request;
use PDF;

class CPLController extends Controller
{
    public function index()
    {
        $cpls = CPL::paginate(5);
        return view('pages_01.cpl.index', compact('cpls'));
    }

    public function create()
    {
        return view('pages_01.cpl.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'required|string|max:255',
            'kategori' => 'required|in:penciri utama,penciri pendukung',
        ]);

        CPL::create($validated);

        return redirect()->route('cpl.index')->with('success', 'CPL berhasil ditambahkan.');
    }

    public function show($id)
    {
        $cpl = CPL::findOrFail($id);
        return view('pages_01.cpl.show', compact('cpl'));
    }

    public function edit($id)
    {
        $cpl = CPL::findOrFail($id);
        return view('pages_01.cpl.edit', compact('cpl'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'deskripsi' => 'required|string|max:255',
            'kategori' => 'required|in:penciri utama,penciri pendukung',
        ]);

        $cpl = CPL::findOrFail($id);
        $cpl->update($validated);

        return redirect()->route('cpl.index')->with('success', 'CPL berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $cpl = CPL::findOrFail($id);
        $cpl->delete();

        return response()->json(['success' => 'CPL berhasil dihapus.']);
    }

    public function printPDF()
    {
        $cpls = CPL::all();

        $pdf = PDF::loadView('pdf.cpl', compact('cpls'));

        return $pdf->download('cpl_list.pdf');
    }
}
