<?php

namespace App\Http\Controllers;

use App\Models\Cpmk;
use App\Models\JenisPenilaian;
use App\Models\JenisTeknikPenilaian;
use App\Models\TeknikPenilaian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    //
    public function index()
    {
        //$tp = TeknikPenilaian::all();
        $cpmks = Cpmk::all();
        $tps = TeknikPenilaian::with(['types','cpmk','cpmk.mk','cpmk.cpl'])->get();

        return view('penilaian.index',compact('cpmks','tps'));
    }

    public function matriks()
    {
        $cpmk = Cpmk::all();
        $jps = JenisPenilaian::all();
        $jtp = JenisTeknikPenilaian::all();

        return view('penilaian.matriks',compact('cpmk','jps','jtp'));
    }

    public function edit($id)
    {
        $tp = TeknikPenilaian::where('id','=',$id)
            ->with(['cpmk','cpmk.mk','cpmk.cpl','cpmk.jenis_penilaian'])
            ->first();

        $score = JenisTeknikPenilaian::where('cpmk_id','=',$tp->cpmk_id)->sum('score');

        return view('penilaian.edit-tp', compact('tp', 'score'));

    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'cpmk_id' => 'required|exists:cpmk,id',
            'tahap_penilaian' => 'required',
            'instrumen' => 'required|array|min:1',
            'kriteria' => 'required',
            'bobot'=> 'required|integer'
        ]);

        $tp = TeknikPenilaian::where('id','=',$id)
            ->update([
                'cpmk_id'=> $validate['cpmk_id'],
                'tahap_penilaian' => $validate['tahap_penilaian'],
                'instrumen'=> $request->instrumen,
                'kriteria' => $validate['kriteria'],
                'bobot'=> $validate['bobot']
            ]);
        return redirect()->route('penilaian.index')->with('success','Berhasil update data');
    }

    public function nilai_akhir()
    {
        // $data = TeknikPenilaian::join('cpmk','cpmk.id','=','teknik_penilaians.cpmk_id')
        //     ->join('mk','mk.id','=','cpmk.mk_id')
        //     ->join('jenis_teknik_penilaians','jenis_teknik_penilaians.cpmk_id','=','teknik_penilaians.cpmk_id')
        //     ->get();
        $penilaians = TeknikPenilaian::with(['cpmk','cpmk.mk','cpmk.cpl'])
            ->get();

         $grouped = $penilaians->groupBy(function($item) {
                return $item->cpmk->mk->kode; // Group by kode MK
            });
        //return response()->json($grouped);
        return view('penilaian.nilai-akhir',compact('grouped'));
    }

    public function export_nilai_akhir()
    {
        $penilaians = TeknikPenilaian::with(['cpmk','cpmk.mk','cpmk.cpl'])
            ->get();

         $grouped = $penilaians->groupBy(function($item) {
                return $item->cpmk->mk->kode; // Group by kode MK
            });

        $pdf = Pdf::loadView('pdf.nilai-akhir',compact('grouped'));
        return $pdf->stream();
    }

    public function teknik_penilaian()
    {
        
    }

    public function getscore($cpmk_id)
    {
        $score = JenisTeknikPenilaian::where('cpmk_id','=',$cpmk_id)->sum('score');
        return response()->json([
            'score' => $score
        ]);
    }

    public function edit_matriks()
    {
        $cpmk = Cpmk::all();
        $jps = JenisPenilaian::all();
        $jtp = JenisTeknikPenilaian::all();

        return view('penilaian.edit',compact('cpmk','jps','jtp'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'cpmk_id' => 'required|exists:cpmk,id',
            'tahap_penilaian' => 'required',
            'instrumen' => 'required|array|min:1',
            'kriteria' => 'required',
            'bobot'=> 'required|integer'
        ]);
        $cek = TeknikPenilaian::where('cpmk_id','=',$request->cpmk_id)->first();
        if($cek)
        {
            return back()->with('error', 'CPMK tersebut sudah ada');
        }

        TeknikPenilaian::create([
            'cpmk_id'=> $validate['cpmk_id'],
            'tahap_penilaian' => $validate['tahap_penilaian'],
            'instrumen'=> $request->instrumen,
            'kriteria' => $validate['kriteria'],
            'bobot'=> $validate['bobot']
        ]);

        return back()->with('success','Berhasil menambahkan data');
    }

    public function destroy($id)
    {
        TeknikPenilaian::where('id','=',$id)->delete();
        return back()->with('success','Berhasil hapus');
    }

    public function update_matriks(Request $request)
    {
        //proses update
        $jtpData = $request->input('jtp');

        // $request->validate([
        //     'scores.*.*' => '|integer'
        // ]);

        $scores = $request->input('scores');

        //hapus semua data di tabel jenis_teknik_penilaian
        JenisTeknikPenilaian::truncate();

        foreach ($scores as $jp_id => $cpmks) {
            foreach ($cpmks as $cpmk_id => $value) {
                # code...
                if($value)
                {
                    JenisTeknikPenilaian::create([
                        'jenis_penilaian_id'=>$jp_id,
                        'cpmk_id'=>$cpmk_id,
                        'score'=>$value
                    ]);
                }

            }
            # code...
        }



        return redirect()->route('penilaian.matriks')->with('success','Berhasil merubah matriks');
    }
}
