<?php

namespace App\Http\Controllers;

use App\Models\CPL;
use App\Models\Cpmk;
use App\Models\Dosen;
use App\Models\JadwalRps;
use App\Models\MK;
use App\Models\Rps;
use App\Models\RpsCpl;
use App\Models\SubCPMK;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Spatie\PdfToText\Pdf as spatiepdf;


class RpsController extends Controller
{
    //index
    public function index(){
        $rps = Rps::paginate(10);
        $mk = MK::all();
        return view('rps.index', ['rps'=> $rps, 'mk'=> $mk]);
    }

    //create
    public function create(Request $request){

        if($request['mk_id'] !== null){
            $mk_id = $request->validate([
                'mk_id'=> 'required|numeric|exists:mk,id',
            ]);
        }else{
            return redirect()->route('rps.index')->with('error','ID MK tidak boleh null');
        }



        $mks = MK::find($request['mk_id']);
        $mk = MK::all();
        $dosen = Dosen::all();

        return view('rps.create', [
            'mks' => $mks,
            'mk' => $mk,
            'dosen' => $dosen,
        ]);
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'kode_dokumen'=> 'required',
        //     'mk_id' => 'exists:mk,id|nullable',
        //     'dosen_pengembang' => 'required|exists:dosens,id',
        //     'koordinator_bk' => 'required|exists:dosens,id',
        //     'kaprodi' => 'required|exists:dosens,id',
        //     'dosen_pengampu' => 'required|exists:dosens,id',
        //     'deskripsi_mk' => 'required',
        //     'tahun_ajaran' => 'required',
        //     'semester' => 'required',
        //     'pustaka_utama' => 'required',
        //     'pustaka_pendukung' => 'nullable',
        //     'tanggal_penyusunan' => 'required|date',
        //     'cpl_id' => 'required|array',
        //     'cpl_id.*' => 'exists:cpl,id',
        // ]);



        //dd($request);

        $rps = Rps::create([
            'kode_dokumen' => $request['kode_dokumen'],
            'mk_id' => $request['mk_id'],
            'dosen_pengembang' => $request['dosen_pengembang'],
            'dekanft' => $request['dekanft'],
            'kaprodi' => $request['kaprodi'],
            'dosen_pengampu' => $request['dosen_pengampu'],
            'deskripsi_mk' => $request['deskripsi_mk'],
            'tahun_ajaran' => $request['tahun_ajaran'],
            'semester' => $request['semester'],
            'pustaka_utama' => $request['pustaka_utama'],
            'pustaka_pendukung' => $request['pustaka_pendukung'],
            'pra_mk_id' => $request['pra_mk_id'],
            'tanggal_penyusunan' => $request['tanggal_penyusunan']
        ]);

        foreach($request->cpl_id as $item){
            RpsCpl::create([
                'rps_id' => $rps->id,
                'cpl_id' => $item
            ]);
        }

        return redirect()->route('rps.index')->with('success','Berhasil menambahkan RPS');
    }

    public function edit(Request $request, $id)
    {
        $rps = Rps::where('id','=',$id)->with(['rpscpl'])->first();
        $mk = MK::all();
        $dosen = Dosen::all();
        return view('rps.edit', compact('rps','mk','dosen'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_dokumen'=> 'required',
            'mk_id' => 'exists:mk,id',
            'dosen_pengembang' => 'required|exists:dosens,id',
            'dekanft' => 'required|exists:dosens,id',
            'kaprodi' => 'required|exists:dosens,id',
            'dosen_pengampu' => 'required|exists:dosens,id',
            'deskripsi_mk' => 'required',
            'tahun_ajaran' => 'required',
            'semester' => 'required',
            'pustaka_utama' => 'required',
            'pustaka_pendukung' => 'nullable',
            'tanggal_penyusunan' => 'required|date',
            'cpl_id' => 'required|array',
            'cpl_id.*' => 'exists:cpl,id',
        ]);

        $rps = Rps::where('id','=',$id)->first();
        $rps->update([
            'kode_dokumen' => $request['kode_dokumen'],
            'mk_id' => $request['mk_id'],
            'dosen_pengembang' => $request['dosen_pengembang'],
            'dekanft' => $request['dekanft'],
            'kaprodi' => $request['kaprodi'],
            'dosen_pengampu' => $request['dosen_pengampu'],
            'deskripsi_mk' => $request['deskripsi_mk'],
            'tahun_ajaran' => $request['tahun_ajaran'],
            'semester' => $request['semester'],
            'pustaka_utama' => $request['pustaka_utama'],
            'pustaka_pendukung' => $request['pustaka_pendukung'],
            'tanggal_penyusunan' => $request['tanggal_penyusunan']
        ]);

        // $rpscpl = RpsCpl::where('rps_id','=',$id)->get();

        // if($rpscpl)
        // {
        //     RpsCpl::where('rps_id','=',$id)->delete();
        //     foreach($request->cpl_id as $item){
        //         RpsCpl::create([
        //             'rps_id' => $rps->id,
        //             'cpl_id' => $item
        //         ]);
        //     }
        // }

        return redirect()->route('rps.index')->with('success','Data RPS Berhasil Diupdate');
    }


    public function destroy($id)
    {
        $rps = Rps::findOrFail($id);
        $rps->delete();
        return redirect()->route('rps.index')->with('success','Berhasil menghapus RPS');
    }

    public function generatePDF($id)
    {
        $rps = Rps::where('id','=',$id)->with(['rpscpl','mk'])->first();
        //return view('pdf.rps_h1',['rps'=>$rps]);
        //return response()->json($rps);
        $pdf = PDF::loadView('pdf.rps_h1',['rps'=>$rps])->setPaper('a4','landscape');
        return $pdf->stream('RPS');
        //return $pdf->download('RPS '. $rps->mk->nama . '.pdf');
    }

    //AIzaSyARKThjisqMZV2Pl1zw9HcKy6CwriMUwI4
    public function fromPDF(Request $request)
    {
        $validate = $request->validate([
            'pdf_rps'=> 'required|file|max:2048'
        ]);

        $file = $request->file('pdf_rps');

        // Simpan file
        $path = $file->storeAs('public/penyimpanan/rps', $file->hashName());

        // Ambil full path ke file yang sudah disimpan
        $fullPath = storage_path('app/' . $path);



        try {
            // Ambil teks dari PDF
            $text = (new spatiepdf())->setPdf($fullPath)->text();

            $prompt = "Ekstrak informasi berikut dari teks di bawah ini dan berikan dalam format JSON.
            Ekstrak Kode MK, pertemuan ke[], sub-cpmk[], indikator penilaian[], kriteria & bentuk penilaian[],
            Bentuk, metode & penugasan[], materi pembelajaran[],bobot penilaian[]. berdasarkan \n:
            " . $text;

            $gemini_api_key = env('GEMINI_API_KEY');
            $geminiApiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . $gemini_api_key;

            $response = Http::post($geminiApiUrl,[
                'contents' => [
                    [
                        'parts' => [['text'=>$prompt]]
                    ]
                ]
            ]);
            $result = $response->json();







        } catch (\Throwable $th) {
            //throw $th;
        }

        return $result ?? back()->with('error','Gagal bor : ' . $th);
    }
}
