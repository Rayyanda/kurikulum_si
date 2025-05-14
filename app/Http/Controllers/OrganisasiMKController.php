<?php

namespace App\Http\Controllers;

use App\Models\MK;
use Illuminate\Http\Request;
use PDF;

class OrganisasiMKController extends Controller
{
    public function index()
    {
        $mks = MK::all()->sortBy('semester')->groupBy('semester');

        $data = [];
        foreach ($mks as $semester => $mkGroup) {
            $data[$semester] = [
                'wajib' => $mkGroup->where('kategori', 'MK Wajib'),
                'pilihan' => $mkGroup->where('kategori', 'MK Pilihan'),
                'wajib_umum' => $mkGroup->where('kategori', 'MK Wajib Umum'),
                'total_sks' => $mkGroup->sum('sks'),
                'total_mk' => $mkGroup->count(),
            ];
        }

        return view('pages_01.mk.organisasi_mk', compact('data'));
    }

    public function mk_resource()
    {
        $mks = MK::all()->sortBy('semester')->groupBy('semester');

        $data = [];
        foreach ($mks as $semester => $mkGroup) {
            $data[$semester] = [
                'wajib' => $mkGroup->where('kategori', 'MK Wajib'),
                'pilihan' => $mkGroup->where('kategori', 'MK Pilihan'),
                'wajib_umum' => $mkGroup->where('kategori', 'MK Wajib Umum'),
                'total_sks' => $mkGroup->sum('sks'),
                'total_mk' => $mkGroup->count(),
            ];
        }

        return response()->json([
            'messages' => 'Data MK',
            'mks' => $data
        ],200);
    }

    public function printPDF()
{
    // Mengambil data MK untuk digunakan dalam tampilan PDF
    $data = $this->prepareDataForPDF();

    // Membuat file PDF dengan menggunakan tampilan blade 'pdf.organisasi_mk_pdf' dan data yang disediakan
    $pdf = PDF::loadView('pdf.organisasi-mk', compact('data'));

    // Mengembalikan file PDF untuk diunduh
    return $pdf->download('organisasi_mk.pdf');
}

private function prepareDataForPDF()
{
    $mks = MK::all()->sortBy('semester')->groupBy('semester');

    $data = [];
    foreach ($mks as $semester => $mkGroup) {
        $data[$semester] = [
            'wajib' => $mkGroup->where('kategori', 'MK Wajib'),
            'pilihan' => $mkGroup->where('kategori', 'MK Pilihan'),
            'wajib_umum' => $mkGroup->where('kategori', 'MK Wajib Umum'),
            'total_sks' => $mkGroup->sum('sks'),
            'total_mk' => $mkGroup->count(),
        ];
    }

    return $data;
}
}
