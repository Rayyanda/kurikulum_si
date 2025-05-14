<?php

namespace App\Http\Controllers;

use App\Models\JadwalRps;
use App\Models\Rps;
use App\Models\RubrikRps;
use App\Models\RubrikSkalaPresepsi;
use App\Models\SubCPMK;
use Illuminate\Http\Request;

class JadwalRpsController extends Controller
{
    //
    public function index($rps_id)
    {
        //$rubrik = RubrikSkalaPresepsi::all();
        $rps= Rps::where('id','=',$rps_id)->with('subcpmks')->first();
        $jadwalrps = JadwalRps::where('rps_id','=',$rps_id)->with(['sub_cpmk','kriteria'])->get();
        return view('rps.jadwal.index',['jadwal' => $jadwalrps,'rps'=>$rps]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'rps_id'=> 'required|exists:rps,id',
            'minggu_ke'=> 'required|integer',
            'sub_cpmk_id'=> 'required|exists:sub_cpmk,id',
            'kriteria' => 'required',
            'indikator' => 'required',
            'bentuk_pembelajaran' => 'required',
            'metode_pembelajaran' => 'required',
            'materi_pembelajaran' => 'required',
            'bobot_penilaian'=> 'required|integer',
        ]);

        $cek = JadwalRps::where('rps_id','=',$request->rps_id)
        ->where('minggu_ke','=',$request->minggu_ke)->first();

        if($cek){
            return redirect()->route('rps.jadwal.index',$request->rps_id)->with('error', 'Minggu ke-'.$cek->minggu_ke . ' sudah ada.');
        }

        $ujian = $request->minggu_ke;
        if($ujian == 8 || $ujian == 16)
        {
            return redirect()->route('rps.jadwal.index',$request->rps_id)->with('error', 'Minggu ke-'. $ujian . ' adalah ujian.');
        }

        $jadwalrps = JadwalRps::create([
            'rps_id' => $request->rps_id,
            'minggu_ke' => $request->minggu_ke,
            'sub_cpmk_id' => $request->sub_cpmk_id,
            'indikator' => $request->indikator,
            'bentuk_pembelajaran' => $request->bentuk_pembelajaran,
            'metode_pembelajaran' => $request->metode_pembelajaran,
            'materi_pembelajaran' => $request->materi_pembelajaran,
            'bobot_penilaian' => $request->bobot_penilaian,
        ]);

        RubrikRps::create([
            'jadwalrps_id' => $jadwalrps->id,
            'jenis_rubrik' => $request->kriteria,
        ]);

        //return response(200, 'Berhasil menambahkan Jadwal RPS');
        return redirect()->back()->with('success','Berhasil menambahkan data');
    }

    public function edit($rps_id, $id)
    {
        //$rubrik = RubrikSkalaPresepsi::all();
        $jadwal = JadwalRps::where('rps_id','=',$rps_id)->where('id','=',$id)->with(['rps','rubrikrps'])->first();
        return view('rps.jadwal.edit',['jadwal'=> $jadwal]);
    }

    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'rps_id'=> 'required|exists:rps,id',
            'minggu_ke'=> 'required|integer',
            'sub_cpmk_id'=> 'required|exists:sub_cpmk,id',
            'kriteria' => 'required',
            'indikator' => 'required',
            'bentuk_pembelajaran' => 'required',
            'metode_pembelajaran' => 'required',
            'materi_pembelajaran' => 'required',
            'bobot_penilaian'=> 'required|integer',
        ]);

        $cek = JadwalRps::where('rps_id','=',$request->rps_id)->where('id','=',$id)->first();

        $cek->update([
            'sub_cpmk_id' => $request->sub_cpmk_id,
            'indikator' => $request->indikator,
            'bentuk_pembelajaran' => $request->bentuk_pembelajaran,
            'metode_pembelajaran' => $request->metode_pembelajaran,
            'materi_pembelajaran' => $request->materi_pembelajaran,
            'bobot_penilaian' => $request->bobot_penilaian,
        ]);

        RubrikRps::where('jadwalrps_id','=',$id)->update([
            'jenis_rubrik' => $request->kriteria,
        ]);

        return redirect()->route('rps.jadwal.index',$request->rps_id)->with('success','Berhasil Mengupdate');
    }

    public function destroy($rps_id,$id)
    {
        JadwalRps::where('rps_id','=',$rps_id)->where('id','=',$id)->delete();

        return redirect()->route('rps.jadwal.index',$rps_id)->with('success','Berhasil Dihapus');

    }
}
